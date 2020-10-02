<?php

try
{
	// $subject = "Enviado desde el otro formulario3";
	// $email = "3correoXDD@gmail.com";
	// $valor = 0.5;

	$subject = $_REQUEST['subject'];
	$email = $_REQUEST['email'];
	$valor = $_REQUEST['valor'];
	$idPlan = $_REQUEST['idPlan'];

	$prueba = $valor + 1;

	// Extraer valor UF desde api
    $url = "https://mindicador.cl/api/uf/".date('d-m-Y');
    $json = file_get_contents($url);
    $obj = json_decode($json,true);
    $valorUF = $obj['serie'][0]['valor'];
    
    // Calcular valor según plan seleccionado
	$valor = round(($valor*12)*$valorUF); // Valor redondeado


	// Enviar a hacer el pago
	header("Location: /examples/payments/create.php?subject=".$subject."&email=".$email."&valor=".$valor."&idPlan=".$idPlan);

}

catch(exception $e)
{
	header("Location: http://bimarketchile.cl/#/errorPagoBiMarket");
}


?>