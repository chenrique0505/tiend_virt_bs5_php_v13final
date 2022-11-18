<?php
require_once('dbconnect.php');
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:iniciar_sesion.php');
}


    $codigo = $_POST['codprod'];
    $precio_unidad = $_POST['preunitprod'];
    $nomprod = $_POST['nomprod'];    
    $cant_unidades_almacen = $_POST['unistockprod'];
    $unidades_pedido_prod = $_POST['unipedprod'];
    $codigo_categoria = $_POST['combo_categoria'];
    $codigo_proveedor = $_POST['combo_proveedor'];
    $img_ruta = $_POST['imgprod'];
    $descripcion=$_POST['textarea_producto'];

$query = "SELECT * FROM producto WHERE codprod= '" . $codigo . "'";
//echo $query;


if ($resultado = mysqli_query($link, $query)) {
    $row_cnt = mysqli_num_rows($resultado);
}


if ($row_cnt == 1) {
    //echo $query;
?>
    <script>
        alert('Producto ya existente', window.location= 'principal_sistema.php')
    </script>
<?php

} else if ($row_cnt == 0) {
    $query = "INSERT into producto(codprod,
                                    nomprod,
                                    preunitprod,
                                    unistockprod,
                                    unipedprod,
                                    codcat,
                                    codprove,
                                    imgprod,
                                    descprod) 
                            values('" . $codigo . "',
                                    '" . $nomprod . "',
                                    '" . $precio_unidad . "',
                                    '" . $cant_unidades_almacen . "',
                                    '" . $unidades_pedido_prod . "',
                                    '" . $codigo_categoria . "',
                                    '" . $codigo_proveedor . "',
                                    '" . $img_ruta . "',
                                    '" . $descripcion . "')";

    mysqli_query($link, $query);
    //echo $query;

?>
    <script>
        alert('Producto Agregado Con Exito', window.location = 'principal_sistema.php')
    </script>
    
<?php
}

?>