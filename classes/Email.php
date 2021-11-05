<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


class Email{

    private $mail;

    public function __construct($host,$username,$password,$port){ 

        $this->mail = new PHPMailer(true);
         
        
        /* Desabilitado as informações de quando o phpmailer manda um email */
        //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host       = $host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $username;
        $this->mail->Password   = $password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = $port;
    }

    public function Emitente($email, $nome){
        $this->mail->setFrom($email, $nome);//Quem está enviando
        $this->mail->isHTML(true);
        $this->mail->CharSet = 'UTF-8';
    }
    
    public function Destinatario($email,$nome){
        $this->mail->addAddress($email,$nome);//Para quem será destinado o e-mail
    }

    public function Envio($assunto, $corpo,$semhtml){
        $this->mail->isHTML(true);
        $this->mail->Subject = $assunto;
        $this->mail->Body = $corpo;
        $this->mail->AltBody = $semhtml;
    }

    public function Enviar(){
       $this->mail->send(); 
    }

}
?>