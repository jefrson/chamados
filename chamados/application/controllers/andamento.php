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
        $dt = array(
            'id_ticket' => $this->input->post('id_ticket'),
            'mensagem' => $this->input->post('mensagem'),
            'data_hora' => $this->input->post('data_hora')
        );
        
        $alt = $this->andamento_model->alterar($dt);
        
        $this->load->view('alteracao/alt_andamento', $alt);
    }
    
    function buscarAndamento(){
        $andamento = $this->input->post('buscar');
        $res = $this->andamento_model->selecionarAndamento($andamento);
        
        $v = array(
            'andamentos' => $res
        );
        
        $this->load->view('alteracao/alt_andamento_2', $v);
    }
}