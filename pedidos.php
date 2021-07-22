<?php
session_start();
include "database.php";
if(!isset($_SESSION['datos_login']))
{
  header("Location: admin.php");
}
$arregloUsuario=$_SESSION['datos_login'];
if($arregloUsuario['nivel'] !='admin'){
  header("Location: admin.php");
}
$resultado=$conexion->query("SELECT ventas.*, usuario.nombre, usuario.telefono, usuario.email FROM ventas INNER JOIN usuario ON ventas.id_usuario = usuario.id")or die($conexion->error);
 
 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Lacteos "El Misa"</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
      <!-- header -->
      <header>
      <div class="header">
            <div class="head_top">
               <div class="container">
                  
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                           <?php  if (isset($_SESSION['correo'])) : ?>
						            <a href="#"><?php echo $_SESSION['correo']; ?></a>
                           <?php endif ?>     
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header inner -->
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="logo"/></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li> <a href="admin.php">Inicio</a> </li>
                              <li class="active"> <a href="pedidos.php">Pedidos</a> </li>
                              <li> <a href="usuarios.php">Usuarios</a> </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <li><a class="buy" href="salir.php">Salir</a></li>
               </div>
            </div>
         </div>
         <!-- end header inner --> 
      </header>
      <!-- end header -->
      



      <!-- service --> 
      <div class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Registrar <strong class="black">Categoria</strong></h2>
                  </div>
               </div>
            </div> 
            <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PEDIDOS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
       
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
        if(isset($_GET['error'])){

      ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error'];?>
          </div>

          <?php }?>

          <?php
        if(isset($_GET['success'])){

      ?>
          <div class="alert alert-success" role="alert">
            SE HA INSERTADO CORRECTAMENTE
          </div>

          <?php }?>
        <div id="accordion">
        <?php 
            while($f=mysqli_fetch_array($resultado)){

            
        
        ?>
            <div class="card">
                <div class="card-header" id="heading<?php echo $f['id'];?>">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $f['id'];?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo $f['fecha'].'-'. $f['nombre'] ;?>                   
                    </button>
                </h5>
                </div>

                <div id="collapse<?php echo $f['id'];?>" class="collapse" aria-labelledby="heading<?php echo $f['id'];?>" data-parent="#accordion">
                <div class="card-body">
                <p>Nombre Cliente: <?php echo $f['nombre'] ;?>  </p>
                <p>Email Cliente: <?php echo $f['email'] ;?>  </p>
                <p>Telefono Cliente: <?php echo $f['telefono'] ;?>  </p>
                <p>Status: <b><?php echo $f['status'] ;?></b>  </p>
                <p class="h6">Datos de envio</p>
                <?php 
                    $re=$conexion->query("SELECT * FROM envios WHERE id_venta=".$f['id'])or die($conexion->error);
                    $fila=mysqli_fetch_row($re);
                
                ?>
                <p>Direccion: <?php echo $fila[3] ;?>  </p>
                <p>Estado: <?php echo $fila[4] ;?>  </p>
                <p>Codigo Postal: <?php echo $fila[5] ;?>  </p>
                <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>     
            <th>Precio</th>
            <th>Color</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            $re=$conexion->query("SELECT productos_venta.*, productos.nombre, productos.color
             FROM productos_venta INNER JOIN productos ON productos_venta.id_producto=productos.id
             WHERE productos_venta.id_producto = productos.id")or die($conexion->error);
              while($f2=mysqli_fetch_array($re)){
            ?>
            <td><?php echo $f2['id'];?></td>
            <td><?php echo $f2['nombre'];?></td>
            <td><?php echo number_format($f2['precio'],2,'.',' ' );?></td>
            <td><?php echo $f2['color'];?></td>
            <td><?php echo $f2['cantidad'];?></td>
            <td><?php echo $f2['subtotal'];?></td>
            
           
          </tr>
          <?php 
        }
        ?>
        </tbody>
        </table>
                </div>
                </div>
            </div>
        <?php }?>
        </div>




      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="insertarproducto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Insertar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="nombre" id="nombre" class="form-control" required>
             </div>     
             <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" placeholder="descripcion" id="descripcion" class="form-control" required>
             </div>  
             <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen"  id="imagen" class="form-control" required>
             </div>  
             <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" placeholder="precio" id="precio" class="form-control" required>
             </div>  
             <div class="form-group">
                <label for="inventario">Inventario</label>
                <input type="text" name="inventario" placeholder="inventario" id="inventario" class="form-control" required>
             </div>   
             <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control" required>
                <?php 
                  $res=$conexion->query("SELECT * FROM categorias");
                  while($f=mysqli_fetch_array($res)){
                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';
                  }
                ?>
                </select>
             </div>
             <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" placeholder="color" id="color" class="form-control" required>
             </div>   
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-primary">GUARDAR</button>
        </div>
    </form>
    </div>
  </div>
</div>

  <!-- Modal Eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalEliminarLabel">Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           ¿DESEAS ELIMINAR EL PRODUCTO?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">ELIMINAR</button>
        </div>
   
    </div>
  </div>
</div>

  <!-- Modal Editar-->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="../php/Editarproducto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditar">Editar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                  <input type="hidden" id="idEdit" name="id">
                  
             <div class="form-group">
                <label for="nombreEdit">Nombre</label>
                <input type="text" name="nombre" placeholder="nombre" id="nombreEdit" class="form-control" required>
             </div>     
             <div class="form-group">
                <label for="descripcionEdit">Descripcion</label>
                <input type="text" name="descripcion" placeholder="descripcion" id="descripcionEdit" class="form-control" required>
             </div>  
             <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen"  id="imagen" class="form-control" >
             </div>  
             <div class="form-group">
                <label for="precioEdit">Precio</label>
                <input type="text" name="precio" placeholder="precio" id="precioEdit" class="form-control" required>
             </div>  
             <div class="form-group">
                <label for="inventarioEdit">Inventario</label>
                <input type="text" name="inventario" placeholder="inventario" id="inventarioEdit" class="form-control" required>
             </div>   
             <div class="form-group">
                <label for="categoriaEdit">Categoria</label>
                <select name="categoria" id="categoriaEdit" class="form-control" required>
                <?php 
                  $res=$conexion->query("SELECT * FROM categorias");
                  while($f=mysqli_fetch_array($res)){
                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';
                  }
                ?>
                </select>
             </div>
             <div class="form-group">
                <label for="colorEdit">Color</label>
                <input type="text" name="color" placeholder="color" id="colorEdit" class="form-control" required>
             </div>   
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-primary editar">EDITAR</button>
        </div>
    </form>
    </div>
  </div>
</div>
        </div>
    </div>
      <!-- end service -->
      <!--  footer --> 




      <footr>
         <div class="footer">
            <div class="container">
            
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Contactanos</h3>
                    
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>servicios</h3>
                      <ul class="lik">
                    
                  </div>
               </div>
            </div>
         </div>
            <div class="copyright">
               <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates </a>Redesigned by Misael Cabascango - Dorival Pichamba - Jefferson Yanqui</p>
            </div>
         
      </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>