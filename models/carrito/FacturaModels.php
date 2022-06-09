<?php

class Factura
{
    /* 1 */
    private $idBoleta;
    /* usuarios */
    private $idUsuario;
    private $fullname;
    private $email;
    private $direccion;
    private $telefono;

    /* carritoController */
    private $total;
    /* add */
    private $fecha_reg_boleta;
    /* 1 */
    /* 2 */
    private $id_compra;
    private $id_producto;
    private $precio;
    private $cantidad;
    /* 2 */
    /* DataBase */
    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }
    /* DataBase */



    /**
     * Get the value of fecha_reg_boleta
     */
    public function getFecha_reg_boleta()
    {
        return $this->fecha_reg_boleta;
    }

    /**
     * Set the value of fecha_reg_boleta
     *
     * @return  self
     */
    public function setFecha_reg_boleta($fecha_reg_boleta)
    {
        $this->fecha_reg_boleta = $fecha_reg_boleta;

        return $this;
    }

    /**
     * Get the value of idBoleta
     */
    public function getIdBoleta()
    {
        return $this->idBoleta;
    }

    /**
     * Set the value of idBoleta
     *
     * @return  self
     */
    public function setIdBoleta($idBoleta)
    {
        $this->idBoleta = $idBoleta;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /* 2 */
    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }


    public function getId_compra()
    {
        return $this->id_compra;
    }


    public function setId_compra($id_compra)
    {
        $this->id_compra = $id_compra;

        return $this;
    }

    /**
     * Get the value of id_producto
     */
    public function getId_producto()
    {
        return $this->id_producto;
    }

    /**
     * Set the value of id_producto
     *
     * @return  self
     */
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;

        return $this;
    }
    /* 2 */

    /**
     * Get the value of fullname
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set the value of fullname
     *
     * @return  self
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }
    /*  */
    /*  */
    /*  */
    public function obtenerFactura()
    {
        /* $productos = $this->db->query("SELECT TOP 2 * FROM producto WHERE idProducto = 3");
        $productos = $this->db->query("SELECT * FROM producto WHERE idProducto LIMIT 3");        
        $productos = $this->db->query("SELECT * FROM producto WHERE productoR LIKE '%A%';");
        $productos = $this->db->query("SELECT * FROM producto ORDER BY idProducto DESC");*/
        $compras = $this->db->query("SELECT * FROM compra");
        return $compras;
    }
    public function saveFactura()
    {
        /* enc_boleta */
        $sql = "INSERT INTO enc_boleta VALUES (null,CURDATE(),{$this->getIdUsuario()},{$this->getTotal()})";
        $saveFactura = $this->db->query($sql);
        $result = false;
        if ($saveFactura) {
            $result = true;
        }
        return $result;
    }
    public function saveFactura_linea()
    {
        /* detalle_compra */

        $sql = "SELECT LAST_INSERT_ID() as 'idBoleta';";
        $query = $this->db->query($sql);
        $factura_id = $query->fetch_object()->idBoleta;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO detalle_compra VALUES (null,{$factura_id},{$producto->idProducto},'{$producto->productoR}',{$producto->precio_compra},{$elemento['unidades']})";
            $saveFactura = $this->db->query($insert);
        }


        $result = false;
        if ($saveFactura) {
            $result = true;
        }
        return $result;
    }
    public function savedet_boleta()
    {
        /* detalle_compra */
        /*  $sqldet_boleta = "SELECT LAST_INSERT_ID() as 'id';";
        $querydet_boleta = $this->db->query($sqldet_boleta);
        $detalle_compra_id = $querydet_boleta->fetch_object()->id; */
        $sqldet_boleta = "SELECT id_compra as 'id' FROM detalle_compra ORDER BY id_compra DESC;";
        $querydet_boleta = $this->db->query($sqldet_boleta);
        $detalle_compra_id = $querydet_boleta->fetch_object()->id;

        /* idBoleta */
        $sqldet_boletax = "SELECT idBoleta as 'id' FROM enc_boleta ORDER BY idBoleta DESC;";
        $querydet_boletax = $this->db->query($sqldet_boletax);
        $idBoleta_compra_id = $querydet_boletax->fetch_object()->id;

        /*  */
        var_dump($detalle_compra_id);
        $insert2 = "INSERT INTO det_boleta VALUES (null,{$idBoleta_compra_id},{$detalle_compra_id})";
        $saveFactura = $this->db->query($insert2);

        $result = false;
        if ($saveFactura) {
            $result = true;
        }
        return $result;
    }
    /*  */
    public function getDatosCliente()
    {
        /* $productos = $this->db->query("SELECT TOP 2 * FROM producto WHERE idProducto = 3");
    $productos = $this->db->query("SELECT * FROM producto WHERE idProducto LIMIT 3");        
    $productos = $this->db->query("SELECT * FROM producto WHERE productoR LIKE '%A%';");
    $productos = $this->db->query("SELECT * FROM producto ORDER BY idProducto DESC");*/
        $id =  $_SESSION['id'];
        $emailVer =  $_SESSION['email'];
        $productos = $this->db->query("SELECT * FROM usuarios WHERE email ='{$emailVer}' AND id = {$id};");

        return $productos;
    } /*  */
    public function getDatosEmpresa()
    {
        /* $productos = $this->db->query("SELECT TOP 2 * FROM producto WHERE idProducto = 3");
    $productos = $this->db->query("SELECT * FROM producto WHERE idProducto LIMIT 3");        
    $productos = $this->db->query("SELECT * FROM producto WHERE productoR LIKE '%A%';");
    $productos = $this->db->query("SELECT * FROM producto ORDER BY idProducto DESC");*/
        $id =  $_SESSION['id'];
        $productos = $this->db->query("SELECT * FROM enc_boleta WHERE idUsuario = {$id} ORDER BY idBoleta DESC LIMIT 1;");

        return $productos;
    }
    public function getDatosCarrito()
    {
        /* idBoleta */
        $sqldet_boletax = "SELECT idBoleta as 'id' FROM enc_boleta ORDER BY idBoleta DESC;";
        $querydet_boletax = $this->db->query($sqldet_boletax);
        $idBoleta_compra_id = $querydet_boletax->fetch_object()->id;
        /* detalle_compra  */
        $productos = $this->db->query("SELECT * FROM detalle_compra WHERE id_compra = {$idBoleta_compra_id} ;");


        return $productos;
    }
    public function getDatosRandom()
    {
        $min = 20;
        $max = 60;
        /* cuantos quiero */
        $count = 1;

        $random = range($min, $max);
        shuffle($random);
        $response = array();
        for ($i = 0; $i < $count && $i < count($random); $i++) {
            array_push($response, $random[$i]);
        }
        return $response[0];
    }
}
