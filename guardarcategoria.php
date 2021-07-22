<?php

require_once 'database.php';

  $categoria = $_REQUEST['categoria'];
  
$sql = "INSERT INTO categoria (categoria) 
VALUES ('$categoria')";

$resultado = $mysqli->query($sql);

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
             <?php if($resultado) { ?>
                echo "<script> alert("CATEGORIA REGISTRADO"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo "<script> alert("CATEGORIA NO REGISTRADO"); window.location="registercategoria.php";</script>";
             <?php } ?>
        </body>
</html>
