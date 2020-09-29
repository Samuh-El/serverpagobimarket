<?php

    $valorRecibido = 0.3;

    // Extraer valor UF desde api
    $url = "https://mindicador.cl/api/uf/".date('d-m-Y');
    $json = file_get_contents($url);
    $obj = json_decode($json,true);

    // Extrae valor actual
    $valorUF = $obj['serie'][0]['valor'];
    
    // Calcular valor según plan seleccionado
    $valorfinal = $valorRecibido*$valorUF;
    echo($valorfinal);

    /* config class datos
    <?php
 
 $COMMERCE_CONFIG = array(
 	"APIKEY" => "7E966B8F-D97C-4056-B0B7-8BB5F456L12D", // Registre aquí su apiKey
 	"SECRETKEY" => "448dd758e883827f7953501e7fe234e1dfeb1823", // Registre aquí su secretKey
 	"APIURL" => "https://www.flow.cl/api", // Producción EndPoint o Sandbox EndPoint
 	"BASEURL" => "http://localhost/FlowApi" //Registre aquí la URL base en su página donde instalará el cliente
 );
 
 class Config {
 	
	static function get($name) {
		global $COMMERCE_CONFIG;
		if(!isset($COMMERCE_CONFIG[$name])) {
			throw new Exception("The configuration element thas not exist", 1);
		}
		return $COMMERCE_CONFIG[$name];
	}
 }

    
    
    */

?>
