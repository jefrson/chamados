<?php 
class Ticket_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        if(!$this->db->insert('ticket', $objeto)){
            $er = $this->db->error();
            return $er;
        }else{
            return $this->db->insert('ticket', $objeto);
        }
    }
    
    function listarUsuarios(){
        $res = $this->db->query('select * from usuario');
        if(!$this->db->query('select * from usuario')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function listar(){
        $res = $this->db->query('select * from ticket');
        if(!$this->db->query('select * from ticket')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function alterar($dt){
        $this->db->where('id_ticket', $dt['id_ticket']);
        return $this->db->update('ticket', $dt);
    }
    
    function selecionarTicket($id){
        $res = $this->db->get_where('ticket',array('id_ticket' => $id));
        if(!$this->db->get_where('ticket',array('id_ticket' => $id))){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
}