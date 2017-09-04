<?php
class Usuario_model extends CI_Model {
        
    function __construct(){
        parent::__construct();
    } 
    
    function adicionar($objeto){
        if(!$this->db->insert('usuario', $objeto)){
            $er = $this->db->error();
            return $er;
        }else{
            return $this->db->insert('usuario', $objeto);
        }
    }
    
    function listar($limit = null, $offset = null){
        $this->db->order_by('id_usuario', 'asc');
        
        if($limit){
            $this->db->limit($limit, $offset);
        }   
        $res = $this->db->get('usuario');
        if(!$this->db->get('usuario')){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function alterar($dt){
        $this->db->where('id_usuario', $dt['id_usuario']);
        return $this->db->update('usuario', $dt)?$this->db->update('usuario', $dt):$this->db->error();
    }
    
    function selecionar($i){
        $res = $this->db->get_where('usuario',array('nome' => $i));
        if(!$this->db->get_where('usuario',array('nome' => $i))){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
    
    function totalReg(){
        return $this->db->count_all('usuario');
    }
}