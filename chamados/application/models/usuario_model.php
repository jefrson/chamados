<?php
class Usuario_model extends CI_Model {
        
    function __construct(){
        parent::__construct();
    } 
    
    function adicionar($objeto){
        return $this->db->insert('usuario', $objeto);
    }
    
    function listar(){
        return $this->db->query('select * from usuario')->result();
    }
    
    function alterar($dt){
        $this->db->where('id_usuario', $dt['id_usuario']);
        return $this->db->update('usuario', $dt);
    }
    
    function selecionar($i){
        return $this->db->get_where('usuario',array('id_usuario' => $i))->result();
    }
}