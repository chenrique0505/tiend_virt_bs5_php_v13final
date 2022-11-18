<?php
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:iniciar_sesion.php');
}
require_once('dbconnect.php');
$codigo = $_GET['codprove'];
$query = "SELECT * from proveedor  where codprove='" . $codigo . "'";
//rigth join producto using(codprove)
if ($resultado = mysqli_query($link, $query)) {
    $row_ctn = mysqli_num_rows($resultado);
    //echo $row_ctn;
}
if ($row_ctn == 0) {
    //echo $row_ctn;
?>

    <script>
        alertify.alert('CTMC/SYSTEM', 'No se puede eliminar Proveedor!',
            function() {
                alertify.success('ok');
                window.location = "crud_proveedor.php"
            });
    </script>
<?php
}
if ($row_ctn > 0) {
    $query2 = "DELETE from proveedor where codprove ='" . $codigo . "'";
    //echo $query;
    //echo$row_ctn;
    mysqli_query($link, $query2);
    header('localtion:crud_proveedor.php');
}

?>
<script>
    window.location = "crud_proveedor.php";
</script>
