<?php

require_once 'models/productoModels.php';
class carritoController
{

    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        require_once 'views/carrito/index.php';
    }
    public function add()
    {
        if (isset($_GET['idProducto'])) {
            $producto_id  = $_GET['idProducto'];
        } else {
            header('Location:' . base_url);
        }
        if (isset($_SESSION['carrito'])) {
            $counter = 0;

            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['idProducto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            //conseguir producto
            $producto = new Producto();
            $producto->setIdProducto($producto_id);
            $producto = $producto->getOne();
            //añadir carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "idProducto" => $producto->idProducto,
                    "productoR" => $producto->productoR,
                    "precio_compra" => $producto->precio_compra,
                    "unidades" => 1,
                    "producto" => $producto

                );
            }
        }
        header('Location:' . base_url . "index.php?controller=carrito&action=index");
        //http://localhost:3000/index.php?controller=carrito&action=index
    }
    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][--$index]['unidades']++;
        }
        header('Location:' . base_url . "index.php?controller=carrito&action=index");
    }

    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][--$index]['unidades']--;

            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        header('Location:' . base_url . "index.php?controller=carrito&action=index");
    }



    public function remove()
    {

        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][--$index]);
            header('Location:' . base_url . "index.php?controller=carrito&action=index");
        }
    }
    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header('Location:' . base_url . "index.php?controller=carrito&action=index");
    }
    public static function statsCarrito()
    {
        $stats = array(
            'count' => 0,
            'subTotal' => 0,
            'iva' => 0.10,
            'total' => 0
        );

        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $producto) {
                $stats['subTotal'] += $producto['precio_compra'] * $producto['unidades'];

                $stats['total'] = ($stats['subTotal'] * $stats['iva']) + $stats['subTotal'];
            }
            $stats['iva'] = 10;
        }

        return $stats;
    }
}
