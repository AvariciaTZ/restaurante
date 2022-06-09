<?php
include("../models/conexion.php");

session_start();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);
echo '<pre>';
print_r($datos);
echo '</pre>';
if (is_array($datos)) {
    $id_transacion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    $consultaPay = "INSERT INTO compra (id_transaccion,fecha,status,email,id_cliente, total) VALUES ('$id_transacion','$fecha_nueva','$status','$email','$id_cliente','$total')";

    $resultadoPay = mysqli_query($mysqli, $consultaPay);

    if ($resultadoPay) {

?>
        <div style="position: absolute;">
            <h3 style="color: red;">¡REGISTRO FACTURA PAY!</h3>
        </div>
<?php
    }
}
/* https://www.youtube.com/watch?v=fRYErum_xkY&list=PL-Mlm_HYjCo-Odv5-wo3CCJ4nv0fNyl9b&index=9 */
