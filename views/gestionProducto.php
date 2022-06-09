<h1>Gestión de productos</h1>

<a href="<?= base_url ?>index.php?controller=producto&action=crear" class="button button-small">
    Crear producto
</a>
<a href="<?= base_url ?>index.php?controller=inicio&action=index" class="button button-small">
    Principal
</a>

<div class="tabla">
    <div class="table-responsive-xxl">
        <table class="table table-bordered">
            <div class="detalles-tabla">
                <thead class="table-info">
                    <tr>
                        <th>ID PRODUCTO</th>
                        <th>NOMBRE DEL PRODUCTO</th>
                        <th>IMAGEN</th>
                        <th>PRECIO</th>
                        <th>DESCRIPCION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($pro = $productos->fetch_object()) : ?>
                        <tr>
                            <td><?= $pro->idProducto; ?></td>
                            <td><?= $pro->productoR; ?></td>
                            <td><?= $pro->imagen; ?></td>
                            <td><?= $pro->precio_compra; ?></td>
                            <td><?= $pro->descripcion; ?></td>
                            <td>
                                <a href="<?= base_url ?>producto/editar&id=<?= $pro->id ?>" class="button button-gestion">Editar</a>
                                <a href="<?= base_url ?>producto/eliminar&id=<?= $pro->id ?>" class="button button-gestion button-red">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </div>
        </table>
    </div>
</div>