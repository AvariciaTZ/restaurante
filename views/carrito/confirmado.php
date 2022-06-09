<br /><br /><br /><br />
<?php if ($_SESSION['factura'] = 'complete') {
?>

    <div class="msgCompraFinalizada">
        <h1>Compra Realizada</h1>
        <p>Tu pedido ha sido guardado. Por favor, espera el tiempo estimado. Gracias.
        </p>
    </div>

<?php
} else {

?>
    <div class="msgCompraFinalizada">
        <h1>Compra No Realizada</h1>
        <p>Tu pedido no ha sido guardado. Por favor, vuelva a intentarlo. Gracias.
        </p>

    </div>
<?php

} ?>
<a href="http://localhost:3000/index.php?controller=producto&action=verEnCarta" class="btn btn-warning">VER MAS PRODUCTOS</a>

<a href="<?= base_url ?>index.php?controller=factura&action=verFactura" class="btn btn-success">FACTURA</a>