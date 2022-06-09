<!DOCTYPE html>
<html>
<head>
	    <link rel="stylesheet" href="fil.css">
	<meta charset="utf-8">
	<title></title>
</head>
<body>

		<?php 

			$busqueda = strolower($_REQUEST['busqueda']);
			if(empty($busqueda)){

				header("location :lista_compras.php");
			}

		?>


	<form action="#" method="get" class="form_search">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda;?>">
		<input type="submit" value="Buscar" class="btn_search">
		
	</form>

<?php 

$rol = '';
if($busqueda == '@hotmail')
{
	$rol = "OR rol LIKE '%1%' ";

}else if($busqueda == '@gmail'){

	$rol = "OR rol LIKE '%2%' ";

}else if($busqueda == '@personal'){

	$rol = "OR rol LIKE '%3%' ";
}





	$sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM compra"
														WHERE (id_transacion LIKE '$busqueda' OR
															total LIKE '$busqueda' OR
    														status  LIKE '$busqueda' OR
    														fecha  LIKE '$busqueda' OR
   															fecha_nueva LIKE '$busqueda' OR
    														email  LIKE '$busqueda' OR
    														id_cliente  LIKE '$busqueda'
    														rol )

    														AND estatus = 1 ");


$query = mysqli_query($conection, "SELECT u.id_transacion, u.total, u.status, u.fecha, u.fecha_nueva, u.email, u.id_cliente, u.rol FROM compra u INNER JOIN rol r ON u.rol = r.idrol
											WHERE
											( u.id_transacion LIKE '$busqueda' OR
												u.total LIKE '$busqueda' OR
    											u.status  LIKE '$busqueda' OR
    											u.fecha  LIKE '$busqueda' OR
   												u.fecha_nueva LIKE '$busqueda' OR
    											u.email  LIKE '$busqueda' OR
    											u.id_cliente  LIKE '$busqueda'
    											r.rol LIKE '$busqueda' )
    											AND
							estatus = 1 ORDER BY u.id_transacion ASC LIMIT $desde,$por_pagina
")


?>

</body>
</html>