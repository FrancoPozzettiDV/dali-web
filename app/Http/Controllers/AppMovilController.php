<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Spatie\CalendarLinks\Link;
use DateTime;
use DateTimeZone;

class AppMovilController extends Controller
{
    
    public function login(Request $request){
        
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'device_name' => ['required'],
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales ingresadas son incorrectas.'],
            ]);
        }
    
        $token = $user->createToken($request->device_name)->plainTextToken;

        $response = [
            'token' => $token,
        ];

        return response($response,200);
    }
	
	public function logout(Request $request){
		
		$request->user()->tokens()->delete();
		$response = [
            'message' => "Cierre de sesión exitosa",
        ];
		return response($response,200);
	}
	
	public function listadoProfesionales(Request $request){
		$profesionales = User::getProfesionales();
		return response($profesionales,200);
	}
	
	public function getTurno(Request $request){
		$id = $request->user()->id;
		$turno = Turno::getTurno($id);
		return response($turno,200);
	}
	
	public function getListadoTurnos(Request $request){
		$idUser = $request->user()->id;
		$idPerfil = $request->user()->id_perfil;
		if($idPerfil == 4){
			$turnos = Turno::getTurnosProfesional($idUser);
		}else{
			$turnos = Turno::getTurnosUsuario($idUser);
		}
		
		return response($turnos,200);
	}
	
	public function crearTurno(Request $request){
		//Guardado de todos los datos e inclusión de datos que se utilizarán
		$idUsuario = $request->id_usuario;
		$nombrePaciente = $request->nombrePaciente;
		$fecha = $request->fecha;
		$horaDesde = $request->desde;
		$horaHasta = $request->hasta;
		$motivo = $request->motivo;
		$idProfesional = $request->id_profesional;
		
		$telefono = $request->telefono;
		
		$emailUsuario = $request->email;
		$usuarioProfesional = User::find($idProfesional);
		$emailProfesional = $usuarioProfesional->email;
		$nombreProf = $usuarioProfesional->nombre;
		$apellidoProf = $usuarioProfesional->apellido;
		//
		
		//Inserción de teléfono en usuario (En caso de que el campo estuviera vacío)
		$user = User::find($idUsuario);
		$user->telefono = $telefono;
		$user->save();
		//
		
		//Creación de turno
		$turno = new Turno;
		
		$turno->id_usuario = $idUsuario;
		$turno->paciente = $nombrePaciente;
		$turno->fecha = $fecha;
		$turno->desde = $horaDesde;
		$turno->hasta = $horaHasta;
		$turno->motivo = $motivo;
		$turno->id_usuario_profesional = $idProfesional;
		$turno->id_estado = 1;
		
		$turno->save();
		//
		
		//Creación de link para agregar al calendario
		$fechaFormateada = date("Y-m-d", strtotime($fecha));
		$from = DateTime::createFromFormat('Y-m-d H:i', ''.$fechaFormateada.' '.$horaDesde.'',new DateTimeZone('America/Argentina/Buenos_Aires'));
		$to = DateTime::createFromFormat('Y-m-d H:i', ''.$fechaFormateada.' '.$horaHasta.'',new DateTimeZone('America/Argentina/Buenos_Aires'));
		//$to = DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 18:00');
		$link = Link::create('Turno DALI', $from, $to)->description('Para el paciente '.$nombrePaciente.'');
		$linkGoogle = $link->google();
		$linkOutlook = $link->webOutlook();
		//
		
		//Creación y envío de mail al usuario y al profesional 
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
            $mail->addAddress($emailUsuario);
            $mail->addCC($emailProfesional);

            //Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'DALI - Nuevo Turno';
            $mail->Body    = 
			'
			<h1>DALI - Nuevo Turno</h1>
			<hr>
			<p>Su turno ha sido procesado correctamente.</p>
			<p>A continuación, puede ver los datos correspondientes: </p>
			<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
			  <tr>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Campo</th>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Datos ingresados</th>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Paciente</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$nombrePaciente.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Fecha</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$fecha.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Desde - Hasta</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$horaDesde.' - '.$horaHasta.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Motivo</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$motivo.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Profesional</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$nombreProf.' '.$apellidoProf.'</td>
			  </tr>
			</table>
			<a href="'.$linkGoogle.'" style="background-color: #f44336; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;  margin: 4px 2px; cursor: pointer;">Agregar al calendario de Google</a>
			<a href="'.$linkOutlook.'" style="background-color: #008CBA; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;  margin: 4px 2px; cursor: pointer;">Agregar al calendario de Outlook</a>
			<h3>¡Muchas gracias por elegirnos!</h3>
			<h4>Saludos cordiales.</h4>
			<h4>Dali</h4>
			';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
			
			//Envío de respuesta
			$response = [
			'message' => "Turno creado exitosamente",
			];
			return response($response,201);
			//
			
        } catch (Exception $e) {
           
        }
		//
	}
	
	public function finalizarTurno(Request $request){
		$idTurno = $request->id_turno;
		$turno = Turno::find($idTurno);
		$turno->id_estado = 2;
		$turno->save();
		$response = [
			'message' => "Turno finalizado exitosamente",
		];
		return response($response,200);
	}
	
	public function cancelarTurno(Request $request){
		//Cambio de estado a cancelado
		$idTurno = $request->id_turno;
		$turno = Turno::find($idTurno);
		$turno->id_estado = 3;
		$turno->save();
		//
		//Obtención de datos que se utilizarán en el mail
		$idProf = $turno->id_usuario_profesional;
		$profesional = User::find($idProf);
		$idUser = $turno->id_usuario;
		$user = User::find($idUser);
		$mailProf = $profesional->email;
		$mailUser = $user->email;
		
		$idPerfil = $request->user()->id_perfil;
		if($idPerfil == 4){
			$to = $mailUser; //El profesional canceló
			$cc = $mailProf;
		}else{
			$to = $mailProf; //El usuario canceló
			$cc = $mailUser;
		}
		
		$nombrePaciente = $turno->paciente;
		$fecha = $turno->fecha;
		$desde = $turno->desde;
		$hasta = $turno->hasta;
		$motivo = $turno->motivo;
		$nombreProf = $profesional->nombre;
		$apellidoProf = $profesional->apellido;
		$desdeFormateado = date("H:i", strtotime($desde));
		$hastaFormateado = date("H:i", strtotime($hasta));
		//
		//Mail
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
            $mail->addAddress($to);
            $mail->addCC($cc);

            //Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'DALI - Turno Cancelado';
            $mail->Body    = 
			'
			<h1>DALI - Turno Cancelado</h1>
			<hr>
			<p>Lamentamos informar que el siguiente turno reservado ha sido cancelado:</p>
			<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
			  <tr>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Campo</th>
				<th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Datos ingresados</th>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Paciente</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$nombrePaciente.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Fecha</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$fecha.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Desde - Hasta</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$desdeFormateado.' - '.$hastaFormateado.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Motivo</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$motivo.'</td>
			  </tr>
			  <tr>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Profesional</td>
				<td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$nombreProf.' '.$apellidoProf.'</td>
			  </tr>
			</table>
			<h4>Saludos cordiales.</h4>
			<h4>Dali</h4>
			';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
			
			//Envío de respuesta
			$response = [
			'message' => "Turno cancelado exitosamente",
			];
			return response($response,200);
			//
			
        } catch (Exception $e) {
           
        }
		//
	}
	
	public function eliminarTurno(Request $request){
		$idTurno = $request->id_turno;
		$turno = Turno::find($idTurno);
		$turno->delete();
		$response = [
			'message' => "Turno eliminado exitosamente",
		];
		return response($response,200);
	}
	
	public function enviarFormulario(Request $request){
		//Guardado de todos los datos e inclusion de datos que se utilizaran
		$user = $request->user();
		$emailUser = $user->email;
		$nombreUser = $user->nombre;
		$apellidoUser = $user->apellido;
		
		$profId = $request->id_profesional;
		$prof = User::find($profId);
		$profEmail = $prof->email;
		
		$pregunta1 = $request->pregunta1;
		$pregunta2 = $request->pregunta2;
		$pregunta3 = $request->pregunta3;
		$pregunta4 = $request->pregunta4;
		$pregunta5 = $request->pregunta5;
		$pregunta6 = $request->pregunta6;
		$pregunta7 = $request->pregunta7;
		$pregunta8 = $request->pregunta8;
		
		//Creación y envío de mail al profesional y al usuario 
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
            $mail->addAddress($profEmail);
            $mail->addCC($emailUser);

            //Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Test de Avance - '.$nombreUser.' '.$apellidoUser;
            $mail->Body    = '<h1 style="color:green;">Resultados - '.date('F Y').'</h1><hr> </br> <h2 style="color:#2296F2;">¿Se cumplieron los objetivos planteados del período?: </h2><h3>'.$pregunta1.'</h3>
			<br/><h2 style="color:#2296F2;">¿Se pudieron aplicar las estrategias indicadas?: </h2><h3>'.$pregunta2.'</h3>
			<br/><h2 style="color:#2296F2;">¿Resultaron efectivas las estrategias aplicadas?: </h2><h3>'.$pregunta3.'</h3>
			<br/><h2 style="color:#2296F2;">¿Se observan avances en la comprensión verbal?: </h2><h3>'.$pregunta4.'</h3>
			<br/><h2 style="color:#2296F2;">¿Mejoró su inteligibilidad del habla?: </h2><h3>'.$pregunta5.'</h3>
			<br/><h2 style="color:#2296F2;">¿Se observan avances en la expresión verbal en cuanto al vocabulario?: </h2><h3>'.$pregunta6.'</h3>
			<br/><h2 style="color:#2296F2;">¿Se observan avances en la expresión verbal en cuanto al contenido?: </h2><h3>'.$pregunta7.'</h3>
			<br/><h2 style="color:#2296F2;">¿Se observan avances en la expresión verbal en cuanto a la estructura?: </h2><h3>'.$pregunta8.'</h3>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
			
			//Envío de respuesta
			$response = [
				'message' => "Datos enviados exitosamente",
			];
			return response($response,201);
			
			
        } catch (Exception $e) {
           
        }
		
	}
}
