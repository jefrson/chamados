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
        return $this->db->update('ticket', $dt);
    }
}