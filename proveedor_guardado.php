<?php
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:iniciar_sesion.php');
}
require_once('dbconnect.php');
if (isset($_POST['btn_modificar_proveedor'])) {
    
  
    $codprove = $_POST['codprove'];
    $nomempprove = $_POST['nomempprove'];
    $ciudad = $_POST['combo_ciudad'];    
    $municipio = $_POST['combo_municipio'];
    $codpostal = $_POST['codpostal'];
    $codarea = $_POST['codarea'];
    $numprove = $_POST['numprove'];
    $nomprove = $_POST['nomprove'];   
    $cargoprove = $_POST['cargoprove'];
}
$query = "SELECT * FROM proveedor where codprove='" . $codprove . "'";

include 'header_footer/header.php';
?>
<section>
    
</section>
<?php
include 'header_footer/footer.php';
if ($resultado = mysqli_query($link, $query)) {
    $row_cnt = mysqli_num_rows($resultado);
}
if ($row_cnt == 0){
?>

    <script>
        alert('Producto no existe', window.location = 'crud_proveedor.php')
    </script>
    
<?php
}
if ($row_cnt == 1) {
    
    $query2 = "UPDATE proveedor SET nomempprove='" . $nomempprove . "', 
                                    ciudad='" . $ciudad . "',
                                    municipio='" . $municipio . "', 
                                    codpostal='" . $codpostal . "',
                                    codarea='" . $codarea . "', 
                                    numprove='" . $numprove . "',
                                    nomprove='" . $nomprove . "',
                                    cargoprove='" . $cargoprove . "' where codprove ='" . $codprove . "'";
                                    
     //echo $query2;                               
    mysqli_query($link, $query2);
?>
    <script src="alertifyjs/alertify.js"></script>
    <script>
        alertify.alert('CTMC/SYSTEM', 'Producto Actualizado con extito', function() {

            alertify.success('ok');
            window.location = "crud_proveedor.php";
        });
    </script>
    
<?php
}
?>