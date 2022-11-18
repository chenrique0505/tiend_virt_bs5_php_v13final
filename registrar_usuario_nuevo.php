<?php

require_once('dbconnect.php');
session_start();
// if (!isset($_SESSION['nomuser'])) 
// {
//     header('location:bienvenida.php');
// }
if (isset($_POST['btn_registro_cliente'])) {
    $cedcli = $_POST['cedcli'];
    $prinomcli = $_POST['prinomcli'];
    $priapecli = $_POST['priapecli'];
    $nomcli = $prinomcli . " " . $priapecli;
    $direccion = $_POST['dircli'];
    $estado = $_POST['combo_estado'];
    $municipio = $_POST['combo_municipio'];
    $sector = $_POST['combo_sector'];
    $telcli = $_POST['telcli'];
    $puntorefcli = $_POST['puntorefcli'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $_SESSION['cedcli'] = $cedcli;

    $query = "SELECT * FROM cliente INNER JOIN inicio_sesion using(cedcli) WHERE correo= '" . $email . "'";    
    $query2 = "SELECT * FROM inicio_sesion INNER JOIN cliente using(cedcli) WHERE correo= '" . $email . "'";
    if ($resultado = mysqli_query($link, $query2)) {
        $row_cnt = mysqli_num_rows($resultado);
        if ($row_cnt == 0) {
            
            $_SESSION['nombre'] = $nomcli;
            $_SESSION['cargo'] = 'cliente';
            $_SESSION['codemp'] = null;
        } 
    }

    if ($resultado = mysqli_query($link, $query)) {
        $row_cnt = mysqli_num_rows($resultado);
    }
    if ($row_cnt == 1) {
?>
        <script>
            alert('El correo electronico ya existe, ingrese otro correo', window.location = 'registrar_usuario_nuevo.php')
        </script>
    <?php

    } else if ($row_cnt == 0) {
        $query = "INSERT into cliente(cedcli,prinomcli,priapecli,direccion,estado,municipio,sector,telcli,puntorefcli) values('" . $cedcli . "','" . $prinomcli . "','" . $priapecli . "','" . $direccion . "','" . $estado . "','" . $municipio . "','" . $sector . "','" . $telcli . "','" . $puntorefcli . "')";
        
        if(mysqli_query($link, $query)){
            $query3 = "INSERT into inicio_sesion(correo ,contraseña,nombre,cargo,cedcli,codemp ) values('" . $email . "','" . $contraseña . "','" . $_SESSION['nombre'] . "','" . $_SESSION['cargo'] . "','" . $_SESSION['cedcli'] . "','" . $_SESSION['codemp'] . "')";
            mysqli_query($link, $query3);
        }
        
    
        
    }
    ?>
    <script>
        alert('Usuario registrado con exito', window.location = 'iniciar_sesion.php')
    </script>

<?php
}

include 'header_footer/header.php';

?>
<section class="">
    <div class="container-fluid  ">
        <div class="row my-5 ">

            <div class="col-2 "></div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 ">
                <div class="row  ">

                    <div class="col-12 ">
                        <img class="h-100 h-sm-75 h-md-75 h-lg-75 h-xl-75 w-100" src="img/img_loging/img_loging_a.png" alt="">
                    </div>
                    <div class="col-1 col-xs-1 col-sm-1 col-md-2 col-lg-2 col-xl-2 fondo5_gradiente"></div>
                    <div class="col-10 col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xl-8 card-header ">
                        <div class=" text-center  text-dark est_txt_2 fs-3 w-100">Registrarse</div><hr>
                        <div class="col ">
                            <form action="" method="post">

                                <div class="row">
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" class="my-3 shadow-lg form-control w-100" name="prinomcli" id="prinomcli" placeholder="Primer nombre">
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" class="my-3 shadow-lg form-control w-100" name="priapecli" id="priapecli" placeholder="Primer Apellido">
                                    </div>
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" class="my-3 shadow-lg form-control w-100" name="cedcli" id="cedcli" placeholder="C.I">
                                    </div>
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="tel" class="my-3 shadow-lg form-control w-100" name="telcli" id="telcli" placeholder="Telefono">
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="email" class="my-3 shadow-lg form-control w-100" name="email" id="email" placeholder="Ingrese un correo">
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="password" class="my-3 shadow-lg form-control" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña">
                                    </div>
                                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 my-3 shadow-lg d-flex justify-content-center">
                                        <select class="btn border c_white  bg_verde_claro box_shadow_black" name="combo_estado" id="combo_estado">

                                            <option value="carabobo">
                                                Carabobo
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 my-3 shadow-lg d-flex justify-content-center">
                                        <select class="btn border c_white  bg_verde_claro box_shadow_black" name="combo_municipio" id="combo_municipio">

                                            <option value="naguanagua">
                                                Naguanagua
                                            </option>
                                            <option value="valencia">
                                                Valencia
                                            </option>
                                            <option value="san diego">
                                                San Diego
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 my-3 shadow-lg d-flex justify-content-center">
                                        <select class="btn btn border c_white  bg_verde_claro box_shadow_black " name="combo_sector" id="combo_sector">

                                            <option value="las_quintas_1">
                                                Las Quintas 1
                                            </option>
                                            <option value="las_quintas_2">
                                                Las Quintas 2
                                            </option>
                                            <option value="las_quintas_3">
                                                Las Quintas 3
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 shadow-lg  mt-3">
                                        <textarea class="w-100 h-100" name="dircli" id="dircli" rows="3" placeholder="Ingrese su direccion"></textarea>
                                    </div>

                                    <div class="mb-3 shadow-lg  mt-3">
                                        <textarea class="w-100 h-100" name="puntorefcli" id="puntorefcli" rows="3" placeholder="Ingrese un punto de referencia"></textarea>
                                    </div>
                                    <div class="">
                                        <button name="btn_registro_cliente" id="btn_registro_cliente" type="submit" class=" btn  my-3  border c_white  bg_verde_claro box_shadow_black w-100" value="btn_registro_cliente">Registrarse</button>
                                    </div>
                                    <div class="text-center est_txt_3">
                                        Al registrarse, aceptas nuestras Condiciones de uso y Politica de privacidadbr
                                        <hr>
                                    </div>
                                    <div class="text-center est_txt_3">
                                        ¿Ya tienes cuenta? <a class="text-decoration-none c_black_hover" href="iniciar_sesion.php">Iniciar sesion</a>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="col-1 col-xs-1 col-sm-1 col-md-2 col-lg-2 col-xl-2 bg-info fondo5_gradiente"></div>
                </div>
                </form>
            </div>
        </div>


    </div>
    </div>

    </div>
    </div>

</section>


<?php
include 'header_footer/footer.php';

?>