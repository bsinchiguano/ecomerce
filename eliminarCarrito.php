<?php
session_start();
$arreglo = $_SESSION['CARRITO'];
for($i=0;$i<count($arreglo);$i++){
    if($arreglo[$i]['Id']==$_POST['id']){
        $arregloNuevo[]=array(
            'Id'=>$arreglo[$i]['Id'],
            'Nombre'=>$arreglo[$i]['Nombre'],
            'Precio'=>$arreglo[$i]['Precio'],
            'Imagen'=>$arreglo[$i]['Imagen'],
            'Cantidad'=>$arreglo[$i]['Cantidad']
        );
    }
}
if(isset($arregloNuevo)){
    $_SESSION['CARRITO']=$arregloNuevo;
}else{
    //quiere decir que el registro a eliminar era el unico que habia
    unset($_SESSION['CARRITO']);
}
echo "LISTO";
?>

<html lang="en">
     <head> 
     <title>Eliminar Producto</title>
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
             <?php if($arreglo) { ?>
                echo "<script> alert("PRODUCTO BORRADO"); window.location="cartclient.php";</script>";
             <?php } else { ?>
               echo "<script> alert("PRODUCTO NO BORRADO"); window.location="cartclient.php";</script>";
             <?php } ?>
        </body>
</html>