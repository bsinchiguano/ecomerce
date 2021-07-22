<?php

require_once 'database.php';

  $c_fname = $_REQUEST['c_fname'];
  $c_phone = $_REQUEST['c_phone'];
  $c_email_address = $_REQUEST['c_email_address'];
  $c_account_password = $_REQUEST['c_account_password'];
  
$sql = "INSERT INTO usuario(nombre,telefono,email,password,img_perfil,nivel) 
VALUES ('$c_fname','$c_phone','$c_email_address',sha1('$c_account_password'),'default.jpg','cliente')";

$resultado = $conexion->query($sql);

?>



<html lang="en">
     <head> 
     <title>Guardar Cliente</title>
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
                echo "<script> alert("Cliente REGISTRADO"); window.location="login.php";</script>";
             <?php } else { ?>
               echo "<script> alert("Cliente NO REGISTRADO"); window.location="registro.php";</script>";
             <?php } ?>
        </body>
</html>
