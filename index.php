<?php

try
{
	$subjec = $_REQUEST['subject'];
	$email = $_REQUEST['email'];
	$valorRecibido = $_REQUEST['valorRecibido'];

	echo '<script type="text/javascript">alert('.echo()$valorRecibido.');</script>'; 

}

catch(exception $e)
{
	echo("Error al recibir parámetros");
}

//header("Location: examples/payments/create.php"); 

?>