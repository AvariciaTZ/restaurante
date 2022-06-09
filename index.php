<?php
include("models/conexion.php");
/* login */
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: views/iniciarsesion.php");
}
$nombre =  $_SESSION['fullname'];
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Polleria</title>


    <link rel="stylesheet" type="text/css" href="css/menuHorizontal.css">

    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <!--importar variables -->
    <!--  -->
    <link rel="stylesheet" type="text/css" href="css/centro.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/carrito.css">
    <link rel="stylesheet" href="/css/factura.css">
    <!-- Factura pdf -->
    <script src="/js/html2pdf.bundle.min.js"></script>
    <!--  -->
    <?php
    require("views/variables.php");
    ?>
</head>


<body>
    <?php
    /* controllers */
    require_once 'autoload.php';
    require_once 'models/db.php';
    require_once 'config/parameters.php';
    include('views/sidebar.php');



    /* MVC */
    function show_error()
    {
        $error = new errorController();
        $error->index();
    }

    if (isset($_GET['controller'])) {
        $nombre_controlador = $_GET['controller'] . 'Controller';
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $nombre_controlador = controller_default;
    } else {
        show_error();
        exit();
    }

    if (class_exists($nombre_controlador)) {
        $controlador = new $nombre_controlador();

        if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
            $action = $_GET['action'];
            $controlador->$action();
        } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
            $action_default = action_default;
            $controlador->$action_default();
        } else {
            show_error();
        }
    } else {
        /* show_error(); */
        header('Location:' . base_url . "index.php?controller=inicio&action=index");
    } ?>
    <?php include('views/footer.php'); ?>

    <script src="/js/menuHorizontal.js" type="text/javascript"></script>
    <script src="/js/app.js" type="text/javascript"></script>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- factura pdf -->
    <script src="/js/factura.js" type="text/javascript"></script>

</body>

</html>