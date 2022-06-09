<?php
if (isset($_POST['submit'])) {
    if (empty($nombre)) {
        echo "<p class='error'>Agrega nombre</p>";
    } else {
        if (strlen($nombre) < 2) {
            echo "<p class='error'>Nombre corto</p>";
        }
    }
    if (empty($email)) {
        echo "<p class='error'>Agrega email</p>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p class='error'>email Invalido</p>";
        }
    }
    if (empty($password)) {
        echo "<p class='error'>Agrega contraseña</p>";
    }
}
