<?php

try
{
	$subjec = $_REQUEST['subject'];
	$email = $_REQUEST['email'];
	$valorRecibido = $_REQUEST['valorRecibido'];
	header("Location: examples/payments/create.php?subject=$subjec&email=$email&valorRecibido=$valorRecibido"); 
	
}

catch(exception $e)
{
	echo("Error al recibir parámetros");
}


?>