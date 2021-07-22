<?php
    session_start();
    include "database.php";
    if(isset($_POST['email']) && isset($_POST['password'])){

        $resultado=$conexion->query("SELECT * FROM usuario WHERE 
        email='".$_POST['email']."' 
        AND 
        password='".sha1($_POST['password'])."'")or die($conexion->error);
    
        if(mysqli_num_rows($resultado)>0){
            $datos_usuario=mysqli_fetch_row($resultado);
            $nombre=$datos_usuario[1];
            $id_usuario=$datos_usuario[0];
            $email=$datos_usuario[3];
            $imagen_perfil=$datos_usuario[5];
            $nivel=$datos_usuario[6];
            $_SESSION['datos_login']=array(
                'nombre'=>$nombre,
                'id_usuario'=>$id_usuario,
                'email'=>$email,
                'imagen'=>$imagen_perfil,
                'nivel'=>$nivel

            );
            if($nivel=="cliente"){
                header("Location:indexcliente.php");

            }
            if($nivel=="admin"){
                header("Location:admin.php");
            }
            

        }else{
            header("Location:login.php?error=Credenciales incorrectas");
        }
}else{
        header("admin.php");
    }
    
?>