<?php
require 'dbconfig.php';
$mysqli=new mysqli("localhost","root","",$dbname);
$link = mysqli_connect($dbhost, $dbusername,$dbpassword,$dbname);
if(mysqli_connect_errno()){
    printf("conexion fallida: %s\n", mysqli_connect_error());/*el porcentaje mostrara el tipo error que devuelve mysqli_connect_error  */
    exit();
}
$acentos = $mysqli->query("SET NAMES 'utf8'")
?>