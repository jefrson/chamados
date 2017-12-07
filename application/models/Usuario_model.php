<?php
class Usuario_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function adicionar($objeto){
        $this->db->insert('usuario', $objeto);

        return $this->db->affected_rows();
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
        $this->db->update('usuario', $dt);

        return $this->db->affected_rows();
    }

    function selecionar($i){
        $res = $this->db->get_where('usuario',array('nome' => $i));

        return $res->result();
    }

    function totalReg(){
        return $this->db->count_all('usuario');
    }
}