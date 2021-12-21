<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function sendMail(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'message' => ['required'],
        ]);

        $nombre = $request->post("name");
        $email = $request->post("email");
        $mensaje = $request->post("message");
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                            //Enable verbose debug output
            $mail->isSMTP();                                                 //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                      //Enable SMTP authentication
            $mail->Username   = env('PHPMAILER_USER');                    //SMTP username
            $mail->Password   = env('PHPMAILER_PASS');                   //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom('franco.pozzetti@davinci.edu.ar', 'Dali');
            $mail->addAddress('franco.pozzetti@davinci.edu.ar', 'Dali User');        //Add a recipient
            //$mail->addAddress('ellen@example.com');                              //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');          //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Asunto respecto a DALI';
            $mail->Body    = '<h1>DALI - Contacto</h1> </br> Nombre: '.$nombre.'<br/> Email: '.$email.'<br/> Mensaje: <br/>'.$mensaje.'';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Message has been sent';
            
            return redirect()->back()->with('success', '¡Información enviada exitosamente!');

        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return redirect()->back()->with('failure', 'La información no se pudo enviar.');
        }
        
    }
}
