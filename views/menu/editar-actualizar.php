<?php



include("../../models/conexion.php");




$id = $_POST['idProducto'];
$nombre = $_POST['productoR'];
$imagen = $_POST['imagen'];
$precio= $_POST['precio_compra'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$actualizar = "UPDATE producto set productoR='$nombre',
 imagen='$imagen', precio_compra='$precio', descripcion='$descripcion', categoria='$categoria' where idProducto='$id'";

$resultado = mysqli_query($mysqli, $actualizar);
if ($resultado) {
?>
    <div style="position: absolute;">
        <h3 style="color: green;">¡Se ha actualizado correctamente!</h3>

    </div>
<?php
    header("Location: ../menu/admin.php");
} else {

?>
    <div style="position: absolute;">
        <h3 style="color: red;">¡No se ha actualizado correctamente!</h3>

    </div>
<?php

}
