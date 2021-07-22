<?php
include "./database.php";

if(isset($_POST['nombre'])&&isset($_POST['descripcion'])&&isset($_POST['precio'])
&&isset($_POST['inventario'])&&isset($_POST['categoria'])&&isset($_POST['color']) ){
    //para guardar una imagen
    $carpeta="./images/";
    $nombre=$_FILES['imagen']['name'];

    
    $temp=explode('.',$nombre);
    $extension=end($temp);
    $nombreFinal=time().'.'.$extension;
    if($extension=='jpg' || $extension=='png'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
                $conexion->query("INSERT INTO productos(nombre,descripcion,imagen,precio,color,id_categoria,inventario)VALUES
                (
                    '".$_POST['nombre']."',
                    '".$_POST['descripcion']."',
                    '$nombreFinal',
                    ".$_POST['precio'].",
                    '".$_POST['color']."',
                    ".$_POST['categoria'].",
                    '".$_POST['inventario']."'
                
                )"
                )or die($conexion->error);
                header("Location: admin.php?success");

        }else{
            header("Location: admin.php?error=No se pudo subir imagen");

        }
    }else{
        header("Location: admin.php?error=Favor subir una imagen válida");

    }


}else{
    header("Location: admin.php?error=Favor de llenar todos los campos");
}


?>