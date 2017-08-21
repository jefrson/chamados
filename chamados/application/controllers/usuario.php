<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller{
    
    public function index(){
        $this->load->view('ticket');
    }
    
    public function adicionar(){
        if($_SERVER['REQUEST_METHOD'] != 'POST'){ redirect('ticket'); }
        
        $this->validar();
        if($this->form_validation->run()){
            $this->load->model('usuario_model');

            $obj = new stdClass;

            $obj->nome = $this->input->post('nome');
            $obj->id_setor = $this->input->post('id_setor');
            $obj->id_cargo = $this->input->post('id_cargo');
            $obj->id_secretaria = $this->input->post('id_secretaria');
            $obj->matricula = $this->input->post('matricula');
            $obj->cpf = $this->input->post('cpf');
            $obj->email = $this->input->post('email');

            $this->usuario_model->cadastrar($obj);
        }
        $this->load->view('ticket');
    }
    
    public function validar(){
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