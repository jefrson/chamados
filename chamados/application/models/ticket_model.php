<?php 
class Ticket_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        return $this->db->insert('ticket', $objeto);
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
    
    function listar($limit = null, $offset = null, $admin = NULL){
        $this->db->order_by('id_ticket', 'asc');
        
        if($limit){
            $this->db->limit($limit, $offset);
        } 

        $res = ($admin)?$this->db->get('ticket'):$this->db->get_where('ticket', array('solicitante' => $this->session->id_usuario));
        if(!$this->db->get('ticket')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function totalReg(){
        return $this->db->count_all_results('ticket');
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