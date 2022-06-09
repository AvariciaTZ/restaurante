<!-- carrito -->
<br> <br> <br> <br>
<div class="tab-pane carrito" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <!-- Registro de Productos -->

    <br>
    <!-- FACTURA DE PRODUCTOS 'tableCar' - 'factura.js' -->

    <div class="tableCar">

        <!-- /* Muestra direccion */ -->

        <table class="table table-dark table-hover ">
            <thead>
                <tr class="text-primary">
                    <th scope="col">#</th>
                    <th scope="col">Productos</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <!-- Productos agregados -->
            <?php
            foreach ($carrito as $indice => $elemento) :
                $producto = $elemento['producto'];
            ?>

                <tbody class="tbody">
                    <th scope="row">#<?= ++$indice ?></th>
                    <td class="table__productos">

                        <?php if ($producto->imagen != null) { ?>
                            <img src="<?= base_url ?>img/img_hambur/<?= $producto->imagen ?>" alt="" style="height:100px; width:100px">
                        <?php   } else { ?>
                            <img src="<?= base_url ?>img/logo.png" alt="" style="height:100px; width:100px">
                        <?php   } ?>

                        <h6 class="title"><a href="<?= base_url ?>index.php?controller=carrito&action=add&idProducto=<?= $producto->idProducto ?>"><?= $producto->productoR ?></a></h6>

                    </td>
                    <td class="table__price">
                        <p><?= $producto->precio_compra ?></p>
                    </td>
                    <td class="table__cantidad">
                        <!-- <?= $elemento['unidades'] ?> -->
                        <input type="text" min="1" value="<?= $elemento['unidades'] ?>" class="input__elemento">
                        <button class="delete btn btn-warning">
                            <a class="" href="<?= base_url ?>index.php?controller=carrito&action=up&index=<?= $indice ?>">+</a>

                        </button>
                        <button class="delete btn btn-warning">
                            <a class="" href="<?= base_url ?>index.php?controller=carrito&action=down&index=<?= $indice ?>">-</a>

                        </button>
                        <button class="delete btn btn-danger">
                            <a href="<?= base_url ?>index.php?controller=carrito&action=remove&index=<?= $indice ?>">X</a>
                        </button>

                    </td>
                </tbody>
            <?php endforeach; ?>
            <!-- Productos agregados -->





        </table>
        <br><br>
        <div class="row mx-4">
            <div class="col">
                <?php $stats = carritoController::statsCarrito(); ?>
                <h3 class="itemCartTotal text-black ">
                    Total: <?= $stats['total'] ?>$
                </h3>


            </div>
            <div class="col d-flex justify-content-end">
                <button class="btn btn-success " type="submit">
                    <a href="<?= base_url ?>index.php?controller=factura&action=addFactura" class="btn btn-success">COMPRAR</a>
                </button>
                <button class="btn btn-warning " type="submit">
                    <a href="<?= base_url ?>index.php?controller=producto&action=verEnCarta" class="btn btn-warning">SEGUIR COMPRANDO</a>
                </button> <button class="btn btn-danger " type="submit">
                    <a href="<?= base_url ?>index.php?controller=carrito&action=delete_all" class="btn btn-danger">VACIAR COMPRA</a>
                </button>

            </div>
        </div>
    </div>
</div>

<div class="pagoPaypalFac">
    <div id="paypal-button-container"></div>
</div>

</div>