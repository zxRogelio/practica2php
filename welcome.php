<?php
//recuperar los valores de los input
$nombre = $_POST["name"]; 
$edad = $_POST["edad"];
if ($edad>=18)
   echo" <h1>Usted si puede votar<h1> ";
else
   echo " <h1>Usted no puede votar<h1>";
?>
