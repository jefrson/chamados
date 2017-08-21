<?php
class usuario_model extends CI_Model {
        
    function __construct(){
        parent::__construct();
        
    } 
    
    function cadastrar($objeto){
        return $this->db->insert('usuario', $objeto);
    }
}