<?php

    // INSERTAR EN BD
    $servername = "190.107.177.34";
    $username = "genbupro_Samuel";
    $password = "?iNIxS68Y}6)";
    $dbname = "genbupro_bimarket";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Falló conexión: " . $conn->connect_error);
    }

    // INSERT INTO `Correo` (`id`, `correo`, 
    //`idPlan`, `fechaInsertado`, `estado`) VALUES (NULL, '', '', CURRENT_TIMESTAMP, '');
    $sql="INSERT INTO `Correo` (`id`, `correo`, `idPlan`, `fechaInsertado`, `estado`) VALUES
    (NULL, 'correoprueba@gmail.com', '1', CURRENT_TIMESTAMP, '1');";

    if ($conn->query($sql) === TRUE) {

        //file_put_contents("php://stderr", "La query fue: ".$sql.PHP_EOL);
        file_put_contents("php://stderr", "Registro agregado".PHP_EOL);
    } 
    else {
        file_put_contents("php://stderr", "ERROR ENTRO AL ELSE".PHP_EOL);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    // FIN INSERTAR BD

?>