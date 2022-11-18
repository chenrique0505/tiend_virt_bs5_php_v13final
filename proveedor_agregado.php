<?php
require_once('dbconnect.php');
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:iniciar_sesion.php');
}


    $codprove = $_POST['codprove'];
    $nomempprove = $_POST['nomempprove'];
    $ciudad = $_POST['combo_ciudad'];    
    $municipio = $_POST['combo_municipio'];
    $codpostal = $_POST['codpostal'];
    $codarea = $_POST['codarea'];
    $numprove = $_POST['numprove'];
    $nomprove = $_POST['nomprove'];
    $cargoprove=$_POST['cargoprove'];
    









$query = "SELECT * FROM proveedor WHERE codprove= '" . $codprove . "'";
//echo $query;


if ($resultado = mysqli_query($link, $query)) {
    $row_cnt = mysqli_num_rows($resultado);
}


if ($row_cnt == 1) {
    //echo $query;
?>
    <script>
        alert('Producto ya existente', window.location= 'crud_proveedor.php')
    </script>
<?php

} else if ($row_cnt == 0) {
    $query = "INSERT into proveedor(codprove,
                                    nomempprove,
                                    ciudad,
                                    municipio,
                                    codpostal,
                                    codarea,
                                    numprove,
                                    nomprove,
                                    cargoprove) 
                            values('" . $codprove . "',
                                    '" . $nomempprove . "',
                                    '" . $ciudad . "',
                                    '" . $municipio . "',
                                    '" . $codpostal . "',
                                    '" . $codarea . "',
                                    '" . $numprove . "',
                                    '" . $nomprove . "',
                                    '" . $cargoprove . "')";

    mysqli_query($link, $query);
    //echo $query;
?>
    <script>
        alert('Producto Agregado Con Exito', window.location = 'crud_proveedor.php')
    </script>
    
<?php
}

?>