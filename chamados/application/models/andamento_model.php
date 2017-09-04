<?php
class Andamento_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        if(!$this->db->insert('andamento', $objeto)){
            $er = $this->db->error();
            return $er;
        }else{
            return $this->db->insert('andamento', $objeto);
        }
    }
    
    function listarTickets(){
        $res = $this->db->query('select * from ticket');
        if(!$this->db->query('select * from ticket')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function listar(){
        $res = $this->db->query('select * from andamento');
        if(!$this->db->query('select * from andamento')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function alterar($dt){
        $this->db->where('id_ticket', $dt['id_ticket']);
        return $this->db->update('andamento', $dt);
    }
    
    function selecionarAndamento($id){
        $res = $this->db->get_where('andamento',array('id_ticket' => $id));
        if(!$this->db->get_where('andamento',array('id_ticket' => $id))){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
}