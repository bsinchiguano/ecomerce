<?php
include "database.php";
if(!isset($_GET['id_venta'])){
    header("Location: ./indexcliente.php");
}
$datos=$conexion->query("SELECT 
ventas.*, 
usuario.nombre,usuario.telefono,usuario.email
FROM ventas 
INNER JOIN usuario ON ventas.id_usuario=usuario.id
WHERE ventas.id=".$_GET['id_venta'])or die($conexion->error);
$datosUsuario=mysqli_fetch_row($datos);
$datos2=$conexion->query("SELECT * FROM envios WHERE id_venta=".$_GET['id_venta'])or die($conexion->error);
$datosEnvio=mysqli_fetch_row($datos2);
$datos3=$conexion->query("SELECT productos_venta.*,
productos.nombre AS nombre_producto,productos.imagen
FROM productos_venta INNER JOIN productos ON productos_venta.id_producto=productos.id
WHERE id_venta=".$_GET['id_venta'])or die($conexion->error);
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-8322625614662436-070704-d6f544c9c8a90c275ebab2f160210d75-81231027');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "http://192.168.64.3/ProyectoItinerario/thankyou.php",
    "failure" => "http://192.168.64.3/ProyectoItinerario/errorpago.php?error=failure",
    "pending" => "http://192.168.64.3/ProyectoItinerario/errorpago.php?error=pending"
);
$preference->auto_return = "approved";

// Crea un ítem en la preferencia
$datos=array();
for($x=0;$x<10;$x++){
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 75.56;
    $datos[]=$item;

}



$preference->items = $datos;
$preference->save();

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
      <!-- loader  -->
     
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
                              <li> <a href="productclient.php">Productos</a> </li>
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
                        <h2>Elige metodo de pago</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AeIQQU88wbGmJ7ShGosEUbZcRaShSLycnBLV3Xav0SvkPAbqwlzXkMbnb14qAu0A-XLVuTMfHxGMgI1s"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>
<div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row">
          
          <div class="col-md-7">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Venta #<?php echo $_GET['id_venta'];?> </label>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nombre:<?php echo $datosUsuario[6];?> </label>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Email:<?php echo $datosUsuario[8];?> </label>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Telefono:<?php echo $datosUsuario[7];?> </label>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Compañia:<?php echo $datosEnvio[2];?> </label>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Direccion:<?php echo $datosEnvio[3];?> </label>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Estado:<?php echo $datosEnvio[4];?> </label>
                  </div>
                </div>

              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
           
            <h4 class="h1">Total:<?php echo $datosUsuario[2];?></h4>
            <form action="http://192.168.64.3/ProyectoItinerario/insertapago.php" method="POST">
  
  
  
  </form>
  <div id="paypal-button-container"></div>
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
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: <?php echo $datosUsuario[2];?>,
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            if(details.status=='COMPLETED'){
                location.href="./thankyou.php?id_venta=<?php echo $_GET['id_venta'];?>&metodo=paypal";
            }
            alert('Transaction completed by ' + details.payer.name.given_name);
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
  </body>
</html>