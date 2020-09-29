<?php

try
{
	$subjec = $_REQUEST['subject'];
	$email = $_REQUEST['email'];
	$valorRecibido = $_REQUEST['valorRecibido'];

	print_r($valorRecibido);
}

catch(exception $e)
{
	echo("Error al recibir parámetros");
}

//header("Location: examples/payments/create.php"); 

?>