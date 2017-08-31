<?php
class Usuario_model extends CI_Model {
        
    function __construct(){
        parent::__construct();
    } 
    
    function adicionar($objeto){
        return $this->db->insert('usuario', $objeto)->result();
    }
    
    function listar(){
        return $this->db->query('select * from usuario')->result();
    }
    
    function alterar($dt){
        return $this->db->update('usuario', $dt)->result();
    }
    
    function selecionar($i){
        return $this->db->get_where('usuario',array('id_usuario' => $i))->result();
    }
}