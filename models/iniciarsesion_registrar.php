<!--  -->
<!-- register -->
<!--  -->
<?php
if (isset($_POST['registrar'])) {

    if (strlen($_POST['fullname']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['telefono']) == 9 && $_POST['telefono'][0] == 9) {

        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $password = sha1(trim($_POST['password']));
        $fecha_reg = date("d/m/y");
        $tipo_usuario = 2;
        $direccion = trim($_POST['direccion']);
        $telefono = trim($_POST['telefono']);
        $consulta = "INSERT INTO usuarios (fullname, email, password, fecha_reg, tipo_usuario,direccion,telefono) VALUES ('$fullname','$email','$password','$fecha_reg','$tipo_usuario','$direccion','$telefono')";

        $resultado = mysqli_query($mysqli, $consulta);

        if ($resultado) {
            /*  header("Location: ../views/iniciarsesion.php"); */
        } else {
?>

            <script>
                alert("¡Error intente de nuevo!");
            </script>
        <?php
        }
    } else {
        ?>

        <!--  <script>
            alert("¡Error complete los campos!");
        </script> -->
    <?php
    }


    /*  header("Location: ../views/iniciarsesion.php"); */
} else {

    ?>

    <!-- <script>
        alert("Debes registrarte");
    </script> -->
<?php
}



?>