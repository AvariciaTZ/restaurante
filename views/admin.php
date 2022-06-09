<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Detalles de Usuarios</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="fondo-admin">

    <div class="detalles-titulo">
        <h1 class="titulo-h1">Detalles de Usuarios</h1>
    </div>



    <form method="post">
        <div class="tabla">
            <div class="table-responsive-xxl">
                <table class="table table-bordered">
                    <div class="detalles-tabla">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">fecha de registro</th>
                                <th scope="col">Rango</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Operación</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require "../models/conexion.php";
                            global $usuariosMax;
                            if (isset($_POST['ver'])) {

                                /* 
                            $usuariosMax = $usuariosMax + 1; */
                                /* NÚMERO TOTAL */
                                $res2 = mysqli_query($mysqli, "SELECT count(id) as total FROM usuarios");
                                $row2 = mysqli_fetch_assoc($res2);
                                $usuariosMax = $row2["total"];
                                /*   echo "Valor: " . $usuariosMax; */

                                $id = random_int(1, $usuariosMax);

                                /* VER TODAS LAS CONSULTAS */
                                $consulta = "SELECT * FROM usuarios ";
                                $resultado = mysqli_query($mysqli, $consulta);
                                while ($row = mysqli_fetch_assoc($resultado)) {



                            ?>

                                    <tr class="table-light">
                                        <th scope="row"><?php echo $row["id"] ?></th>
                                        <td><?php echo $row["fullname"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["password"] ?></td>
                                        <td><?php echo $row["fecha_reg"] ?></td>
                                        <td><?php echo $row["tipo_usuario"] ?></td>
                                        <td><?php echo $row["direccion"] ?></td>



                                        <!-- editar eliminar -->
                                        <td>
                                            <a href="/views/editar.php?id=<?php echo $row["id"] ?>">Editar</a> |
                                            <a href="/views/eliminar.php?id=<?php echo $row["id"] ?>" class="ClaseEliminar">Eliminar</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                                mysqli_free_result($resultado);
                            }
                            ?>

                            <!-- ATRAS -->
                            <?php
                            if (isset($_POST['atras'])) {

                                header("Location: /index.php");
                            }



                            ?>

                        </tbody>
                    </div>
                    <div class="detalles-opciones ">
                        <input type="submit" value="Ver" name="ver" placeholder="">

                        <input type="submit" value="Atras" name="atras" placeholder="">


                    </div>

                </table>





            </div>
        </div>


    </form>


    <script src="../js/eliminar.js"></script>
</body>

</html>