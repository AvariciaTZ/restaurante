<?php
class compra
{
    private $id;
    private $id_transaccion;
    private $fecha;
    private $status;
    private $email;
    private $id_cliente;
    private $total;

    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }



    public function getid()
    {
        return $this->id;
    }


    public function setid($id)
    {
        $this->id = $id;
    }


    public function getid_transaccion()
    {
        return $this->id_transaccion;
    }


    public function setid_transaccion($id_transaccion)
    {
        $this->id_transaccion = $id_transaccion;
    }


    public function getfecha()
    {
        return $this->fecha;
    }


    public function setfecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public function getstatus()
    {
        return $this->status;
    }


    public function setstatus($status)
    {
        $this->status = $status;
    }


    public function getemail()
    {
        return $this->email;
    }


    public function setemail($email)
    {
        $this->email = $email;
    }
        public function getid_cliente()
    {
        return $this->id_cliente;
    }


    public function setid($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }
        public function gettotal()
    {
        return $this->total;
    }


    public function settotal($total)
    {
        $this->total = $total;
    }
    /*  */
    public function getAll()
    {
        /* $compras = $this->db->query("SELECT TOP 2 * FROM compra WHERE id = 3");
        $compras = $this->db->query("SELECT * FROM compra WHERE id LIMIT 3");        
        $compras = $this->db->query("SELECT * FROM compra WHERE id_transaccion LIKE '%A%';");
        $compras = $this->db->query("SELECT * FROM compra ORDER BY id DESC");*/
        $compras = $this->db->query("SELECT * FROM compra");
        return $compras;
    }
    public function getOne()
    {
        $compra = $this->db->query("SELECT * FROM compra WHERE id = {$this->getid()}");
        return $compra->fetch_object();
    }
    public function getRandom($limit)
    { /* compras, listado de 6 */
        $compras = $this->db->query("SELECT * FROM compra ORDER BY RAND() LIMIT $limit");
        return $compras;
    }
    /* buscardor por compra de orden con forma random */
    public function getBuscar($busqueda = null, $limit)
    { /* Buscar compras, listado de 6 */

        $sql = "SELECT * FROM compra ";

        if (!empty($busqueda)) {
            $sql .= "WHERE email LIKE '%$busqueda%' ";
        }

        if ($limit) {
            /*  $sql .= "ORDER BY RAND() LIMIT $limit"; */
            $sql .= "ORDER BY id DESC ";
        }
        /* SELECT * FROM compra WHERE email LIKE '%@email%' ORDER BY RAND() LIMIT 6

        SELECT * FROM compra WHERE email LIKE '%@hotmail%' ORDER BY id DESC ORDER BY RAND() LIMIT 6 */
        $entradas = $this->db->query($sql);

        $resultado = array();
        if ($entradas && mysqli_num_rows($entradas) >= 1) {
            $resultado = $entradas;
        }

        return $entradas;
    }
}
