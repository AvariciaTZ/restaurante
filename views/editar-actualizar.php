<?php



include("../models/conexion.php");




$id = $_POST['id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = sha1(trim($_POST['password']));
$direccion = $_POST['direccion'];

$fecha_reg = date("d/m/y");
$tipo_usuario = $_POST['tipo_usuario'];
$actualizar = "UPDATE usuarios set fullname='$fullname', email='$email', password='$password',
  fecha_reg='$fecha_reg', tipo_usuario='$tipo_usuario', direccion='$direccion' where id='$id'";

$resultado = mysqli_query($mysqli, $actualizar);
if ($resultado) {
?>
    <div style="position: absolute;">
        <h3 style="color: green;">¡Has Actualizar correctamente!</h3>

    </div>
<?php
    header("Location: /views/admin.php");
} else {

?>
    <div style="position: absolute;">
        <h3 style="color: red;">¡No Has Actualizar correctamente!</h3>

    </div>
<?php

}
