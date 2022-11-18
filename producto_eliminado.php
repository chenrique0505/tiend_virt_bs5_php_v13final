<?php
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:bienvenida.php');
}
require_once('dbconnect.php');
$codigo = $_GET['codprod'];
$query = "SELECT * from producto  where codprod='" . $codigo . "'";

if ($resultado = mysqli_query($link, $query)) {
    $row_ctn = mysqli_num_rows($resultado);
    //echo $row_ctn;
}
if ($row_ctn == 0) {
    //echo $row_ctn;
?>

    <script>
        alertify.alert('CTMC/SYSTEM', 'No se puede eliminar Producto!',
            function() {
                alertify.success('ok');
                window.location = "principal_sistema.php"
            });
    </script>
<?php
}
if ($row_ctn > 0) {
    $query = "DELETE from producto where codprod ='" . $codigo . "'";
    //echo $query;
    //echo$row_ctn;
    mysqli_query($link, $query);
    header('localtion:principal_sistema.php');
}

?>
<script>
    window.location = "principal_sistema.php";
</script>
