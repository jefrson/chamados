<?php
class Andamento_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        $this->db->insert('andamento', $objeto);
        return $this->db->affected_rows();
    }
    
    function listarTickets(){
        if($this->session->nivel){
            $res = $this->db->query('SELECT * FROM ticket INNER JOIN usuario on ticket.solicitante = usuario.id_usuario WHERE usuario.nome ="'.$this->session->nome.'"');
            return $res->result();
        }else{
            $res = $this->db->get('ticket');
            return $res->result();
        }
    }
    
    function listar($limit = null, $offset = null, $admin = null){
        $this->db->order_by('id_andamento', 'asc');
        
        if($limit){
            $this->db->limit($limit,$offset);
        }
        if($this->session->nivel){
            $res = $this->db->query('SELECT * FROM andamento INNER JOIN ticket ON andamento.id_ticket = ticket.id_ticket INNER JOIN usuario ON ticket.solicitante = usuario.id_usuario WHERE usuario.nome = "'.$this->session->nome.'"');
            return $res->result();
        }else{
            $res = $this->db->get('andamento');
            return $res->result();
        }
    }
    
    function totalReg(){
        if($this->session->nivel){
            $res = $this->db->query('SELECT * FROM andamento INNER JOIN ticket ON andamento.id_ticket = ticket.id_ticket INNER JOIN usuario ON ticket.solicitante = usuario.id_usuario WHERE usuario.nome = "'.$this->session->nome.'"');
        }else{
            $res = $this->db->get('andamento');
        }
        
        return $res->num_rows();
    }
            
    function alterar($dt){
        $this->db->where('id_ticket', $dt['id_ticket']);
        $this->db->update('andamento', $dt);
        return $this->db->affected_rows();
    }
    
    function selecionarAndamento($id){
        $this->db->order_by('data_hora', 'desc');
        $this->db->limit(1);
        $res = $this->db->get_where('andamento',array('id_ticket' => $id));
        if(!$this->db->get_where('andamento',array('id_ticket' => $id))){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
}