<div class="container__menuHorizontal">
    <nav class="menuHorizontal">

        <div class="btnMenu">
            <span class="btnMenu__line" id="btnMenu__line"></span>
            <span class="btnMenu__line" id="btnMenu__line"></span>
            <span class="btnMenu__line" id="btnMenu__line"></span>
        </div>

        <label for="" class="menuHorizontal__logo">
            <img src="/img/logo.png" alt="">
        </label>

        <ul class="menuHorizontal__items">
            <li><a href="http://localhost:3000/index.php?controller=inicio&action=index">Principal </a></li>
            <li class="menuHorizontal__li" id="menuHorizontal__li">
                <a href="/views/iniciarsesion.php">Mi Cuenta</a>
                <ul class="menuHorizontal__items menuHorizontal__items2" id="menuHorizontal__items2">



                    <li class="menuHorizontal__items--li">
                        <div class="exit">

                            <a href="/models/lagout.php">Salir De: <?php echo $nombre; ?></a>



                        </div>

                    </li>
                    <?php  //muestre el principal 1-administrador 2-usuario
                    $tipo_usuario = $_SESSION['tipo_usuario'];
                    if ($tipo_usuario == 1) {
                    ?>
                        <li class="menuHorizontal__items--li">
                            <a href="/views/perfilAdmin.php">Perfil administrador</a>
                        </li>

                        <li class="menuHorizontal__items--li">
                            <a href="http://localhost:3000/index.php?controller=producto&action=gestion">Producto administrador</a>
                        </li>

                    <?php
                    }
                    ?>
                </ul>


            </li>


            <li class="menuHorizontal__li" id="menuHorizontal__li"><a href="http://localhost:3000/index.php?controller=producto&action=verEnCarta">Servicios</a>

                <ul class="menuHorizontal__items menuHorizontal__items2" id="menuHorizontal__items2">
                    <li class="menuHorizontal__items--li"><a href="http://localhost:3000/index.php?controller=producto&action=verEnCarta">Carta</a></li>
                </ul>
            </li>

            <li><a href="/views/nosotros.php">Nosotros</a></li>
        </ul>



    </nav>
</div>