<?php
class Andamento_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function adicionar($objeto){
        return $this->db->insert('andamento', $objeto);
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
    
    function listar($limit = null, $offset = null, $admin = null){
        $this->db->order_by('id_andamento', 'asc');
        
        if($limit){
            $this->db->limit($limit,$offset);
        }
        
        $res = $this->db->get('andamento');
        if(!$this->db->get('andamento')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function totalReg(){
        return $this->db->count_all_results('andamento');
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