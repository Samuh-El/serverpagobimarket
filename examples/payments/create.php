<?php
/**
 * Ejemplo de creación de una orden de cobro, iniciando una transacción de pago
 * Utiliza el método payment/create
 */
require(__DIR__ . "/../../lib/FlowApi.class.php");

// 1. Extrae valor actual de UF
//https://mindicador.cl/api/uf/28-09-2020


//Para datos opcionales campo "optional" prepara un arreglo JSON
$optional = array(
	//"rut" => "9999999-9",
	//"otroDato" => "otroDato"
);
$optional = json_encode($optional);

// Recibe parámetros del cliente
try
{
	// Recibe los datos
	$subject = $_POST['subject'];
	$email = $_POST['email'];
	$valorRecibido = $_POST['valorRecibido'];

    // Extraer valor UF desde api
    $url = "https://mindicador.cl/api/uf/".date('d-m-Y');
    $json = file_get_contents($url);
    $obj = json_decode($json,true);

    // Extrae valor actual
    $valorUF = $obj['serie'][0]['valor'];
    
    // Calcular valor según plan seleccionado
    $amount = $valorRecibido*$valorUF;
    echo($amount);

}
catch(Exception $e)
{
	echo("Error al recibir parámetros o obtener fecha o valor UF");
}

//Prepara el arreglo de datos
$params = array(
	"commerceOrder" => rand(1,2000),
	"subject" => $subject,
	"currency" => "CLP",
	"amount" => $amount,
	"email" => $email,
	"paymentMethod" => 9,
	"urlConfirmation" => Config::get("BASEURL") . "/examples/payments/confirm.php",
	"urlReturn" => Config::get("BASEURL") ."/examples/payments/result.php",
	"optional" => $optional
);
//Define el metodo a usar
$serviceName = "payment/create";

try {
	// Instancia la clase FlowApi
	$flowApi = new FlowApi;
	// Ejecuta el servicio
	$response = $flowApi->send($serviceName, $params,"POST");
	//Prepara url para redireccionar el browser del pagador
	$redirect = $response["url"] . "?token=" . $response["token"];
	header("location:$redirect");
} catch (Exception $e) {
	echo $e->getCode() . " - " . $e->getMessage();
}

?>