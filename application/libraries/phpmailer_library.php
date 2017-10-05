<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    
require './vendor/autoload.php';

class PHPMailer_Library {
      
    public function __construct() {
        log_message('Debug', 'Classe PHPMailer está rodando');
    }
    
    public function send($obj){
    
        $email = new PHPMailer;
        
        $email->isSMTP();
        $email->isHTML(TRUE);
        $email->CharSet = 'utf-8';
        $email->SMTPAuth = TRUE;
        $email->SMTPSecure = "ssl";
        $email->Host = "smtp.gmail.com";
        $email->Port = 465;
        $email->Username = "chamados.arapoti.pre@gmail.com";
        $email->Password = "Brasil2017";
        $email->setFrom('chamados.arapoti.pre@gmail.com', $obj->nome);
        $email->addAddress('suporte@arapoti.pr.gov.br', 'Suporte');
        $email->addAddress($obj->email, $obj->nome);
        $email->addAttachment($obj->anexo);
        $email->Subject = $obj->assunto;
        $email->Body = $obj->msg;

        if($email->send()){
            return TRUE;
        }else{
            return FALSE;
        }        
    }    
}