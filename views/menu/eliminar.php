<?php



include("../../models/conexion.php");




$id = $_GET['id'];

$eliminar = "DELETE FROM producto WHERE idProducto='$id'";

$resultado = mysqli_query($mysqli, $eliminar);
var_dump($resultado);
if ($resultado) {

    header("Location: ../menu/admin.php");
} else {
?>
    <div style="position: absolute;">
        <h3 style="color: red;">¡No se ha eliminado Correctamente!</h3>

    </div>
<?php

}
