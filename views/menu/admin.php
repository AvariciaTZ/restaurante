<?php
require "../../models/conexion.php";

if (isset($_POST['guardar'])) {

    if (strlen($_POST['productoR']) >= 1 && strlen($_POST['imagen']) >= 1 && strlen($_POST['precio_compra']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['categoria']) >= 1) {

        $productoR = trim($_POST['productoR']);
        $imagen = trim($_POST['imagen']);
        $precio_compra = trim($_POST['precio_compra']);
        $descripcion = trim($_POST['descripcion']);
        $categoria = trim($_POST['categoria']);

        $consulta = "INSERT INTO producto (productoR, imagen, precio_compra, descripcion, categoria) VALUES ('$productoR','$imagen','$precio_compra','$descripcion','$categoria')";

        $resultado = mysqli_query($mysqli, $consulta);

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
    }
}

?>


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
        <h1 class="titulo-h1">PRODUCTOS</h1>
    </div>



    <form method="post">
        <div class="tabla">
            <div class="table-responsive-xxl">
                <table class="table table-bordered">
                    <div class="detalles-tabla">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Opcion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="table-light">
                                <!-- <th scope="row"><?php /* echo $row["id"] */  ?></th> -->
                                <!--  <td><input type="hidden" value="<?php /* echo $row["id"] */  ?>" name="id"></td> -->
                                <td><input type="text" value="" name="productoR"></td>
                                <td>
                                    <form action="#" method="POST" enctype="multipart/form-data"><input type="file" value="" name="imagen"></form>
                                </td>
                                <td><input type="text" value="" name="precio_compra"></td>
                                <td><input type="text" value="" name="descripcion"></td>
                                <td> 
                                    <select name="categoria" >
                                        <option selected></option>
                                        <option>Hamburguesa</option>
                                        <option>Pollos</option>
                                        <option>Salchipapa</option>
                                        <option>Bebida</option>
                                        <option>Promo</option>
                                    </select>
                                </td>
                                <td><input type="submit" value="Guardar" name="guardar"></td>

                            </tr>

                        </tbody>
                    </div>
                </table>
                <table class="table table-bordered">
                    <div class="detalles-tabla">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Opcion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require "../../models/conexion.php";
                            global $prodMax;
                            if (isset($_POST['ver'])) {

                                /* 
                            $usuariosMax = $usuariosMax + 1; */
                                /* NÚMERO TOTAL */
                                $res2 = mysqli_query($mysqli, "SELECT count(idProducto) as total FROM producto");
                                $row2 = mysqli_fetch_assoc($res2);
                                $prodMax = $row2["total"];
                                /*   echo "Valor: " . $usuariosMax; */

                                $id = random_int(1, $prodMax);

                                /* VER TODAS LAS CONSULTAS */
                                $consulta = "SELECT * FROM producto";
                                $resultado = mysqli_query($mysqli, $consulta);
                                while ($row = mysqli_fetch_assoc($resultado)) {



                            ?>

                                    <tr class="table-light">
                                        <th scope="row"><?php echo $row["idProducto"] ?></th>
                                        <td><?php echo $row["productoR"] ?></td>
                                        <td><img src="../../img/img_hambur/<?php echo $row['imagen'] ?>" alt="" width="100"></td>
                                        <td><?php echo $row["precio_compra"] ?></td>
                                        <td><?php echo $row["descripcion"] ?></td>
                                        <td><?php echo $row["categoria"] ?></td>


                                        <!-- editar eliminar -->
                                        <td>
                                            <a href="../menu/editar.php?id=<?php echo $row["idProducto"] ?>">Editar</a> |
                                            <a href="../menu/eliminar.php?id=<?php echo $row["idProducto"] ?>" class="ClaseEliminar">Eliminar</a>
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

                                header("Location: ../perfilAdmin.php");
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