<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller{
    
    //Adiciona um Ticket
    function adicionarTicket(){
        $this->load->model('ticket_model'); //Carrega o Model
            
        //Cria um objeto e carrega os dados enviados por POST
        $obj = new stdClass;
        $obj->id_categoria = $this->input->post('id_categoria');
        $obj->urgencia = $this->input->post('urgencia');
        $obj->responsavel = $this->input->post('responsavel');
        $obj->mensagem = $this->input->post('mensagem');
        $obj->assunto = $this->input->post('assunto');
        $obj->anexo = $this->input->post('anexo');
        $obj->data_inicial = $this->input->post('data_inicial');
        $obj->data_final = $this->input->post('data_final');
        $obj->solicitante = $this->input->post('solicitante');
        $st = $this->input->post('ativo');
        if(isset($st)){
            $obj->ativo = 1;    
        }else{
            $obj->ativo = 0;    
        }
                
        
        $this->ticket_model->adicionar($obj); //Envia para o Model o objeto que vai ser cadastrado
        
        $this->load->view('cadastro/cad_ticket'); //Redireciona para a página 
    }
    
    function alterarTicket(){
        $this->load->model('ticket_model');
        
        $st = $this->input->post('ativo');
        if(isset($st)){
            $ativo = 1;    
        }else{
            $ativo = 0;    
        }
        
        $dt = array(
            'id_categoria' => $this->input->post('id_categoria'),
            'urgencia' => $this->input->post('urgencia'),
            'responsavel' => $this->input->post('responsavel'),
            'mensagem' => $this->input->post('mensagem'),
            'assunto' => $this->input->post('assunto'),
            'anexo' => $this->input->post('anexo'),
            'data_inicial' => $this->input->post('data_inicial'),
            'data_final' => $this->input->post('data_final'),
            'ativo' => $ativo
        );
        
        $alt = $this->usuario_model->alterar($dt);
        
        $this->load->view('alteracao/alt_ticket', $alt);
    }

    /* Esta função deveria listar os tickets, mas por algum motivo não funciona
    function listarTicket(){
        $this->load->model('ticket_model');
        $tickets = $this->ticket_model->listarTicket();
        
        $this->load->view('listagem/lis_ticket', $tickets);
    }
    */
}