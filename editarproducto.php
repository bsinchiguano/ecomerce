<?php
include "database.php";

if(isset($_POST['nombre'])&&isset($_POST['descripcion'])&&isset($_POST['precio'])
&&isset($_POST['inventario'])&&isset($_POST['categoria'])&&isset($_POST['color']) ){
    
    $subirimagen=false;
    //if(isset($_POST['imagen'])){
        if($_FILES['imagen']['name']!=''){
            //para guardar una imagen
            
            $carpeta="./images/";
            $nombre=$_FILES['imagen']['name'];
            $temp=explode('.',$nombre);
            $extension=end($temp);
            $nombreFinal=time().'.'.$extension;
            if($extension=='jpg' || $extension=='png'){
                if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta.$nombreFinal)){
                    $fila=$conexion->query("SELECT * FROM productos WHERE id=".$_POST['id'])or die($conexion->error);
                    $id=mysqli_fetch_row($fila);
                    if(file_exists('./images/'.$id[0])){
                    unlink('./images/'.$id[0]);
                    }

                    $conexion->query("UPDATE productos SET imagen='".$nombreFinal."' WHERE id=".$_POST['id']);
                }        
            }//llave archivo
        
        }//llave si no esta vacio
   // }//llave imagen

    $conexion->query("UPDATE productos SET 
                nombre='".$_POST['nombre']."', 
                descripcion='".$_POST['descripcion']."', 
                precio=".$_POST['precio'].", 
                inventario=".$_POST['inventario'].",
                id_categoria=".$_POST['categoria'].", 
                color='".$_POST['color']."' 
                WHERE id=".$_POST['id']);

    //echo "SE ACTUALIZO";
    header("Location: admin.php?success");
}
?>