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
        if($this->session->nivel == 0 || $this->session->nivel == 1){
            $this->db->order_by('id_ticket', 'desc');
            $res = $this->db->get_where('ticket', array('ticket.ativo' => true));
            return $res->result();
        }
    }

    function listar($limit = null, $offset = null, $admin = null){
        $this->db->order_by('id_andamento', 'desc');

        if($limit){
            $this->db->limit($limit,$offset);
        }
        if($this->session->nivel == 0 || $this->session->nivel == 1){
            $this->db->join('ticket', 'andamento.id_ticket = ticket.id_ticket');
            $this->db->join('usuario', 'ticket.solicitante = usuario.id_usuario');
            $res = $this->db->get_where('andamento', array('usuario.nome' => $this->session->nome));
            return $res->result();
        }else{
            $res = $this->db->get('andamento');
            return $res->result();
        }
    }

    function totalReg(){
        if($this->session->nivel == 0 || $this->session->nivel == 1){
            $this->db->join('ticket', 'andamento.id_ticket = ticket.id_ticket');
            $this->db->join('usuario', 'ticket.solicitante = usuario.id_usuario');
            $res = $this->db->get_where('andamento', array('usuario.nome' => $this->session->nome));
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

    function msgAndamento($id){
        $res = $this->db->query("select * from andamento where id_ticket = ".$id." order by data_hora desc");
        //$res = $this->db->get_where('andamento', array('id_ticket', $id));
        if($res->num_rows() == 0){
            return 'inativo';
        }else{
            return $res->row()->and_mensagem;
        }
    }

    function estaInativo($id){
        $res = $this->db->get_where('ticket', array('id_ticket' => $id, 'ativo' => true));

        if($res->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }
}
