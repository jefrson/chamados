<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamento extends CI_Controller{

    function __construct() {

        parent::__construct();

        $this->load->model('andamento_model');
        $this->load->model('ticket_model');
        $this->load->library('phpmailer_library');
    }

    //Adiciona um andamento ao ticket
    function adicionarAndamento(){

        //Executa a função de validação
        $this->validar();

        //Adiciona uma classe ao delimitador para que este apareça como error-message
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        //Validação dos dados vindos do formulário
        if($this->form_validation->run()){

            //Instancia o objeto e carrega os dados
            $obj = new stdClass;
            $obj->id_ticket = $this->input->post('id_ticket');
            $obj->and_mensagem = $this->input->post('and_mensagem');
            $obj->data_hora = $this->input->post('data_hora');

            //Verifica se a alteração está concluindo o chamado
            $this->concluido();

            //Adiciona o andamento e envia email da alteração
            if($this->andamento_model->adicionar($obj) == 1 && $this->alterarChamado($obj)){
                $this->load->view('cadastro/sucesso');

                //Verifica se o andamento foi concluido
                $this->concluido($obj);
            }else{
                $this->load->view('cadastro/falha');
            }
        }

        $this->load->view('cadastro/cad_andamento');
    }

    //Adiciona um andamento pelo ticket selecionado na lista de tickets
    function editarAndamento(){
        $id = $this->input->post('tick');

        if($this->andamento_model->estaInativo($id)){
            $this->load->view('cadastro/inativo');
        }else{
            $v = array(
                'tick' => $id
            );

            $this->load->view('cadastro/cad_andamento', $v);
        }
    }

    //Lista os andamentos
    function listarAndamento(){
        $dt = $this->paginacao();

        $v =array(
            'andamentos' => $dt['andamentos'],
            'paginacao' => $dt['paginacao']
        );

        $this->load->view('listagem/list_andamento', $v);
    }

     //Adiciona a paginação à tabela
    function paginacao(){
        $regPag = 8; //Registros por página

        $total = $this->andamento_model->totalReg(); //Total de registros

        $pag = ceil($total/$regPag); //Calcula quantas páginas serão geradas

        //Configuração da paginação
        $config = array(
            'base_url' => site_url().'/listar_andamentos/',
            'total_rows' => $total,
            'per_page' => $regPag,
            'num_links' => $pag,
            'use_page_numbers' => TRUE,
            'first_link' => 'Primeira',
            'last_link' => 'Última',
            'next_link' => 'Próxima',
            'prev_link' => 'Anterior',
            'full_tag_open' => '<ul class="pagination justify-content-center">',
            'full_tag_close' => '</ul>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'attributes' => array('class' => 'page-link')
        );

        //Adiciona a configuração e cria os links
        $this->pagination->initialize($config);
        $dt['paginacao'] = $this->pagination->create_links();

        //Calcula o inicio da visualização dos registros
        $offset = substr($this->uri->uri_string(3),18)*($regPag/2);

        //Busca os andamentos com o limite $regPag e começando em $offset
        $dt['andamentos'] = $this->andamento_model->listar($regPag,ceil($offset));

        return $dt;
    }

    //Altera os andamentos
    function alterarAndamento(){

        $dt = array(
            'id_ticket' => $this->input->post('id_ticket'),
            'and_mensagem' => $this->input->post('and_mensagem'),
            'data_hora' => $this->input->post('data_hora')
        );

        if($this->andamento_model->alterar($dt) == 1){
            $this->load->view('alteracao/sucesso');
        }else{
            //$this->load->view('alteracao/falha');
        }
        $this->load->view('alteracao/alt_andamento');
    }

    //Busca o andamento que vai ser alterado
    function buscarAndamento(){
        $andamento = $this->input->post('buscar');
        $res = $this->andamento_model->selecionarAndamento($andamento);

        $v = array(
            'andamentos' => $res
        );

        $this->load->view('alteracao/alt_andamento_2', $v);
    }

    //Função de validação dos dados do formulário
    function validar(){

        //Regras de validação
        $this->form_validation->set_rules('id_ticket', 'Ticket', 'trim|required');
        $this->form_validation->set_rules('and_mensagem', 'Mensagem', 'trim|required');
        $this->form_validation->set_rules('data_hora', 'Data/Hora', 'trim|required');

        //Mensagem de erro
        $this->form_validation->set_message('required', 'O campo %s é obrigatório!');
    }

    //Função de envio de email de alteração
    function alterarChamado($dados){

        //Dados da Mensagem
        $msg = $this->msg($dados);
        $dados->msg = $msg;
        $dados->nome = $this->session->nome;
        $dados->email = $this->session->email;
        $dados->assunto = "Ticket ".$dados->id_ticket." foi alterado.";

        //Envia email
        if($this->phpmailer_library->send($dados)){
            return TRUE;
        }
        return FALSE;
    }

    //Estrutura a ser enviada por email
    private function msg($dt){
        return "<body>
        <div>
            <p>Chamado alterado por: ".ucwords($this->session->nome)."</p>
            <p>Segue abaixo as informações do chamado:</p>
        </div>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Mensagem</td>
                    <td>Data/Hora</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>".$dt->id_ticket."</td>
                    <td>".$dt->and_mensagem."</td>
                    <td>".date("d/m/Y H:i", strtotime($dt->data_hora))."</td>
                </tr>
            </tbody>
        </table>
    </body>";
    }

    //Função que verifica se o andamento é concluido e inativa o ticket
    private function concluido($obj){
        if(strcasecmp($obj->and_mensagem, "concluido") == 0){
            $dt['id_ticket'] = $obj->id_ticket;
            $dt['ativo'] = false;
            $dt['data_final'] = $obj->data_hora;
            if($this->ticket_model->alterar($dt)){
                return true;
            }else{
                return false;
            }
        }
    }
}
