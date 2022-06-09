                <div class="tab-pane fade show active container" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                    <div id="buscador" class="h2 m-4 text-danger colorPro">

                        <h2>Buscar</h2>

                        <form action="http://localhost:3000/index.php?controller=producto&action=buscarEnCarta" method="POST">
                            <input type="text" name="busqueda">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </form>
                    </div>

                    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                        <div class="container__carta-productos" id="container__carta-productos">
                            <div class="carta-productos">
                                <!-- 1 -->
                                <div class="product__option">
                                    <button class="btnNameProducto">
                                        <h2>COMPRAS</h2>
                                        <div class="logoFlecha">^</div>
                                    </button>
                                    <?php
                                    /* VER TODAS LAS CONSULTAS de compra*/

                                    while ($bus = $busquedas->fetch_object()) :

                                        include('views/categorias/infoCompraBuscar.php');

                                    endwhile;
                                    ?>