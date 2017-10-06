<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->model('ticket_model');
        $this->load->model('usuario_model');
    }
    
    //Adiciona um Ticket
    function adicionarTicket(){
        
        //Faz a validação dos dados inseridos
        $this->validar();
        if($this->form_validation->run()){
            //Cria um objeto e carrega os dados enviados por POST
            $obj = new stdClass;
            $obj->id_categoria = $this->input->post('id_categoria');
            $obj->urgencia = $this->input->post('urgencia');
            $obj->responsavel = $this->input->post('responsavel');
            $obj->mensagem = $this->input->post('mensagem');
            $obj->assunto = $this->input->post('assunto');
            $obj->anexo = $_FILES['anexo']['name'];
            $obj->data_inicial = $this->input->post('data_inicial');
            $obj->data_final = $this->input->post('data_final');
            $obj->solicitante = $_SESSION['id_usuario'];
            $st = $this->input->post('ativo');
            if(isset($st)){
                $obj->ativo = TRUE;    
            }else{
                $obj->ativo = FALSE;    
            }

            $up = $this->do_upload($_FILES['anexo']);

            $adc = $this->ticket_model->adicionar($obj); //Envia para o Model o objeto que vai ser cadastrado
            
            $dados = $this->dadosEnvio($obj);
            
            if($adc == 1 && $this->abrirChamado($dados)){
                //$this->load->view('cadastro/cad_ticket');
                $this->load->view('cadastro/sucesso');
            }else{
                $this->load->view('cadastro/cad_ticket');
                $this->load->view('cadastro/falha');
            }
        }else{
            $this->load->view('cadastro/cad_ticket'); //Redireciona para a página 
        }
    }
    
    function buscarTicket(){
        
        $ticket = $this->input->post('buscar');
        $res = $this->ticket_model->selecionarTicket($ticket);
        
        $v = array(
            'tickets' => $res
        );
        
        $this->load->view('alteracao/alt_ticket_2', $v);
    }
            
    function alterarTicket(){
       
        $st = $this->input->post('ativo');
        if(isset($st)){
            $ativo = TRUE;    
        }else{
            $ativo = FALSE;    
        }
        
        $dt = array(
            'id_ticket' => $this->input->post('id_ticket'),
            'id_categoria' => $this->input->post('id_categoria'),
            'urgencia' => $this->input->post('urgencia'),
            'responsavel' => $this->input->post('responsavel'),
            'mensagem' => $this->input->post('mensagem'),
            'assunto' => $this->input->post('assunto'),
            'anexo' => $this->input->post('anexo'),
            'data_inicial' => $this->input->post('data_inicial'),
            'data_final' => $this->input->post('data_final'),
            'ativo' => $ativo
        );
        
        $this->ticket_model->alterar($dt);
        
        $this->load->view('alteracao/alt_ticket');
    }
    
    private function validar(){
        $this->form_validation->set_rules('id_categoria', 'Categoria', 'trim|required');
        $this->form_validation->set_rules('urgencia', 'Urgência', 'trim|required');
        $this->form_validation->set_rules('responsavel','Responsável','trim|required|alpha');
        $this->form_validation->set_rules('mensagem','Mensagem','trim|required');
        $this->form_validation->set_rules('assunto','Assunto','trim|required');
        $this->form_validation->set_rules('data_inicial','Data Inicial','trim|required');
        $this->form_validation->set_rules('data_final','Data Final','trim|required');
        
        $this->form_validation->set_message('required', 'O campo %s é obrigatório!');
        $this->form_validation->set_message('alpha', 'O campo %s aceita apenas letras!');
    }
    
    private function do_upload($arq){
        $pasta = "./uploads/";
        $lista = array('image/jpg', 'image/png', 'image/jpeg', 'application/msword', 
            'application/pdf', 'application/zip', 'application/rar', 'application/vnd.ms-excel', 
            'application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation');
        
        if($arq['error'] == 0){
            if(array_search($pasta, $lista)){
                $up = move_uploaded_file($arq['tmp_name'], $pasta.$arq['name']);
                return $up;
            }else{
                $error = 'Tipo de arquivo inválido';
                return $error;
            }
        }
    }

    function listarTicket(){
        $dt = $this->paginacao();
        
        $v = array(
            'tickets' => $dt['tickets'],
            'paginacao' => $dt['paginacao']
        );
        
        $this->load->view('listagem/list_ticket', $v);
    }
    
    //Adiciona a paginação à tabela
    function paginacao(){
        $regPag = 5; //Registros por página        
                
        $total = $this->ticket_model->totalReg(); //Total de registros retornados da consulta
        
        $pag = ceil($total/$regPag); //Calcula quantas páginas serão geradas
        
        //Configuração da paginação
        $config = array(
            'base_url' => site_url().'/listar_tickets/',
            'total_rows' => $total,
            'per_page' => $regPag,
            'num_links' => $pag,
            'use_page_numbers' => TRUE,
            'first_link' => 'Primeira',
            'last_link' => 'Última',
            'next_link' => 'Próxima',
            'prev_link' => 'Anterior',
            'full_tag_open' => '<ul class="pagination justify-content-center">',
            'full_tag_close' => '</ul>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'attributes' => array('class' => 'page-link')
        );
                
        //Adiciona a configuração e cria os links
        $this->pagination->initialize($config);
        $dt['paginacao'] = $this->pagination->create_links();       
        
        //Calcula o inicio da visualização dos registros
        $offset = substr($this->uri->uri_string(3),15)*($regPag/2);
        
        //Busca os tickets com o limite $regPag e começando em $offset
        $dt['tickets'] = $this->ticket_model->listar($regPag,ceil($offset), (!$this->session->nivel)?TRUE:NULL);
        
        return $dt;
    }
    
    function dadosEnvio($obj){
        //Pega os dados inseridos no formulário do ticket
        $dt['mensagem'] = $obj->mensagem;
        $dt['assunto'] = $obj->assunto;
        $dt['anexo'] = $obj->anexo;
        $dt['responsavel'] = $obj->responsavel;
        
        //Pega os dados do usuário que esta abrindo o chamado
        $nome = $this->session->nome;
        $email = 'jeffalmd3@gmail.com';
        
        $dt['id_ticket'] = $this->ticket_model->selecionarId();
        $dt['nome'] = $nome;
        $dt['email'] = $email;
        $dt['destino'] = 'suporte@arapoti.pr.gov.br';
        
        return $dt;
    }
            
    function abrirChamado($dados){
        $this->load->library('PHPMailer_Library');
        
        if($this->phpmailer_library->send($dados)){
            return TRUE;
        }
        return FALSE;
    }
}