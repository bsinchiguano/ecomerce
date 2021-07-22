<?php
$conexion = new mysqli('localhost', 'root', '', 'bd-proyecto');
if($conexion->connect_error){
  die("No hubo conexion");
}
?>
