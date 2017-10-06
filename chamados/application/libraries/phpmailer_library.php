<?php defined('BASEPATH') OR exit('No direct script access allowed');


class PHPMailer_Library {
    
    public function __construct() {
        log_message('Debug', 'Classe PHPMailer está rodando');
    }
    
    public function send($obj){
        
        $email = new PHPMailer;
        
        $email->isSMTP();
        $email->SMTPAuth = TRUE;
        $email->SMTPSecure = "tls";
        $email->Host = "mail.arapoti.pr.gov.br";
        $email->Port = 587;
        $email->Username = "suporte@arapoti.pr.gov.br";
        $email->Password = "Arapoti@2017";
        $email->setFrom($obj['email'], $obj['nome']);
        $email->addAddress($obj['destino'], 'Suporte');
        $email->addAttachment($obj['anexo']);
        $email->Subject = $obj['assunto'];
        $email->Body = $obj['mensagem'];
        
        if($email->send()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}