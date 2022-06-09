<?php

require_once 'models/productoModels.php';
class productoController
{


    public function index()
    {
        require_once 'views/gestionProducto.php';
    }
    public function gestion()
    {
        $producto = new Producto();
        $productos = $producto->getAll();
        /*   require_once 'views/gestionProducto.php'; */
        require_once 'views/gestionProducto.php';
    }
    public function verEnCarta()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        require_once 'views/categorias/carta.php';
        
        
    }
    /* buscardor por producto de orden con forma random */
    public function buscarEnCarta()
    {
        $busqueda = new Producto();
        $busquedas = $busqueda->getBuscar($_POST['busqueda'], 6);

        require_once 'views/carrito/buscar.php';
    }
}
