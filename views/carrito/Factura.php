<?php if (isset($_SESSION['id'])) { ?>

    <!-- traer el subTotal y total -->
    <?php $stats = carritoController::statsCarrito(); ?>
    <!-- traer el subTotal y total -->

    <div class="printFactura">
        <!-- <form method="POST" action="http://localhost:3000/index.php?controller=factura&action=addFactura"> -->
        <div class="contenedorParaQueNoseDesordene">
            <div class="printFacturaPrint">
                <!-- logo -->
                <section class="sectionPack cabRestaurante">
                    <h1>Bienvenido al restaurante D'LUCAS</h1>
                </section>
                <!--  restaurante -->
                <section class="sectionPack restaurante">
                    <?php while ($emp = $empresas->fetch_object()) : ?>
                        <!--  -->
                        <div class="box capRestaurante">
                            <label for="" class="menuHorizontal__logo factura">
                                <img src="/img/logo.png" alt="">
                            </label>
                        </div>
                        <!--  -->
                        <div class="box capRestaurante">
                            <h2>Nro.Boleta:</h2>
                            <h5><?= $emp->idBoleta; ?></h5>
                            <h2>Fecha de la boleta:</h2>
                            <h5><?= $emp->fecha_reg_boleta; ?></h5>
                            <h2>I.V.A</h2>
                            <h5><?= $stats['iva'] ?>%</h5>
                        </div>
                        <div class="box capRestaurante">
                            <h2>Telefono:</h2>
                            <h5>986 657 935</h5>
                            <h2>Método de pago:</h2>
                            <h5>Pago contra entraga</h5>
                            <h2>Tipo de pago:</h2>
                            <h5>Efectivo</h5>
                        </div>
                    <?php endwhile; ?>

                </section>
                <!-- cliente -->
                <section class="sectionPack restaurante cliente">
                    <?php while ($cli = $clientes->fetch_object()) : ?>
                        <!--  -->
                        <div class="box capRestaurante">
                            <h2>Nombres:</h2>
                            <h5><?= $cli->fullname; ?></h5>
                            <h2>Email:</h2>
                            <h5><?= $cli->email; ?></h5>
                        </div>
                        <div class="box capRestaurante">
                            <h2>Telefono:</h2>
                            <h5><?= $cli->telefono; ?></h5>
                            <h2>Dirección:</h2>
                            <h5><?= $cli->direccion; ?></h5>
                        </div>
                    <?php endwhile; ?>

                </section>
                <!--  <section class="sectionPack cliente">
                    <div class="boxCliente">
                        <?php while ($cli = $clientes->fetch_object()) : ?>
                            <label for="fullname">
                                <h5>Nombres:</h5>
                                <input type="text" name="fullname" id="fullname" value="<?= $cli->fullname; ?>" require disabled>
                            </label>
                            <label for="email">
                                <h5>Email:</h5>
                                <input type="email" name="email" id="email" value="<?= $cli->email; ?>" require disabled>
                            </label>
                            <label for="telefono">
                                <h5>Telefono:</h5>
                                <input type="text" name="telefono" id="telefono" value="<?= $cli->telefono; ?>" require disabled>
                            </label>
                            <label for="direccion">
                                <h5>Dirección:</h5>
                                <input type="text" name="direccion" id="direccion" value="<?= $cli->direccion; ?>" require disabled>
                            </label>
                        <?php endwhile; ?>
                    </div>

                </section> -->
                <section class="sectionPack contProductos">
                    <table class="table table-hover">
                        <thead>
                            <tr class="cabProductos  table-danger">
                                <th scope="col">
                                    <h2>Producto</h2>
                                </th>
                                <th scope="col">
                                    <h2>Precio</h2>
                                </th>
                                <th scope="col">
                                    <h2>Cantidad</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($car = $carritos->fetch_object()) : ?>
                                <tr class="detProductos">
                                    <th>
                                        <h2><?= $car->nombre; ?></h2>
                                    </th>
                                    <td>
                                        <h2><?= $car->precio; ?></h2>
                                    </td>
                                    <td>
                                        <h2><?= $car->cantidad; ?></h2>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </section>
                <!-- traer el subTotal y total -->
                <section class="sectionPack restaurante footerCompra">
                    <div class="box capRestaurante capFooterCompra">
                        <h2>Subtotal</h2>
                        <h5><?= $stats['subTotal'] ?>$</h5>
                        <h2>IVA</h2>
                        <h5><?= $stats['iva'] ?>%</h5>
                        <h2>Total a Pagar</h2>
                        <h5><?= $stats['total'] ?>$</h5>
                    </div>

                </section>
            </div>
            <!-- No print lo de abajo -->
            <div class="sectionPack msgCompra  ">

                <h2>Espere su pedido en: <?= $randoms  ?> Min</h2>

            </div>

            <section class="sectionPack ComprarProductosFactura" style="text-align:center;">

                <div class="btn btn-danger">
                    <a class="btn btn-danger" href="http://localhost:3000/index.php?controller=carrito&action=index">REGRESAR A PEDIDOS</a>
                </div>

                <div class="btn btn-danger"> <button class="btn btn-danger" id="btnFactura">DESCARGAR FACTURA</button></div>
            </section>
        </div>
        <!--    </form> -->
    </div>
<?php } else {
    header("Location: http://localhost:3000/index.php?controller=carrito&action=index");
}
?>