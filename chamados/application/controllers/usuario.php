<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{
    
    //Adiciona um usuario
    function adicionarUsuario(){
        
        //Faz a validação dos dados inseridos
        //$this->validar();
        //if($this->form_validation->run()){
            $this->load->model('usuario_model'); //Carrega o Model

            //Cria um objeto e carrega os dados enviados por POST
            $obj = new stdClass;
            $obj->nome = $this->input->post('nome');
            $obj->id_setor = $this->input->post('id_setor');
            $obj->id_cargo = $this->input->post('id_cargo');
            $obj->id_secretaria = $this->input->post('id_secretaria');
            $obj->matricula = $this->input->post('matricula');
            $obj->cpf = $this->input->post('cpf');
            $obj->email = $this->input->post('email');

            $this->usuario_model->adicionar($obj); //Envia para o Model o objeto que vai ser cadastrado
        //}
        $this->load->view('cadastro/cad_usuario'); //Redireciona para a página 
    }
    
    function alterarUsuario(){
        $this->load->model('usuario_model');
        
        $dt = array(
            'nome' => $this->input->post('nome'),
            'id_setor' => $this->input->post('id_setor'),
            'id_cargo' => $this->input->post('id_cargo'),
            'id_secretaria' => $this->input->post('id_secretaria'),
            'matricula' => $this->input->post('matricula'),
            'cpf' => $this->input->post('cpf'),
            'email' => $this->input->post('email')
        );
        
        $alt = $this->usuario_model->alterar($dt);
        
        $this->load->view('alteracao/alt_usuario', $alt);
    }

    /* Esta função deveria listar os usuarios, mas por algum motivo não funciona
    function listarUsuario(){
        $this->load->model('usuario_model');
        $usuarios = $this->usuario_model->listarUsuario();
        
        $u = array(
            'usuarios' => $usuarios
        );
        
        $this->load->view('listagem/list_usuario', $u);
    }
    */
    private function validar(){
        $this->form_validation->set_rules('nome','Nome','trim|required|alpha');
        $this->form_validation->set_rules('id_setor','Setor','trim|required|numeric');
        $this->form_validation->set_rules('id_cargo','Cargo','trim|required|numeric');
        $this->form_validation->set_rules('id_secretaria','Secretaria','trim|required|numeric');
        $this->form_validation->set_rules('matricula','Matricula','trim|required|numeric');
        $this->form_validation->set_rules('cpf','CPF','trim|required|numeric');
        $this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
        
        $this->form_validation->set_message('required', 'O campo %s é obrigatório');
        $this->form_validation->set_message('numeric', 'O campo %s aceita apenas números');
        $this->form_validation->set_message('alpha', 'O campo %s aceita apenas letras');
        $this->form_validation->set_message('valid_email', 'Campo %s incorreto');
    }
}