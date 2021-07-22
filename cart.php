<?php
  session_start();
  include 'database.php';
  if(isset($_SESSION['CARRITO'])){
    //si existe buscamos si ya estaba agregado ese producto
    if(isset($_GET['id'])){
      $arreglo=$_SESSION['CARRITO'];
      $encontro=false;
      $numero=0;
      for($i=0;$i<count($arreglo);$i++){
        if($arreglo[$i]['Id']==$_GET['id']){
          $encontro=true;
          $numero=$i;
        }
      }
      if($encontro==true){
        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
        $_SESSION['CARRITO']=$arreglo;
      }else{
        //No estaba el registro 
        $nombre="";
        $precio="";
        $imagen="";
        $res=$conexion->query('SELECT * FROM productos WHERE id='.$_GET['id'])or die($conexion->error);
        $fila=mysqli_fetch_row($res);
        $nombre=$fila[1];
        $precio=$fila[3];
        $imagen=$fila[4];
        $arregloNuevo=array(
                  'Id'=>$_GET['id'],
                  'Nombre'=>$nombre,
                  'Precio'=>$precio,
                  'Imagen'=>$imagen,
                  'Cantidad'=>1
        );
        array_push($arreglo,$arregloNuevo);
        $_SESSION['CARRITO']=$arreglo;
      }
    }
  }else{
    //creamos la variable de sesion
    if(isset($_GET['id'])){
      $nombre="";
      $precio="";
      $imagen="";
      $res=$conexion->query('SELECT * FROM productos WHERE id='.$_GET['id'])or die($conexion->error);
      $fila=mysqli_fetch_row($res);
      $nombre=$fila[1];
      $precio=$fila[3];
      $imagen=$fila[4];
      $arreglo[]=array(
                'Id'=>$_GET['id'],
                'Nombre'=>$nombre,
                'Precio'=>$precio,
                'Imagen'=>$imagen,
                'Cantidad'=>1
      );
      $_SESSION['CARRITO']=$arreglo;
    }
  }
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
   <body class="main-layout">
   <header>
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
                              <li> <a href="index.php">Inicio</a> </li>
                              <li> <a href="#">Quienes Somos</a> </li>
                              <li> <a href="product.php">Productos</a> </li>
                              <li>
                    <a href="cart.php" class="site-cart">
                    <img src="images/carrito.png" width="40" height="40"/>
                      <?php 
                        if(isset($_SESSION['CARRITO'])){
                          echo count($_SESSION['CARRITO']);
                        }
                      ?>
                    </a>
                  </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <li><a class="buy" href="login.php">Inicio de Sesion</a></li>
               </div>
            </div>
         </div>
         <!-- end header inner --> 
      </header>
      <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Productos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <div class="site-wrap">


    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Nombre de Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $total=0;
                  if(isset($_SESSION['CARRITO'])){
                    $arregloCarrito=$_SESSION['CARRITO'];
                    for($i=0;$i<count($arregloCarrito);$i++){  
                      $total=$total+($arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad']);
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid" width="120px">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre']; ?></h2>
                    </td>

                    <td>$<?php echo $arregloCarrito[$i]['Precio']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 180px">
                        <div class="input-group-prepend">
                          <button class="buy btnIncrementar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="txtCantidad" 
                        data-precio="<?php echo $arregloCarrito[$i]['Precio']; ?>"
                        data-id="<?php echo $arregloCarrito[$i]['Id']; ?>"
                        value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>"  aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="buy btnIncrementar" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>

                    <td class="cant<?php echo $arregloCarrito[$i]['Id']; ?>">
                    $<?php echo $arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad']; ?></td>
                    <td><a href="eliminarCarrito.php" class="buy" data-id="<?php echo $arregloCarrito[$i]['Id'];?>">BORRAR</a></td>

                  </tr>
                  <?php } }?>
 
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
        
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <li><a class="buy" href="product.php">Continuar Comprando</a></li>
               </div>
            </div>
            
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total Compra</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total; ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total; ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="buy" onclick="window.location='login.php'">PROCEDER COMPRA</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
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

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

  <script>
  
      $(".txtCantidad").keyup(function(){
        var cantidad=$(this).val();
        var precio=$(this).data('precio');
        var id=$(this).data('id');
        incrementar(cantidad,precio,id);
      });
      $(".btnIncrementar").click(function(){
        var precio=$(this).parent('div').parent('div').find('input').data('precio');
        var id=$(this).parent('div').parent('div').find('input').data('id');
        var cantidad=$(this).parent('div').parent('div').find('input').val();
        incrementar(cantidad,precio,id);
      });
      function incrementar(cantidad,precio,id){
        
        var mult = parseFloat(cantidad)*parseFloat(precio);
        $(".cant"+id).text("$"+mult);
        $.ajax({
          method:'POST',
          url:'actualizar.php',
          data:{
            id:id,
            cantidad:cantidad

          }

        }).done(function(respuesta){
          
        });
      }
    });
  </script>
    
  </body>
</html>