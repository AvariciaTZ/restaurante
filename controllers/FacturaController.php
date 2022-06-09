<?php
require_once 'models/carrito/FacturaModels.php';
class facturaController
{


    public function index()
    {
        require_once('../index.php');
    }


    public function verFactura()
    {
        $compra = new Factura();
        $compras = $compra->obtenerFactura();
        /*  */
        $cliente = new Factura();
        $clientes = $cliente->getDatosCliente();

        $empresa = new Factura();
        $empresas = $empresa->getDatosEmpresa();

        $carrito = new Factura();
        $carritos = $carrito->getDatosCarrito();

        $random = new Factura();
        $randoms = $random->getDatosRandom();
        /*  */
        require_once('views/carrito/Factura.php');
    }
    public function addFactura()
    {

        if (isset($_SESSION['id'])) {
            $idUsuario = $_SESSION['id'];
            $stats = carritoController::statsCarrito();
            $total = $stats['total'];

            $factura = new Factura();
            $factura->setIdUsuario($idUsuario);
            $factura->setTotal($total);

            $saveFactura = $factura->saveFactura();
            /* 2 */
            $saveFactura_linea =     $factura->saveFactura_linea();
            $save_detalle_compra =     $factura->savedet_boleta();
            /*  var_dump($saveFactura);
            var_dump($saveFactura_linea);
            var_dump($save_detalle_compra); */
            /* 2 */
            if ($saveFactura && $saveFactura_linea && $save_detalle_compra) {
                $_SESSION['factura'] = 'complete';

                require_once('views/carrito/confirmado.php');
                /*   header('Location: http://localhost:3000/index.php?controller=producto&action=verEnCarta'); */
            } else {
                $_SESSION['factura'] = 'failed';
            }
        } else {
            header('Location:' . base_url);
        }
    }
    public function updateFactura()
    {
    }
    public function removeFactura()
    {
    }
    public function verDatosCliente()
    {
    }
}
