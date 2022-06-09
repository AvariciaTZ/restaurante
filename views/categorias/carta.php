<?php
//include("../../models/conexion.php");
include("models/conexion.php");

/* session_start(); */

if (!isset($_SESSION['id'])) {
  header("Location: /views/iniciarsesion.php");
}

/* capturar al usuario registrado */
$nombre =  $_SESSION['fullname'];
$emailVer =  $_SESSION['email'];
?>


<!-- class="fade" ocultar el div -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#bla" />
  <title>Carta</title>


  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />


  <link rel="stylesheet" type="text/css" href="/css/menuHorizontal.css">
  <link rel="stylesheet" type="text/css" href="/css/footer.css">
  <link rel="stylesheet" type="text/css" href="/css/carta.css">
  <link rel="stylesheet" type="text/css" href="/css/categorias.css">
  <link rel="stylesheet" href="/css/carrito.css">
  <script src="https://kit.fontawesome.com/b7138cc5cd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/registroProductos.css">
  <!-- El script de la librería-->
  <script src="/js/html2pdf.bundle.min.js"></script>
  <script src="/js/factura.js"></script>
  <!-- ver usuario registrado -->
  <link rel="stylesheet" href="/css/facturaPro.css">

  </script>

</head>

<body>

  <div class="container__MProdCont">

    <header class="container-fluid btn btn-black position-sticky top-0">

      <!--  -->
      <?php /* include('../../views/sidebarViews.php') */; ?>
      <?php include('views/sidebarViews.php'); ?>
      <!--  -->


      <!-- selector de producto-carrito -->
      <ul class="nav-ProduCarrito nav nav-pills mb-1 py-1 container " id="pills-tab" role="tablist">

        <li class="nav-item nav-item-product1" role="presentation">
          <a class="nav-link active " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Productos</a>
        </li>
        <li class="nav-item nav-item-product1" role="presentation">
          <a class="nav-link active " id="pills-profile-tab" type="button" href="http://localhost:3000/index.php?controller=carrito&action=index">Carrito</a>
        </li>
      </ul>

    </header>
    <!-- alerta de confirmación -->
    <div class="alert alert-warning container position-sticky top-0 hide" role="alert">
      Producto Añadido al carrito!
    </div>
    <div class="alert container position-sticky top-0 alert-danger remove" role="alert">
      Producto removido!
    </div>

    <!-- tabla de carrito -->
    <div class="tab-content paytable" id="pills-tabContent">
      <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        1
      </div>

      <!-- productos -->



      <div class="tab-pane fade show active container" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


        <div id="buscador" class="h2 m-4 text-danger colorPro">

          <h2>Buscar</h2>

          <form action="http://localhost:3000/index.php?controller=producto&action=buscarEnCarta" method="POST">
            <input type="text" name="busqueda">
            <input type="submit" class="btn btn-primary" value="Buscar">
          </form>
        </div>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

          <div class="container__carta-productos" id="container__carta-productos">
            <div class="carta-productos">
              <!-- 1 -->
              <div class="product__option">
                <button class="btnNameProducto">
                  <h2>HAMBURGUESAS</h2>
                  <div class="logoFlecha">^</div>
                </button>
                <?php
                /* VER TODAS LAS CONSULTAS de producto */

                while ($product = $productos->fetch_object()) :

                  include('views/categorias/infoProductos.php');

                endwhile;
                ?>

                <!-- plantilla de productos -->


              </div>
              <!-- 1 -->
            </div>
          </div>


        </div>

      </div>



      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="/js/menuHorizontal.js"></script>
      <script src="/js/openProductos.js"></script>

      <!-- Paypal -->
      <script src="https://www.paypal.com/sdk/js?client-id=ACA VA EL ID&currency=USD"> </script>
      <script src="/js/carta.js"></script>
      <!-- Paypal -->

</body>

</html>