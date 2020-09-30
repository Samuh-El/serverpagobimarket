<?php

try
{
	// $subject = "Enviado desde el otro formulario3";
	// $email = "3correoXDD@gmail.com";
	// $valor = 0.5;
	$subject = $_REQUEST['subject'];
	$email = $_REQUEST['email'];
	$valor = $_REQUEST['valor'];

	$prueba = $valor + 1;

	// Extraer valor UF desde api
    $url = "https://mindicador.cl/api/uf/".date('d-m-Y');
    $json = file_get_contents($url);
    $obj = json_decode($json,true);
    $valorUF = $obj['serie'][0]['valor'];
    
    // Calcular valor según plan seleccionado
	$valor = intval(round(($valor*12)*$valorUF)); // Valor redondeado
	//print_r($valor);

	// //Escribir txt
	// $fp = fopen("subject.txt","w");
	// fwrite($fp, $subject . PHP_EOL);
	// fclose($fp); 

	// $fp = fopen("email.txt","w");
	// fwrite($fp, $email . PHP_EOL);
	// fclose($fp); 

	// $fp = fopen("valor.txt","w");
	// fwrite($fp, $valor . PHP_EOL);
	// fclose($fp); 

	// // leer txt
	// $fichero_texto = fopen ("subject.txt", "r");
	// $subjectC = fread($fichero_texto, filesize("subject.txt"));

	// $fichero_textoDos = fopen ("email.txt", "r");
	// $emailC = fread($fichero_textoDos, filesize("email.txt"));

	// $fichero_textoTres = fopen ("valor.txt", "r");
	// $valorC = fread($fichero_textoTres, filesize("valor.txt"));

	// print_r($subjectC."<br>");print_r($valorC."<br>");print_r($emailC."<br>");
	print_r($valor."<br>"); print_r($email."<br>");print_r($subject."<br>");


	// Enviar a hacer el pago
	//header("Location: examples/payments/create.php");

}

catch(exception $e)
{
	echo("Error al recibir parámetros");
}


?>