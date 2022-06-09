<?php
include("../models/conexion.php");

session_start();

if (!isset($_SESSION['id'])) {
  header("Location: ../views/iniciarsesion.php");
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


  <link rel="stylesheet" type="text/css" href="../css/menuHorizontal.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
  <link rel="stylesheet" type="text/css" href="../css/carta.css">
  <link rel="stylesheet" type="text/css" href="../css/categorias.css">
  <link rel="stylesheet" href="../css/carrito.css">
  <script src="https://kit.fontawesome.com/b7138cc5cd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/registroProductos.css">


</head>

<body>

  <div class="container__MProdCont">

    <header class="container-fluid btn btn-black position-sticky top-0">

      <!--  -->
      <?php include('../views/sidebarViews.php'); ?>
      <!--  -->



      <!-- tabla de carrito -->
      <div class="tab-content" id="pills-tabContent">

        <div class="page-buttons">

          <div class="list-categorias">
            <li class="item-active">
              <a href="/views/admin.php">USUARIOS</a>
            </li>
          </div>

          <!--  <div class="list-categorias">
            <li class="item-active">
              <a href=" ">PEDIDOS</a>
            </li>
          </div> -->
          <div class="list-categorias">
            <li class="item-active">
              <a href="menu/admin.php">MENÚ</a>
            </li>
          </div>




        </div>
      </div>





      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="../js/menuHorizontal.js"></script>
      <script src="../js/openProductos.js"></script>
      <script src="../js/carta.js"></script>

</body>

</html>