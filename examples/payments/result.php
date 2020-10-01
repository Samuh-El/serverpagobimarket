<?php
/**
 * Pagina del comercio para redireccion del pagador
 * A esta página Flow redirecciona al pagador pasando vía POST
 * el token de la transacción. En esta página el comercio puede
 * mostrar su propio comprobante de pago
 */
require(__DIR__ . "/../../lib/FlowApi.class.php");

try {
	// Recibe email
	$email = $_REQUEST['email'];
	$idPlan = $_REQUEST['idPlan'];
	$nombrePlan =$_REQUEST['nombrePlan'];

	//Recibe el token enviado por Flow
	if(!isset($_POST["token"])) {
		throw new Exception("No se recibio el token", 1);
	}
	$token = filter_input(INPUT_POST, 'token');
	$params = array(
		"token" => $token
	);
	//Indica el servicio a utilizar
	$serviceName = "payment/getStatus";
	$flowApi = new FlowApi();
	$response = $flowApi->send($serviceName, $params, "GET");
	
	//print_r($response);
	//http://bimarketchile.cl/#/post-compra

	// INSERTAR EN BD
	try
	{
		$servername = "190.107.177.34";
		$username = "genbupro_Samuel";
		$password = "?iNIxS68Y}6)";
		$dbname = "genbupro_bimarket";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) 
		{
			die("Falló conexión: " . $conn->connect_error); 
			header("Location: http://bimarketchile.cl/#/errorPagoBiMarket");
		}

		// INSERT INTO `Correo` (`id`, `correo`, 
		//`idPlan`, `fechaInsertado`, `estado`) VALUES (NULL, '', '', CURRENT_TIMESTAMP, '');
		$sql="INSERT INTO `Correo` (`id`, `correo`, `idPlan`, `fechaInsertado`, `estado`,`nombrePlan`) VALUES
		(NULL, '".$email."', '".$idPlan."' , CURRENT_TIMESTAMP, '0','".$nombrePlan."');";

		if ($conn->query($sql) === TRUE) {

			//file_put_contents("php://stderr", "La query fue: ".$sql.PHP_EOL);
			file_put_contents("php://stderr", "Registro agregado".PHP_EOL);
		} 
		else {
			file_put_contents("php://stderr", "ERROR ENTRO AL ELSE".PHP_EOL);
			echo "Error: " . $sql . "<br>" . $conn->error;
			header("Location: http://bimarketchile.cl/#/errorPagoBiMarket");
		}

		$conn->close();
	}

	catch(Exception $eee)
	{
		header("Location: http://bimarketchile.cl/#/errorPagoBiMarket");
	}
	// FIN INSERTAR BD
	
	header("Location: http://bimarketchile.cl/#/post-compra");

	
} catch (Exception $e) {
	//echo "Error: " . $e->getCode() . " - " . $e->getMessage();
	header("Location: http://bimarketchile.cl/#/errorPagoBiMarket");
}

?>