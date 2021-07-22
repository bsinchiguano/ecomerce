<?php
include('database.php');
if(!isset($_GET['texto'])){
    header("Location: ./indexcliente.php");
}
?>
<?php
session_start();
if(!isset($_SESSION['datos_login']))
{
  header("Location: indexcliente.php");
}
$arregloUsuario=$_SESSION['datos_login'];
 
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
                              <li> <a href="indexcliente.php">Inicio</a> </li>
                              <li> <a href="#">Quienes Somos</a> </li>
                              <li class="active"> <a href="productclient.php">Productos</a> </li>
                              <li><a href="#" class="d-block"><?php echo $arregloUsuario['nombre'];?></a></li>
                              <li>
                    <a href="cartclient.php" class="site-cart">
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
                  <li><a class="buy" href="salir.php">Salir</a></li>
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
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
              <br>
                <div class="float-md-left mb-4"><h2 class="text-black h5">Buscando resultados para <?php echo $_GET['texto'];?></h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <?php
              $re=$conexion->query("SELECT * FROM categorias");
              while($f=mysqli_fetch_array($re)){
                

              
              ?>
                <li class="mb-1"><a href="./busqueda.php?texto=<?php echo $f['nombre'] ?>"  class="dropdown-item">
                <span><?php echo $f['nombre'];?></span> 
                <span class="text-black ml-auto">
                </span>
                </a></li>
                <?php } ?>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <?php 
              
              $resultado=$conexion->query("SELECT productos.*, categorias.nombre AS categoria FROM productos
              INNER JOIN categorias ON productos.id_categoria=categorias.id
              WHERE
              productos.nombre LIKE '%".$_GET['texto']."%' OR
              productos.descripcion LIKE '%".$_GET['texto']."%' OR
              productos.color LIKE '%".$_GET['texto']."%' OR
              categorias.nombre LIKE '%".$_GET['texto']."%'
              
              ORDER BY id DESC LIMIT 10")or die($conexion->error);
              if(mysqli_num_rows($resultado)>0){

              
              while ($fila = mysqli_fetch_array($resultado)){
                
              
              ?>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                      <div class="block-4 text-center border">
                        <figure class="block-4-image">
                          <a href="shop-singleclient.php?id=<?php echo $fila['id'];?>">
                          <img src="images/<?php echo $fila['imagen'];?>" alt="<?php echo $fila['nombre'];?>" class="img-fluid"></a>
                        </figure>
                        <div class="block-4-text p-4">
                          <h3><a href="shop-singleclient.php?id=<?php echo $fila['id'];?>"><?php echo $fila['nombre'];?></a></h3>
                          <p class="mb-0"><?php echo $fila['descripcion'];?></p>
                          <p class="text-primary font-weight-bold">$<?php echo $fila['precio'];?></p>
                        </div>
                      </div>
                    </div>
            <?php }}else{
                echo '<h2>SIN RESULTADOS</h2>';
            }
                ?>


            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            <br>
          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
              <ul class="list-unstyled mb-0">
              <?php
              $re=$conexion->query("SELECT * FROM categorias");
              while($f=mysqli_fetch_array($re)){

              
              ?>
                <li class="mb-1"><a href="./busquedaclient.php?texto=<?php echo $f['nombre'] ?>" class="d-flex">
                <span><?php echo $f['nombre'];?></span> 
                <span class="text-black ml-auto">
                <?php 
                  $re2=$conexion->query("SELECT COUNT(*) FROM productos WHERE id_categoria=".$f['id']);
                  $fila=mysqli_fetch_row($re2);
                  echo $fila[0];
                ?>
                </span>
                </a></li>
                <?php } ?>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Marca</h3>
                <?php 
                $re=$conexion->query("SELECT distinct color FROM productos");
                while($f=mysqli_fetch_array($re)){

                
                
                ?>
                <a href="./busquedaclient.php?texto=<?php echo $f['color'];?>" class="d-flex color-item align-items-center" >
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black"><?php echo $f['color'];?></span>
                </a>
                <?php }?>
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
    
  </body>
</html>