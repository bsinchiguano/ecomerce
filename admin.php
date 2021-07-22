<?php
session_start();
include "database.php";
if(!isset($_SESSION['datos_login']))
{
  header("Location:admin.php");
}
$arregloUsuario=$_SESSION['datos_login'];
if($arregloUsuario['nivel'] !='admin'){
  header("Location:admin.php");
}
$resultado=$conexion->query(
"SELECT productos.*,categorias.nombre AS catego FROM 
productos 
INNER JOIN categorias ON productos.id_categoria=categorias.id
ORDER BY id DESC")or die($conexion->error);
 
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
      <title>Lacteos "El Misa"| Administrador</title>
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
                              <li class="active"> <a href="admin.php">Inicio</a> </li>
                              <li> <a href="pedidos.php">Pedidos</a> </li>
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
                     <h2>Nuestros <strong class="black">Productos</strong></h2>
                  </div>
               </div>
            </div>
            </div>
        </div>
    </div>
      <!-- end service -->
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PRODUCTOS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i> INSERTAR PRODUCTO
          </button>
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
        <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Inventario</th>
            <th>Categoria</th>
            <th>Color</th>
          </tr>
        </thead>
        <tbody>
        <tr>
            <?php
              while($f=mysqli_fetch_array($resultado)){
            ?>
            <td><?php echo $f['id'];?></td>
            <td>
            <img src="./images/<?php echo $f['imagen'];?>" width="20px" height="20px"/>
            <?php echo $f['nombre'];?>
            </td>
            <td><?php echo $f['descripcion'];?></td>
            <td>$<?php echo number_format($f['precio'],2,'.',' ' );?></td>
            <td><?php echo $f['inventario'];?></td>
            <td><?php echo $f['catego'];?></td>
            <td><?php echo $f['color'];?></td>
            <td>
               <button class="btn btn-primary btn-small btnEditar" 
                data-id="<?php echo $f['id'];?>"
                data-nombre="<?php echo $f['nombre'];?>"
                data-precio="<?php echo $f['precio'];?>"
                data-descripcion="<?php echo $f['descripcion'];?>"
                data-inventario="<?php echo $f['inventario'];?>"
                data-categoria="<?php echo $f['id_categoria'];?>"
                data-color="<?php echo $f['color'];?>"
                data-toggle="modal" data-target="#modalEditar">
                  <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-danger btn-small btnEliminar" 
                data-id="<?php echo $f['id'];?>"
                data-toggle="modal" data-target="#modalEliminar">
                  <i class="fa fa-trash"></i>
                </button>
            </td>
          </tr>
          <?php 
        }
        ?>
        </tbody>
        </table>
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
    <form action="editarproducto.php" method="POST" enctype="multipart/form-data">
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
         $(document).ready(function(){
    var idEliminar=-1;
    var fila;
    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
      fila=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url:'eliminarproducto.php',
        method:'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        //alert(res);
        $(fila).fadeOut(1000);
      });
      
    });
    $(".btnEditar").click(function(){
      idEditar=$(this).data('id');
      var nombre=$(this).data('nombre');
      var precio=$(this).data('precio');
      var descripcion=$(this).data('descripcion');
      var inventario=$(this).data('inventario');
      var categoria=$(this).data('categoria');
      var color=$(this).data('color');
      $("#nombreEdit").val(nombre);
      $("#precioEdit").val(precio);
      $("#descripcionEdit").val(descripcion);
      $("#inventarioEdit").val(inventario);
      $("#categoriaEdit").val(categoria);
      $("#colorEdit").val(color);
      $("#idEdit").val(idEditar);
    });
  });
      </script> 
   </body>
</html>