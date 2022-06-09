<div class="container__productos col justify-content-center mb-4">


    <!-- plantilla de productos -->
    <div class="productos card-x " style="margin-top:80px; width: 50rem;">



        <div class="img__productos">
            <img src="../../img/img_hambur/<?= $product->imagen ?>" class="img__productos card-img-top border border-5 rounded-circle border-dark" alt="">

        </div>



        <div class="card-body">
            <h5 class="img__productos--subtitulo card-title pt-2 text-center "><?= $product->productoR ?></h5>
            <p><?= $product->descripcion ?></p>
            <a class="btn button btn-dark fs-4 text rounded-pill" href="http://localhost:3000/index.php?controller=carrito&action=add&idProducto=<?= $product->idProducto ?>">Añadir a Carrito

                <h5 class="fs-4 text">Precio: <span class="precio fs-4 text">$ <?= $product->precio_compra ?></span></h5>

            </a>
        </div>

    </div>
    <!-- plantilla de productos -->
</div>