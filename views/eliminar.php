<?php



include("../models/conexion.php");




$id = $_GET['id'];
$eliminar = "DELETE FROM usuarios WHERE id='$id'";

$resultado = mysqli_query($mysqli, $eliminar);

if ($resultado) {

    header("Location: /views/admin.php");
} else {
?>
    <div style="position: absolute;">
        <h3 style="color: red;">¡No Has Eliminado Correctamente!</h3>

    </div>
<?php

}
