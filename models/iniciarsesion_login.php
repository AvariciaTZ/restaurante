<?php
/* */
/* iniciarSesion */
/* */
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id,fullname,email,password,fecha_reg,tipo_usuario,direccion FROM usuarios WHERE email='$email'";

    $resultado = mysqli_query($mysqli, $sql);

    //si existe el usuario
    $num = $resultado->num_rows;

    if ($num > 0) {
        $row = $resultado->fetch_assoc();
        $password_bd = $row['password'];
        $pass_c = sha1($password);

        if ($password_bd == $pass_c) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
            $_SESSION['direccion'] = $row['direccion'];

            //muestre el principal 1-administrador 2-usuario
            $tipo_usuario = $_SESSION['tipo_usuario'];
            if ($tipo_usuario == 1) {

                header("Location: /views/admin.php");
            } else if ($tipo_usuario == 2) {
                header("Location: ../index.php");
            }
        } else {
?>
            <!--  <div style="position: absolute;">
                <h3 style="color: black;">La contraseña es incorrecta</h3>
            </div> -->
            <!--  <script>
                alert("La contraseña es incorrecta");
            </script> -->

        <?php
        }
    } else {
        ?>
        <!--  <div style="position: absolute;">
            <h3 style="color: red;">No existe usuario</h3>
        </div>
        <script>
            alert("No existe usuario");
        </script> -->
<?php
    }
}
