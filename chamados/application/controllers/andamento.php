<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento extends CI_Controller{
    
    function adicionarAndamento(){
        $this->load->model('andamento_model');
        
        $obj = new stdClass;
        $obj->ticket = $this->input->post('ticket');
        $obj->mensagem = $this->input->post('mensagem');
        $obj->data_hora = $this->input->post('data_hora');
        
        $this->andamento_model->adicionar($obj);
        $this->load->view('cadastro/cad_andamento');
    }
    
    function listarTickets(){
        $this->load->model('tickets_model');
        $tickets = $this->tickets_model->listarTickets();
        
        $this->load->view('cadastro/cad_andamento', $tickets);
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