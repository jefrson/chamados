<?php 
class Ticket_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        $this->db->insert('ticket', $objeto);
        return $this->db->affected_rows();
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
        if($this->session->nivel){
            $res = $this->db->get_where('ticket', array('solicitante' => $this->session->id_usuario));
        }else{
            $res = $this->db->get('ticket');
        }
        
        return $res->num_rows();
    }
            
    function alterar($dt){
        $this->db->where('id_ticket', $dt['id_ticket']);
        $this->db->update('ticket', $dt);
        return $this->db->affected_rows();
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
    
    function selecionarId(){
        $this->db->order_by('id_ticket','DESC');
        $this->db->limit(1);
        $id = $this->db->get('ticket');
        
        return $id->result();
    }
}