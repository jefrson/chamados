<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->model('usuario_model');
    }
    
    //Adiciona um usuario
    function adicionarUsuario(){
        
        $cpf = $this->input->post('cpf');
                
        //Faz a validação dos dados inseridos
        $this->validar();
        if($this->form_validation->run()){
            //Cria um objeto e carrega os dados enviados por POST
            $obj = new stdClass;
            $obj->nome = $this->input->post('nome');
            $obj->id_setor = $this->input->post('id_setor');
            $obj->id_cargo = $this->input->post('id_cargo');
            $obj->id_secretaria = $this->input->post('id_secretaria');
            $obj->matricula = $this->input->post('matricula');
            $obj->email = $this->input->post('email');
            $obj->cpf = $cpf;
            $obj->senha = md5($cpf);
            $nivel = $this->input->post('nivel');
            if(isset($nivel)){
                $obj->nivel = TRUE;
            }else{
                $obj->nivel = FALSE;
            }

            $adc = $this->usuario_model->adicionar($obj); //Envia para o Model o objeto que vai ser cadastrado
            echo heading('Cadastrado: '.$adc,6);
        }
        $this->load->view('cadastro/cad_usuario'); //Redireciona para a página
        
    }
    
    //Busca o usuário pelo nome inserido
    function buscarUsuario(){
        
        $id = $this->input->post('nome');
        
        $r = $this->usuario_model->selecionar($id); //Envia para o Model o nome e retorna os dados do banco
        
        $v = array(
            'usuario' => $r
        );
        
        $this->load->view('alteracao/alt_usuarios', $v); //Redireciona para a página e envia o vetor 'usuario'
    }
    
    //Altera os dados do usuário
    function alterarUsuario(){
        //Pega o id do usuário pelo input ou pela sessão
        $id = $this->input->post('id_usuario')?$this->input->post('id_usuario'):$this->session->id_usuario; 
        
        $nivel = $this->input->post('nivel');
        $cpf = $this->input->post('cpf');
        $nome = $this->input->post('nome');
        
        
        
        $dt = array(
            'id_usuario' => $id,
            'nome' => $this->input->post('nome'),
            'id_setor' => $this->input->post('id_setor'),
            'id_cargo' => $this->input->post('id_cargo'),
            'id_secretaria' => $this->input->post('id_secretaria'),
            'matricula' => $this->input->post('matricula'),
            'cpf' => $cpf,
            'email' => $this->input->post('email'),
            'nivel' => isset($nivel)?TRUE:FALSE,
            'senha' => md5($cpf)
        );
        
        $alt = $this->usuario_model->alterar($dt);
        
        $this->load->view('alteracao/alt_usuario');
        echo heading('Alterado: '.$alt,6);
    }

    /* Esta função deveria listar os usuarios, mas por algum motivo não funciona
    function listarUsuario(){
        $this->load->model('usuario_model');
        $usuarios = $this->usuario_model->listarUsuario();
        
        $u = array(
            'usuarios' => $usuarios
        );
        
        $this->load->view('listagem/list_usuario', $u);
    }
    */
    
    //Valida os campos preenchidos no formulário
    private function validar(){
        
        //Define as regras a serem validadas
        $this->form_validation->set_rules('nome','Nome','trim|required|alpha');
        $this->form_validation->set_rules('id_setor','Setor','trim|required|numeric');
        $this->form_validation->set_rules('id_cargo','Cargo','trim|required|numeric');
        $this->form_validation->set_rules('id_secretaria','Secretaria','trim|required|numeric');
        $this->form_validation->set_rules('matricula','Matricula','trim|required|numeric');
        $this->form_validation->set_rules('cpf','CPF','trim|required|numeric|validar_cpf');
        $this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
        
        //Define a mensagem de Erro a ser exibida
        $this->form_validation->set_message('required', 'O campo %s é obrigatório!');
        $this->form_validation->set_message('numeric', 'O campo %s aceita apenas números!');
        $this->form_validation->set_message('alpha', 'O campo %s aceita apenas letras!');
        $this->form_validation->set_message('valid_email', 'Campo %s incorreto!');
        $this->form_validation->set_message('validar_cpf', '%s inválido!');
    }
    
    function callback_validar_cpf($cpf){
        //Verifica se o número digitado contém todos os dígitos
        $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
        
        //Verifica se alguma dessas sequências foi digitada e retorna FALSE
        if(strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111'
           || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444'
           || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777'
           || $cpf == '88888888888' || $cpf == '99999999999'){
            return FALSE;
        }else{
            //Verifica se os números são válidos
            for($i = 9; $i < 11; $i++){
                for($j = 0, $k = 0; $k < $j; $k++){
                    $j += $cpf{$k} * (($i + 1) - $k);
                }
                
                $j = ((10 * $j) % 11) % 10;
                
                if($cpf{$k} != $j){
                    return FALSE;
                }
            }
        }
        return TRUE;
    }    
}