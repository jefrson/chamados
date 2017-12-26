<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller{

    function __construct() {

        parent::__construct();

        $this->load->model('ticket_model');
        $this->load->model('andamento_model');
        $this->load->model('usuario_model');
        $this->load->library('phpmailer_library');
    }

    //Adiciona um Ticket
    function adicionarTicket(){

        //Faz a validação dos dados inseridos
        $this->validar();
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
        if($this->form_validation->run()){
            //Cria um objeto e carrega os dados enviados por POST
            $obj = new stdClass;
            $obj->id_categoria = $this->input->post('id_categoria');
            $obj->urgencia = $this->input->post('urgencia');
            $obj->responsavel = $this->input->post('responsavel');
            $obj->mensagem = $this->input->post('mensagem');
            $obj->assunto = $this->input->post('assunto');
            $obj->anexo = $_FILES['anexo'];
            $obj->data_inicial = $this->input->post('data_inicial');
            $obj->solicitante = $_SESSION['id_usuario'];
            $st = $this->input->post('ativo');

            if(isset($st)){
                $obj->ativo = TRUE;
            }else{
                $obj->ativo = FALSE;
            }

            //$this->do_upload($_FILES['anexo']); --Não está funcionando

            //Envia para o Model o objeto que vai ser cadastrado e
            //Verifica e foi adicionado com sucesso
            if($this->ticket_model->adicionar($obj) == 1 && $this->abrirChamado($obj)){
                $this->load->view('cadastro/sucesso');
            }else if($this->ticket_model->adicionar($obj) == 0){
                //$this->load->view('cadastro/falha');
            }
        }
        $this->load->view('cadastro/cad_ticket'); //Redireciona para a página
    }

    //Buscar ticket pelo número
    function buscarTicket(){

        $ticket = $this->input->post('buscar');
        $res = $this->ticket_model->selecionarTicket($ticket);

        $v = array(
            'tickets' => $res
        );

        $this->load->view('alteracao/alt_ticket_2', $v);
    }

    //Altera ticket
    function alterarTicket(){

        //Verifica o estado do ticket
        $st = $this->input->post('ativo');
        if(isset($st)){
            $ativo = TRUE;
        }else{
            $ativo = FALSE;
        }

        //Carrega os dados
        $dt = array(
            'id_ticket' => $this->input->post('id_ticket'),
            'id_categoria' => $this->input->post('id_categoria'),
            'urgencia' => $this->input->post('urgencia'),
            'responsavel' => $this->input->post('responsavel'),
            'mensagem' => $this->input->post('mensagem'),
            'assunto' => $this->input->post('assunto'),
            'anexo' => $this->input->post('anexo'),
            'data_inicial' => $this->input->post('data_inicial'),
            'ativo' => $ativo
        );

        if($this->ticket_model->alterar($dt) == 1){
            $this->load->view('alteracao/sucesso');
        }else{
            //$this->load->view('alteracao/falha');
        }
        $this->load->view('alteracao/alt_ticket');
    }

    //Valida os dados do formulário
    private function validar(){
        //Regras de validação
        $this->form_validation->set_rules('id_categoria', 'Categoria', 'trim|required');
        $this->form_validation->set_rules('urgencia', 'Urgência', 'trim|required');
        $this->form_validation->set_rules('responsavel','Responsável','trim|required|regex_match[/^[a-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ ]+$/]');
        $this->form_validation->set_rules('mensagem','Mensagem','trim|required');
        $this->form_validation->set_rules('assunto','Assunto','trim|required');
        $this->form_validation->set_rules('data_inicial','Data','trim|required');

        //Mensagens de erro
        $this->form_validation->set_message('required', 'O campo %s é obrigatório!');
        $this->form_validation->set_message('regex_match', 'O campo %s aceita apenas letras e acentos!');
    }

    //Upload de arquivos -- Obs: Não está funcionando
    private function do_upload($arq){
        $nome = $arq['name'];
        $pasta = "./uploads/".$nome;

        if(!is_dir($pasta)){
            mkdir($pasta, 0777, $recursive = true);
        }

        $lista = array('image/jpg', 'image/png', 'image/jpeg', 'application/msword',
            'application/pdf', 'application/zip', 'application/rar', 'application/vnd.ms-excel',
            'application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation');

        $conf = array('upload_path' => $pasta, 'allowed_types' => $lista, 'file_name' => $nome, 'max_size' => 1024);

        $this->upload->initialize($conf);

        if($this->upload->do_upload($nome)){
            echo "Arquivo enviado";
            $dados['dados'] = $this->upload->data();
            $caminho = './uploads/'.$pasta.'/'.$dados['dados']['file_name'];
            $dados['url'] = base_url($caminho);
            $cdownload = 'download/'.$pasta.'/'.$dados['dados']['file_name'];
            $dados['download'] = base_url($download);
        }else{
            echo "Arquivo não enviado.\nERRO: ".$this->upload->display_errors();
        }
    }

    //Lista os tickets
    function listarTicket(){

        //Paginação
        $dt = $this->paginacao();

        $v = array(
            'tickets' => $dt['tickets'],
            'paginacao' => $dt['paginacao']
        );

        $this->load->view('listagem/list_ticket', $v);
    }

    //Adiciona a paginação à tabela
    function paginacao(){
        $regPag = 8; //Registros por página

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
        $dt['tickets'] = $this->ticket_model->listar($regPag,ceil($offset), ($this->session->nivel==2)?NULL:TRUE);

        return $dt;
    }

    //Seleciona o ultimo ID que foi adicionado
    function ultimoId(){
        $ids = $this->ticket_model->selecionarId();

        foreach ($ids as $id){
            return $id->id_ticket;
        }
    }

    //Envia email de abertura do chamado
    private function abrirChamado($objeto){
        $dados = $objeto;

        //Dados da mensagem
        $dados->msg = $this->msg($dados);
        $dados->nome = $this->session->nome;
        $dados->email = $this->session->email;

        //Envia email
        if($this->phpmailer_library->send($dados)){
            return TRUE;
        }
        return FALSE;
    }

    //Estrutura da mensagem
    private function msg($dt){
        return "<body>
                    <div>
                        <p>Chamado aberto por: ".ucwords($this->session->nome)."</p>
                        <p>Segue abaixo as informações do chamado:</p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Ticket</td>
                                <td>Mensagem</td>
                                <td>Data/Hora</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>".$this->ultimoId()."</td>
                                <td>".$dt->mensagem."</td>
                                <td>".date("d/m/Y H:i", strtotime($dt->data_inicial))."</td>
                            </tr>
                        </tbody>
                    </table>
                </body>";
    }
}
