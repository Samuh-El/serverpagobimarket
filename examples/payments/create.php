<?php
/**
 * Ejemplo de creación de una orden de cobro, iniciando una transacción de pago
 * Utiliza el método payment/create
 */
require(__DIR__ . "/../../lib/FlowApi.class.php");
require(__DIR__ . "/../../index.php");


// RECIBE VALORES DEL CLIENTE
// $subjectC = $subject;
// $emailC = $email;
// $valorC = $valor;


// $subjectC = "Enviado desde el otro formulario";
// $emailC = "correoXDD@gmail.com";
// $valorC = 3000;


try
{

//Para datos opcionales campo "optional" prepara un arreglo JSON
$optional = array(
	//x"rut" => "9999999-9",
	//"otroDato" => "otroDato"
);
$optional = json_encode($optional);


//Prepara el arreglo de datos
$params = array(
	"commerceOrder" => rand(1100,2000),
	"subject" => $subject,
	"currency" => "CLP",
	"amount" => $valor,
	"email" => $email,
	"paymentMethod" => 9,
	"urlConfirmation" => Config::get("BASEURL") . "/examples/payments/confirm.php",
	"urlReturn" => Config::get("BASEURL") ."/examples/payments/result.php",
	"optional" => $optional
);
//Define el metodo a usar
$serviceName = "payment/create";
}

catch(Exception $e)
{
	print_r("Error al preparar parámetros");
}

try {
	// Instancia la clase FlowApi
	$flowApi = new FlowApi;
	// Ejecuta el servicio
	$response = $flowApi->send($serviceName, $params,"POST");
	//Prepara url para redireccionar el browser del pagador
	$redirect = $response["url"] . "?token=" . $response["token"];
	header("location:$redirect");
} 

catch (Exception $e) {
	echo $e->getCode() . " - " . $e->getMessage();
}

?>