<?php
 
 $COMMERCE_CONFIG = array(
	 // FLOW
	//"APIKEY" => "7E966B8F-D97C-4056-B0B7-8BB5F456L12D", // Registre aquí su apiKey
	//"SECRETKEY" => "448dd758e883827f7953501e7fe234e1dfeb1823", // Registre aquí su secretKey
	//SANDBOX
 	"APIKEY" => "62CE5BF1-188A-4A99-A87C-8850189BL0CD", // Registre aquí su apiKey
	"SECRETKEY" => "f0b1dbd16774a13aefef276c52d85fb078a0459e", // Registre aquí su secretKey
	//FLOW
	//"APIURL" => "https://www.flow.cl/api", // Producción EndPoint o Sandbox EndPoint
	//SANDBOX
	"APIURL" => "https://sandbox.flow.cl/api",
 	"BASEURL" => "https://serverpagobimarket.herokuapp.com" //Registre aquí la URL base en su página donde instalará el cliente
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
