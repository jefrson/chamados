<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->model('usuario_model');
    }
    
    //Adiciona um usuario
    function adicionarUsuario(){
        
        $cpf = $this->input->post('cpf');
                
        //Faz a validação dos dados inseridos
        $this->validar();
        if($this->form_validation->run()){
            //Cria um objeto e carrega os dados enviados por POST
            $obj = new stdClass;
            $obj->nome = $this->input->post('nome');
            $obj->id_setor = $this->input->post('id_setor');
            $obj->id_cargo = $this->input->post('id_cargo');
            $obj->id_secretaria = $this->input->post('id_secretaria');
            $obj->matricula = $this->input->post('matricula');
            $obj->email = $this->input->post('email');
            $obj->cpf = $cpf;
            $obj->senha = md5($cpf);
            $nivel = $this->input->post('nivel');
            if(isset($nivel)){
                $obj->nivel = TRUE;
            }else{
                $obj->nivel = FALSE;
            }

            $adc = $this->usuario_model->adicionar($obj); //Envia para o Model o objeto que vai ser cadastrado
        }
        $this->load->view('cadastro/cad_usuario'); //Redireciona para a página
        
    }
    
    //Busca o usuário pelo nome inserido
    function buscarUsuario(){
        $nome = $this->input->post('nome');

        $r = $this->usuario_model->selecionar($nome); //Envia para o Model o nome e retorna os dados do banco

        $v = array(
            'usuario' => $r
        );
        if(!isset($nome)){
            $this->load->view('alteracao/buscar_usuario');
        }else{
            $this->load->view('alteracao/alt_usuarios', $v); //Redireciona para a página e envia o vetor 'usuario' 
        }
    }

    //Altera os dados do usuário
    function alterarUsuario(){
        $nivel = $this->input->post('nivel');
        $cpf = $this->input->post('cpf');
        
        $dt = array(
            'id_usuario' => $this->input->post('id_usuario'),
            'nome' => $this->input->post('nome'),
            'id_setor' => $this->input->post('id_setor'),
            'id_cargo' => $this->input->post('id_cargo'),
            'id_secretaria' => $this->input->post('id_secretaria'),
            'matricula' => $this->input->post('matricula'),
            'cpf' => $cpf,
            'email' => $this->input->post('email'),
            'nivel' => isset($nivel)?TRUE:FALSE,
            'senha' => md5($cpf)
        );
        
        $alt = $this->usuario_model->alterar($dt);
        
        $this->load->view('alteracao/alt_usuario');
    }
    
    function alterarUsuarios(){ 
        $nivel = $this->input->post('nivel');
        $cpf = $this->input->post('cpf');
        
        $dt = array(
            'id_usuario' => $this->input->post('id_usuario'),
            'nome' => $this->input->post('nome'),
            'id_setor' => $this->input->post('id_setor'),
            'id_cargo' => $this->input->post('id_cargo'),
            'id_secretaria' => $this->input->post('id_secretaria'),
            'matricula' => $this->input->post('matricula'),
            'cpf' => $cpf,
            'email' => $this->input->post('email'),
            'nivel' => isset($nivel)?TRUE:FALSE,
            'senha' => md5($cpf)
        );
        
        $this->usuario_model->alterar($dt);
        
        $this->load->view('alteracao/buscar_usuario');
    }
    
    //Exibe uma lista em forma de tabela dos usuários cadastrados
    function listarUsuario(){
        $dt = $this->paginacao();
               
        $u = array(
            'usuarios' => $dt['usuarios'],
            'regs' => $this->usuario_model->totalReg(),
            'paginacao' => $dt['paginacao']
        );
        
        $this->load->view('listagem/list_usuario', $u);
    }
    
    //Adiciona a paginação à tabela
    function paginacao(){
        $total = $this->usuario_model->totalReg(); //Total de registros
        $regPag = 6; //Registros por página        
        
        $pag = ceil($total/$regPag); //Calcula quantas páginas serão geradas
        
        //Configuração da paginação
        $config = array(
            'base_url' => site_url().'/listar_usuarios/',
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
        $offset = substr($this->uri->uri_string(3),16)*($regPag/2);
        
        //Busca os usuários com o limite $regPag e começando em $offset
        $dt['usuarios'] = $this->usuario_model->listar($regPag,$offset);
        
        return $dt;
    }

    //Valida os campos preenchidos no formulário
    private function validar(){
        
        //Define as regras a serem validadas
        $this->form_validation->set_rules('nome','Nome','trim|required|alpha');
        $this->form_validation->set_rules('id_setor','Setor','trim|required|numeric');
        $this->form_validation->set_rules('id_cargo','Cargo','trim|required|numeric');
        $this->form_validation->set_rules('id_secretaria','Secretaria','trim|required|numeric');
        $this->form_validation->set_rules('matricula','Matricula','trim|required|numeric');
        $this->form_validation->set_rules('cpf','CPF','trim|required|numeric');
        $this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
        
        //Define a mensagem de Erro a ser exibida
        $this->form_validation->set_message('required', 'O campo %s é obrigatório!');
        $this->form_validation->set_message('numeric', 'O campo %s aceita apenas números!');
        $this->form_validation->set_message('alpha', 'O campo %s aceita apenas letras!');
        $this->form_validation->set_message('valid_email', 'Campo %s incorreto!');
        $this->form_validation->set_message('validar_cpf', '%s inválido!');
    }
}