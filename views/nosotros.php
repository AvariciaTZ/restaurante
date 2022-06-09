<?php
/* include("models/conexion.php"); */

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: /views/iniciarsesion.php");
}
$nombre =  $_SESSION['fullname'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" type="text/css" href="..//css/menuHorizontal.css">
    <link rel="stylesheet" href="..//css/nosotros.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">

    <?php

    include("../views/variables.php");

    ?>
</head>

<body>

    <!--  -->
    <?php include('../views/sidebarViews.php'); ?>
    <!--  -->


    <div class="container__caja__redaccion">
        <div class="caja__redaccion">
            <img src="/img/logo.png" alt="">
            <h1></h1>
            <h1>¿Quiénes somos?</h1>
            <p>
                Somos un restaurante que se dedica a la venta de pollos, parrillas y bebidas. Nuestro objetivo principal es brindar productos de calidad
                acompañado de un buen servicio al cliente.
            </p>
            <h1>Misión</h1>
            <p>
                Superar las expectativas de nuestros clientes de forma tal que nuestro nombre sea conocido como una experiencia memorable.

                Ser opción destacable y diferente.

                Mantener una excelente calidad en nuestros platos.</p>
            <h1>Visión</h1>
            <p>Ser reconocidos entre los mejores restaurantes a nivel local y nacional por nuestra oferta gastronómica, ambiente y atención.</p>
            <h1>Agradecimiento</h1>
            <p>Gracias por confiar en nosotros. Agradecemos su visita e interacción con nuestro sitio web.</p><br>
            <div class="container__caja__redes">
                <div class="contacto">
                    <h2>Contactonos:</h2>
                    <h2> Av.Los Angeles - Lima - Perú</h2>
                </div>
                <div class="wsp"><a href="https://wa.me/+986657935">WhatsApp -<-- </a>
                </div>
                <div class="correo">
                    <h2>Correo:</h2>
                    <h2>dlucas@gmail.com</h2>
                </div>
            </div>
        </div>
    </div>


    <!--  -->
    <?php include('../views/footerViews.php'); ?>
    <!--  -->

    <script src="..//js/menuHorizontal.js" type="text/javascript"></script>

</body>

</html>