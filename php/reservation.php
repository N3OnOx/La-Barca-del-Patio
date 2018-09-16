<?php

/*
 * ------------------------------------
 * Reservation Form Configuration
 * ------------------------------------
 */
 
$to    			= "reservas@labarcadelpatio.es"; // <--- Website Admin email ID here

/*
 * ------------------------------------
 * END CONFIGURATION
 * ------------------------------------
 */
 
$name     = $_POST["name"];
$email    = $_POST["email"];
$website  = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (isset($email) && isset($name)) {
    $subject  = "Nueva reserva de $name"; // <--- Change Email Subject here.
    $subject2  = "$name, hemos confirmado su reserva"; // <--- Change Email Subject here.
	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: ".$name." <".$email.">\r\n"."Reply-To: ".$email."\r\n" ;
	$headers2  = "MIME-Version: 1.0" . "\r\n";
	$headers2 .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers2 .= "From: ".'La Barca del Patio'." <".$to.">\r\n"."Reply-To: ".$to."\r\n" ;
	$msg      = 'Hola, <br/> <br/> Aqui estan los detalles de la reserva:';
	$msg     .= ' <br/> <br/> <table border="1" cellpadding="6" cellspacing="0" style="border: 1px solid  #eeeeee;">';
	foreach ($_POST as $label => $value) {
	    $msg .= "<tr><td width='100'>". ucfirst($label) . "</td><td width='300'>" . $value . " </tr>";
	}
	$msg      .= " </table> <br> --- <br>Este email fue enviado de $website";
	 
	$mail =  mail($to, $subject, $msg, $headers);

	/* Please do not change the values below. */
	if($mail) {
			echo 'success';
	} else {
			echo 'failed';
	}

	mail($email, $subject2, $msg, $headers2);

} // END isset

?>