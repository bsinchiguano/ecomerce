<?php

  require 'database.php';
  
  $fila=$conexion->query("SELECT * FROM productos WHERE id=".$_POST['id'])or die($conexion->error);
  $id=mysqli_fetch_row($fila);
  if(file_exists('images/'.$id[0])){
      unlink('images/'.$id[0]);
  }
  $conexion->query("DELETE FROM productos WHERE id=".$_POST['id'])or die($conexion->error);
  echo "LISTO!";
  ?>
