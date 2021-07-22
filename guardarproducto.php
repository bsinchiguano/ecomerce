<?php

require_once 'database.php';

  $id_categoria = $_REQUEST['id_categoria'];
  $nombre_producto = $_REQUEST['nombre_producto'];
  $cantidad_producto = $_REQUEST['cantidad_producto'];
  $precio_producto = $_REQUEST['precio_producto'];
  
$prod = "INSERT INTO productos (id_categoria,nombre_producto,cantidad_producto,precio_producto) 
VALUES ('$id_categoria','$nombre_producto','$cantidad_producto','$precio_producto')";

$pd = $mysqli->query($prod);

?>



<html lang="en">
     <head> 
     <title>Guardar Vuelo</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="icon.png">
     <link href="css/bootstrap.grid.min.css" rel="stylesheet">
     <script src="js/jquery-3.5.0.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <link href="style.css" rel="stylesheet" type="text/css" />

     </head>
     <body>
         <div class="container">
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($pd) { ?>
                echo "<script> alert("PRODUCTO REGISTRADO"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo "<script> alert("PRODUCTO NO REGISTRADO"); window.location="registerproduct.php";</script>";
             <?php } ?>
        </body>
</html>
