<?php
class Producto
{
    private $idProducto;
    private $productoR;
    private $imagen;
    private $precio_compra;
    private $descripcion;

    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }



    public function getIdProducto()
    {
        return $this->idProducto;
    }


    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }


    public function getProductoR()
    {
        return $this->productoR;
    }


    public function setProductoR($productoR)
    {
        $this->productoR = $productoR;
    }


    public function getImagen()
    {
        return $this->imagen;
    }


    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }


    public function getPrecio_compra()
    {
        return $this->precio_compra;
    }


    public function setPrecio_compra($precio_compra)
    {
        $this->precio_compra = $precio_compra;
    }


    public function getDescripcion()
    {
        return $this->descripcion;
    }


    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    /*  */
    public function getAll()
    {
        /* $productos = $this->db->query("SELECT TOP 2 * FROM producto WHERE idProducto = 3");
        $productos = $this->db->query("SELECT * FROM producto WHERE idProducto LIMIT 3");        
        $productos = $this->db->query("SELECT * FROM producto WHERE productoR LIKE '%A%';");
        $productos = $this->db->query("SELECT * FROM producto ORDER BY idProducto DESC");*/
        $productos = $this->db->query("SELECT * FROM producto");
        return $productos;
    }
    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM producto WHERE idProducto = {$this->getIdProducto()}");
        return $producto->fetch_object();
    }
    public function getRandom($limit)
    { /* Productos, listado de 6 */
        $productos = $this->db->query("SELECT * FROM producto ORDER BY RAND() LIMIT $limit");
        return $productos;
    }
    /* buscardor por producto de orden con forma random */
    public function getBuscar($busqueda = null, $limit)
    { /* Buscar Productos, listado de 6 */

        $sql = "SELECT * FROM producto ";

        if (!empty($busqueda)) {
            $sql .= "WHERE productoR LIKE '%$busqueda%' ";
        }

        if ($limit) {
            /*  $sql .= "ORDER BY RAND() LIMIT $limit"; */
            $sql .= "ORDER BY idProducto DESC ";
        }
        /* SELECT * FROM producto WHERE productoR LIKE '%Pollo%' ORDER BY RAND() LIMIT 6

        SELECT * FROM producto WHERE productoR LIKE '%Pollo%' ORDER BY idProducto DESC ORDER BY RAND() LIMIT 6 */
        $entradas = $this->db->query($sql);

        $resultado = array();
        if ($entradas && mysqli_num_rows($entradas) >= 1) {
            $resultado = $entradas;
        }

        return $entradas;
    }
}
