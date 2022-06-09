<?php
include("../../models/conexion.php");

session_start();

if (!isset($_SESSION['id'])) {
  header("Location: ../../views/iniciarsesion.php");
}
$nombre =  $_SESSION['fullname'];

?>


<!-- class="fade" ocultar el div -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#bla" />
  <title>vanilla Javascript</title>


  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />


  <link rel="stylesheet" type="text/css" href="../../css/menuHorizontal.css">
  <link rel="stylesheet" type="text/css" href="../../css/footer.css">
  <link rel="stylesheet" type="text/css" href="../../css/carta.css">
  <link rel="stylesheet" type="text/css" href="../../css/categorias.css">
  <link rel="stylesheet" href="../../css/carrito.css">
  <script src="https://kit.fontawesome.com/b7138cc5cd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../css/registroProductos.css">


</head>

<body>

  <div class="container__MProdCont">

    <header class="container-fluid btn btn-black position-sticky top-0">

      <!--  -->
      <?php include('../../views/sidebarViews.php'); ?>
      <!--  -->


      <!-- selector de producto-carrito -->
      <ul class="nav-ProduCarrito nav nav-pills mb-1 py-1 container " id="pills-tab" role="tablist">

        <li class="nav-item nav-item-product1" role="presentation">
          <a class="nav-link active " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Productos</a>
        </li>
        <li class="nav-item nav-item-product2" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Carrito</a>
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
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        1
      </div>
      <!-- Registro de Productos -->

      <!-- productos -->
      <div class="tab-pane fade show active container" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <h2 class="h2 m-4 text-danger">Productos</h2>

        <div class="page-buttons">
          <ul class="buttons-group">

            <div class="list-categorias">
              <li class="item-active">
                <a href="carta.php">HAMBURGUESAS</a>
              </li>
            </div>
            <div class="list-categorias">
              <li class="item-active">
                <a href="pollo.php">POLLOS</a>
              </li>
            </div>
            <div class="list-categorias">
              <li class="item-active">
                <a href="mostrito.php">MOSTRITOS</a>
              </li>
            </div>
            <div class="list-categorias">
              <li class="item-active">
                <a href="salchipapa.php">SALCHIPAPAS</a>
              </li>
            </div>
            <div class="list-categorias">
              <li class="item-active">
                <a href="bebidas.php">BEBIDAS</a>
              </li>
            </div>
            <div class="list-categorias">
              <li class="item-active">
                <a href="promos.php">PROMOCIONES</a>
              </li>
            </div>
          </ul>
        </div>

        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

          <div class="container__carta-productos" id="container__carta-productos">
            <div class="carta-productos">
              <!-- 1 -->
              <div class="product__option">
                <button class="btnNameProducto">
                  <h2>PROMOCIONES</h2>
                  <div class="logoFlecha">^</div>
                </button>
                <?php
                /* VER TODAS LAS CONSULTAS */
                $consulta = "SELECT * FROM promos";
                $resultado = mysqli_query($mysqli, $consulta);
                while ($row = mysqli_fetch_assoc($resultado)) {

                  include('infoPromo.php');
                }
                mysqli_free_result($resultado);
                ?>

                <!-- plantilla de productos -->


              </div>
              <!-- 1 -->
            </div>
          </div>


        </div>

      </div>
      <!-- carrito -->
      <div class="tab-pane fade carrito" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <br>
        <table class="table table-dark table-hover">
          <thead>
            <tr class="text-primary">
              <th scope="col">#</th>
              <th scope="col">Productos</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody class="tbody">
            <!-- Productos agregados -->


          </tbody>





        </table>
        <br><br>
        <form id="formTotal" method="POST">
          <div class="row mx-4">
            <div class="col">
              <h3 class="itemCartTotal text-white">Total: 0</h3>
            </div>
            <div class="col d-flex justify-content-end">
              <button class="btn btn-success" type="submit">COMPRAR</button>
            </div>
          </div>
        </form>

      </div>
    </div>

  </div>

  <!--  -->
  <?php include('../../views/footerViews.php'); ?>
  <!--  -->

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  <script src="../../js/menuHorizontal.js"></script>
  <script src="../../js/openProductos.js"></script>
  <script src="../../js/carta.js"></script>

</body>

</html>