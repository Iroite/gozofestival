<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email_contact ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_contact ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");


$email_contact    = $_POST['email_contact'];

if(trim($email_contact) == '') {
	echo '<div class="error_message">Por favor, introduce un email válido.</div>';
	exit();
} else if(!isEmail($email_contact)) {
	echo '<div class="error_message">Has introducido un email no válido, por favor inténtalo otra vez.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$message_contact = stripslashes($message_contact);
}


$address = "info@exemplo.com"; // e-mail a personlizar con el de destino


// Below the subject of the email
$e_subject = 'Has sido contactado por' . $email_contact . '.';

// You can change this if you feel that you need to.
$e_body = "Has sido contactado por $email_contact  con el siguiente mensaje a continuación:" . PHP_EOL . PHP_EOL;
$e_content = "\"$message_contact\"" . PHP_EOL . PHP_EOL;
$e_reply = "Tu puedes contactar $email_contact via email, $email_contact ";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email_contact" . PHP_EOL;
$headers .= "Reply-To: $email_contact" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_contact";
$usersubject = "Este no es un sitio para contratar ninguna entrada!";
$userheaders = "From: carlos.pellit@gmail.com\n";
$usermessage = "Gracias por contactar conmigo, te responderé lo antes posible.";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:20px 20px 20px 0'>";
	echo "<strong >Email enviado.</strong>";
	echo "Gracias ,<br> tu mensaje ha sido enviado correctamente. Te contactaremos lo antes posible.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
