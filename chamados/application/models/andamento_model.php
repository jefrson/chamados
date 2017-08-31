<?php
class Andamento_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        return $this->db->insert('andamento', $objeto);
    }
    
    function listarTickets(){
        return $this->db->query('select id_ticket from ticket')->result();
    }
    
    function listar(){
        return $this->db->query('select * from andamento')->result();
    }
    
    function alterar($dt){
        return $this->db->update('andamento', $dt);
    }
    
    function selecionarAndamento($id){
        return $this->db->get_where('andamento', array('id_ticket' => $id))->result();
    }
}