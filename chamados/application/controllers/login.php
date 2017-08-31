<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->model('login_model');
        $this->load->library('session');
    }
    
    function verificarLogin(){
        
        $login = $this->input->post('matricula');
        $senha = md5($this->input->post('cpf'));
                
        if($this->login_model->verificar($login, $senha)){
            $l = $this->login_model->buscar($login);
            
            foreach ($l as $li){
                $this->session->id_usuario = $li->id_usuario;
                $this->session->nome = $li->nome;
                $this->session->nivel = $li->nivel;
                $this->session->logado = TRUE;
            }
            
            $this->load->view('cadastro/cad_ticket');
        }else{
            $this->load->view('login/login');
        }
    }
    
    function logOut(){
        $this->session->logado = FALSE;
        $this->session->sess_destroy();
        $this->load->view('login/login');
    }
            
    function logado(){
        if(!isset($this->session)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

