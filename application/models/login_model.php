<?php

class Login_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    function verificar($login, $senha){
        $sql = "select * from usuario";
        $logar = $this->db->query($sql)->result();
        if($this->db->query($sql)){
            foreach ($logar as $l){
                if($l->matricula == $login && $l->senha == $senha){
                    return TRUE;
                }
            }        
        }
        return FALSE;
    }
    
    function buscar($l){
        $res = $this->db->query("select id_usuario,nome,nivel from usuario where matricula = $l");
        if(!$this->db->query("select id_usuario,nome,nivel from usuario where matricula = $l")){
            $er = $this->db->error();
            return $er;
        }else{
            return $res->result();
        }
    }
}