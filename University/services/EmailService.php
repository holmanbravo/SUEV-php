<?php

require_once 'IEmailService.php';
require_once dirname(__dir__) . '/phpmailer/class.phpmailer.php';
class EmailService  implements IEmailService
{
   private $mail;

    public function __construct()
    {

        $this->mail = new PHPMailer();
        //indico a la clase que use SMTP
        $this->mail->IsSMTP();

        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$mail->SMTPDebug = 2;

        //Debo de hacer autenticaci�n SMTP
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "ssl";

        //indico el servidor de Gmail para SMTP
        $this->mail->Host = "smtp.gmail.com";

        //indico el puerto que usa Gmail
        $this->mail->Port = 465;

        //indico un usuario / clave de un usuario de gmail
        $this->mail->Username = "crisboyr@gmail.com";
        $this->mail->Password = "Oliver10";

    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }


    public function enviarCorreo(array $correosDestino,$fechaInicio,$fechaFin)
    {
        for ($i = 0; $i < sizeof($correosDestino); $i++) {
        $this->mail->From = "crisboyr@gmail.com";
        $this->mail->FromName = "SUEV";
        $this->mail->Subject= "Examen";
        $this->mail->addAddress($correosDestino[$i]["correoElectronico"]);
        $this->mail->IsHTML(true);
        /** Configurar cuerpo del mensaje **/
        $this->mail->Body= 'Buen dia querido estudiante,le informamos que tiene un examen programado en plataforma,el cual lo puede presentar desde el <b>'.$fechaInicio.'</b> hasta el <b>'.$fechaFin.'</b>';
        $this->mail->AltBody = 'Buen dia querido estudiante,le informamos que tiene un examen programado en plataforma,el cual lo puede presentar desde el '.$fechaInicio.' hasta el '.$fechaFin;

        /** Para que use el lenguaje español **/
        $this->mail->setLanguage('es');

        if(!$this->mail->send()) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo.'<br/>';
        } else {
            echo 'Mensaje enviado correctamente'.'<br/>';
            $this->mail->ClearAddresses();
        }

        }

    }
}
?>