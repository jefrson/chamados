<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $this->load->view('login/login');
    }
    
    function cadUsuario(){
        $this->load->view('cadastro/cad_usuario');
    }
    
    function cadTicket(){
        $this->load->view('cadastro/cad_ticket');
    }
    
    function cadAndamento(){
        $this->load->view('cadastro/cad_andamento');
    }
    
    function listarUsuario(){
        $this->load->view('listagem/list_usuario');
    }
    
    function listarTicket(){
        $this->load->view('listagem/list_ticket');
    }
    
    function listarAndamento(){
        $this->load->view('listagem/list_andamento');
    }
    
    function alterarUsuario(){
        $this->load->view('alteracao/alt_usuario');
    }
    
    function alterarTicket(){
        $this->load->view('alteracao/alt_ticket');
    }
    
    function alterarAndamento(){
        $this->load->view('alteracao/alt_andamento');
    }
    
    function sair(){
        $this->load->view('login/login');
    }
}
