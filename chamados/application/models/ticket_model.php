<?php 
class Ticket_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        return $this->db->insert('ticket', $objeto);
    }
    
    function listarUsuarios(){
        return $this->db->query('select * from usuario')->result();
    }
    
    function listar(){
        return $this->db->query('select * from ticket')->result();
    }
    
    function alterar($dt){
        $this->db->where('id_ticket', $dt['id_ticket']);
        return $this->db->update('ticket', $dt);
    }
    
    function selecionarTicket($id){
        return $this->db->get_where('ticket',array('id_ticket' => $id))->result();
    }
}