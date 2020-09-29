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

?>