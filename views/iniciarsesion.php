<?php
//include y require
require "../models/conexion.php";

session_start();


/*  */
/* iniciarSesion */
/*  *//*  */
include("../models/iniciarsesion_login.php");
/* register  */
/*  */

include "../models/iniciarsesion_registrar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" type="text/css" href="/css/menuHorizontal.css">
    <link rel="stylesheet" href="/css/nosotros.css">
    <link rel="stylesheet" href="/css/iniciarsesion.css">
    <link rel="stylesheet" href="/css/footer.css">

    <?php

    include("../views/variables.php");
    $logo = "../img/logo.png";
    ?>

</head>

<body>


    <div class="container__menuHorizontal">
        <nav class="menuHorizontal">

            <div class="btnMenu">
                <span class="btnMenu__line" id="btnMenu__line"></span>
                <span class="btnMenu__line" id="btnMenu__line"></span>
                <span class="btnMenu__line" id="btnMenu__line"></span>
            </div>

            <label for="" class="menuHorizontal__logo">
                <img src="/img/logo.png" alt="">
            </label>

            <ul class="menuHorizontal__items">
                <li><a href="http://localhost:3000/index.php?controller=inicio&action=index">Principal </a></li>
                <li class="menuHorizontal__li" id="menuHorizontal__li">
                    <a href="/views/iniciarsesion.php">Mi Cuenta</a>



                </li>


                <li class="menuHorizontal__li" id="menuHorizontal__li"><a href="http://localhost:3000/index.php?controller=producto&action=verEnCarta">Servicios</a>

                    <ul class="menuHorizontal__items menuHorizontal__items2" id="menuHorizontal__items2">
                        <li class="menuHorizontal__items--li"><a href="http://localhost:3000/index.php?controller=producto&action=verEnCarta">Carta</a></li>
                    </ul>
                </li>

                <li><a href="/views/nosotros.php">Nosotros</a></li>
            </ul>



        </nav>
    </div>

    <div class="container__iniciarsesion">
        <div class="iniciarsesion">
            <div class="backbox__iniciarsesion">
                <div class="loginMsg">
                    <div class="textcontent">
                        <p class="title"> ¿No tienes una cuenta?</p>
                        <p>Regístrate y guarda toda tu información.</p>
                        <button id="switch1">Inscribirse</button>
                        <!--   <input type="submit" id="switch1">Sign Up</input> -->
                    </div>
                </div>

                <div class="signupMsg visibility">
                    <div class="textcontent">
                        <p class="title">¿Tener una cuenta?</p>
                        <p>Inicia sesión para ver toda tu colección.</p>
                        <button id="switch2">Iniciar sesión</button>
                        <!--   <input type="submit" id="switch2">Log In</input> -->
                    </div>
                </div>
            </div>
            <!-- backbox -->
            <div class="msgDeErrores">
                <?php
                if (isset($_POST['login'])) {
                    if ($num > 0) {
                        if ($password_bd == $pass_c) {
                        } else {
                ?>
                            <div style="position: absolute ;" class="error">
                                <h3>La contraseña es incorrecta</h3>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <div style="position: absolute;" class="error">
                            <h3>No existe usuario</h3>
                        </div>
                <?php
                    }
                } ?>

                <!--  -->
                <!-- register -->
                <!--  -->
                <?php
                if (isset($_POST['registrar'])) {
                    if (strlen($_POST['fullname']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['direccion']) >= 1  && strlen($_POST['telefono']) == 9 && $_POST['telefono'][0] == 9) {


                        if ($resultado) {
                            header("Location: ../views/iniciarsesion.php");
                        } else {
                ?>
                            <div style="position: absolute ;" class="error">
                                <h3>
                                    ¡Error intente de nuevo!
                                </h3>
                            </div>

                        <?php

                        }
                    } else {
                        ?>
                        <div style="position: absolute ;" class="error">
                            <h3>
                                ¡Error complete los campos!
                            </h3>
                        </div>


                <?php
                    }
                }
                ?>


            </div>
            <div class="frontbox__iniciarsesion">

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="login">
                        <h2>LOG IN</h2>
                        <div class="inputbox">
                            <input type="text" name="email" placeholder="  EMAIL">
                            <input type="password" name="password" placeholder="  PASSWORD" required>
                        </div>
                        <p>FORGET PASSWORD?</p>
                        <!--   <button>LOG IN</button> -->
                        <input type="submit" value="Login" name="login"></input>
                    </div>

                </form>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="signup hide">
                        <h2>SIGN UP</h2>
                        <div class="inputbox">
                            <input type="text" name="fullname" placeholder="  FULLNAME">
                            <input type="email" name="email" placeholder="  EMAIL" value="">
                            <input type="password" name="password" placeholder="  PASSWORD">
                            <input type="text" name="direccion" placeholder="  DIRECCION" value="">
                            <input type="number" name="telefono" placeholder="  TELEFONO" value="">
                        </div>
                        <!--  <button name="registrar">SIGN UP</button> -->
                        <input type="submit" value="Registrar" name="registrar"></input>




                    </div>
                </form>

            </div>
            <!-- frontbox -->
        </div>
    </div>
    <!--  -->
    <?php include('../views/footerViews.php'); ?>
    <!--  -->
    <script src="/js/menuHorizontal.js" type="text/javascript"></script>
    <script src="/js/iniciarsesion.js" type="text/javascript"></script>

</body>

</html>