<?php

try
{
	// $subject = "Enviado desde el otro formulario";
	// $email = "correoXDD@gmail.com";
	// $valor = 0.3;
	$subject = $_POST['subject'];
	$email = $_POST['email'];
	$valor = $_POST['valor'];

	$prueba = $valor + 1;

	// Extraer valor UF desde api
    $url = "https://mindicador.cl/api/uf/".date('d-m-Y');
    $json = file_get_contents($url);
    $obj = json_decode($json,true);
    $valorUF = $obj['serie'][0]['valor'];
    
    // Calcular valor según plan seleccionado
	$valor = intval(round(($valor*12)*$valorUF)); // Valor redondeado
	//print_r($valor);

	// Enviar a hacer el pago
	header("Location: examples/payments/create.php");

}

catch(exception $e)
{
	echo("Error al recibir parámetros");
}


?>