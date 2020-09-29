<?php

$subjec = $_REQUEST['subject'];
$email = $_REQUEST['email'];
$valorRecibido = $_REQUEST['valorRecibido'];

echo '<script language="javascript">alert("'.echo($valorRecibido).'");</script>';
//header("Location: examples/payments/create.php"); 

?>