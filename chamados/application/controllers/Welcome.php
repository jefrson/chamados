<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
            $this->load->view('welcome_message');
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
}
