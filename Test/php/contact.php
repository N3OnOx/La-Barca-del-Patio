<?php

/*
 * ------------------------------------
 * Contact Form Configuration
 * ------------------------------------
 */
 
$to    = "reservas@labarcadelpatio.es"; // <--- Your email ID here


/*
 * ------------------------------------
 * END CONFIGURATION
 * ------------------------------------
 */
 
$name     = $_REQUEST["name"];
$email    = $_REQUEST["email"];
$subject  = $_REQUEST["subject"];
$msg      = $_REQUEST["message"];

if (isset($email) && isset($name)) {
     
  $website = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
    $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$name." <".$email.">\r\n"."Reply-To: ".$email."\r\n" ;
$msg     = "Hola barca, <br/> <br/> Tienes un mensaje de $name ($email)<br/><br/>Mensaje: $msg <br><br> -- <br>Este email fue enviado de $website";
  
   $mail =  mail($to, $subject, $msg, $headers);
  if($mail)
  {
    echo 'success';
  }

else
  {
    echo 'failed';
  }
}

?>