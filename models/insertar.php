<?php

/* include("conexion.php");

$idProducto = $_POST['idProducto'];
$productoR = $_POST['productoR'];
$imagen = $_POST['imagen'];
$precio_compra= $_POST['precio_compra'];
$descripcion = $_POST['descripcion'];

$insertar= "INSERT INTO producto(idProducto, produtoR, imagen, precio_compra, descripcion) VALUES 
('$idProducto', '$productoR', '$imagen', '$precio_compra', '$descripcion')";

$resultado = mysqli_query($mysqli, $insertar);
if ($resultado) {
    
    echo"<script>alert('se ha registrado el usuario con exito');";
    
}else{
        echo"<script>alert('no se ha registrado el usuario con exito');";
} 
    */?> 