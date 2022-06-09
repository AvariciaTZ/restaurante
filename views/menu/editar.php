<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Editar</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="fondo-admin">

    <div class="detalles-titulo">
        <h1 class="titulo-h1">Editar Detalles del Producto</h1>
    </div>



    <form method="post" action="../menu/editar-actualizar.php">
        <div class="tabla">
            <div class="table-responsive-xxl">
                <table class="table table-bordered">
                    <div class="detalles-tabla">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Funcion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include("../../models/conexion.php");



                            $id = $_GET['id'];
                            /* VER TODAS LAS CONSULTAS */
                            $consulta = "SELECT * FROM producto where  idProducto='$id'";
                            $resultado = mysqli_query($mysqli, $consulta);
                            while ($row = mysqli_fetch_assoc($resultado)) {



                            ?>

                                <tr class="table-light">
                                    <!-- <th scope="row"><?php /* echo $row["id"] */  ?></th> -->
                                    <!--  <td><input type="hidden" value="<?php /* echo $row["id"] */  ?>" name="id"></td> -->
                                    <th scope="row"><?php echo $row["idProducto"]  ?><input type="hidden" value="<?php echo $row["idProducto"]  ?>" name="idProducto"></th>
                                    <td><input type="text" value="<?php echo $row["productoR"] ?>" name="productoR"></td>
                                    <td>
                                        <form action="#" method="POST" enctype="multipart/form-data"><input type="file" value="img_food<?php echo $row["imagen"] ?>" name="imagen"></form>
                                    </td>
                                    <td><input type="text" value="<?php echo $row["precio_compra"] ?>" name="precio_compra"></td>
                                    <td><input type="text" value="<?php echo $row["descripcion"] ?>" name="descripcion"></td>
                                    <td>
                                    <select name="categoria">
                                        <option>Hamburguesa</option>
                                        <option>Pollos</option>
                                        <option>Salchipapa</option>
                                        <option>Bebida</option>
                                        <option>Promo</option>
                                    </select>
                                </td>
                                    <td><input type="submit" value="Actualizar" name="actualizar"></td>

                                </tr>
                            <?php
                            }
                            mysqli_free_result($resultado);

                            ?>

                            <!-- ATRAS -->
                            <?php
                            if (isset($_POST['atras'])) {
                                header("Location: ../menu/admin.php");
                            }


                            ?>

                        </tbody>
                    </div>
                    <div class="detalles-opciones ">


                        <input type="submit" value="Atras" name="atras" placeholder="">

                    </div>

                </table>





            </div>
        </div>


    </form>


</body>

</html>