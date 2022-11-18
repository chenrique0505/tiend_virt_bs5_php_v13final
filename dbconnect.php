<?php
require 'dbconfig.php';
$mysqli=new mysqli("sql300.epizy.com","epiz_33001403","GBhh5Hv69GlxgMy",'epiz_33001403_tienda_petscarlos');
$link = mysqli_connect($dbhost, $dbusername,$dbpassword,$dbname);
if(mysqli_connect_errno()){
    printf("conexion fallida: %s\n", mysqli_connect_error());/*el porcentaje mostrara el tipo error que devuelve mysqli_connect_error  */
    exit();
}
$acentos = $mysqli->query("SET NAMES 'utf8'")
?>