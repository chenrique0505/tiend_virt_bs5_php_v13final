<?php
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:iniciar_sesion.php');
}
require_once('dbconnect.php');
if (isset($_POST['btn_modificar_producto'])) {
    

    $codigo = $_POST['codprod'];
    $precio_unidad = $_POST['preunitprod'];
    $nomprod = $_POST['nomprod'];    
    $cant_unidades_almacen = $_POST['unistockprod'];
    $unidades_pedido_prod = $_POST['unipedprod'];
    $codigo_categoria = $_POST['combo_categoria'];
    $codigo_proveedor = $_POST['combo_proveedor'];
    $imagen_producto = $_POST['imgprod'];
    $descripcion = $_POST['textarea_desc_producto'];
    
}
$query = "SELECT * FROM producto where codprod='" . $codigo . "'";

include 'header_footer/header.php';
?>
<section>
    
</section>
<?php
include 'header_footer/footer.php';
if ($resultado = mysqli_query($link, $query)) {
    $row_cnt = mysqli_num_rows($resultado);
}
if ($row_cnt == 0) {
?>

    <script>
        alert('Producto no existe', window.location = 'principal_sistema.php')
    </script>
    
<?php
}
if ($row_cnt == 1) {
    
    $query2 = "UPDATE producto SET preunitprod='" . $precio_unidad . "', 
                                    nomprod='" . $nomprod . "',
                                    unistockprod='" . $cant_unidades_almacen . "', 
                                    unipedprod='" . $unidades_pedido_prod . "' ,
                                    codcat='" . $codigo_categoria . "', 
                                    codprove='" . $codigo_proveedor . "' ,
                                    imgprod='" . $imagen_producto . "',
                                    descprod='" . $descripcion . "' where codprod ='" . $codigo . "'";
   

     //echo $query2;                               
    mysqli_query($link, $query2);
?>
    <script src="alertifyjs/alertify.js"></script>
    <script>
        alertify.alert('CTMC/SYSTEM', 'Producto Actualizado con extito', function() {

            alertify.success('ok');
            window.location = "principal_sistema.php";
        });
    </script>
    
<?php
}
?>