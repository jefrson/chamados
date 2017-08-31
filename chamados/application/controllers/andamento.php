<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->model('andamento_model');
        $this->load->model('ticket_model');
    }
         
    function adicionarAndamento(){
      
        $obj = new stdClass;
        $obj->id_ticket = $this->input->post('id_ticket');
        $obj->mensagem = $this->input->post('mensagem');
        $obj->data_hora = $this->input->post('data_hora');
        
        $this->andamento_model->adicionar($obj);
        $this->load->view('cadastro/cad_andamento');
    }
    
    function listarTickets(){
        
        $tickets = $this->ticket_model->listarTickets();
        
        $v = array(
            'tickets' => $tickets
        );
        
        $this->load->view('cadastro/cad_andamento', $v);
    }

    function alterarAndamento(){
        
    }

    /* Esta função deveria listar os andamentos, mas por algum motivo não funciona
    function listarAndamento(){
        $this->load->model('andamento_model');
        $andamentos = $this->andamento_model->listar();
        
        $this->load->view('listagem/list_andamento', $andamentos);
    }
     */
}