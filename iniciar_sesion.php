<?php
require_once 'dbconnect.php';
session_start();
if (isset($_SESSION['nomuser'])) {
    header('location: principal.php');
}

if (isset($_POST["btn_inicio_sesion"])) {

    $correo = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    //echo $nom;
    $query = "SELECT * FROM inicio_sesion WHERE correo ='" . $correo . "' and contraseña ='" . $contraseña . "'";
    //print $query;
    if ($resultado = mysqli_query($link, $query)) {
        $row_ctn = mysqli_num_rows($resultado);
        //print $row_ctn;
    }

    if (!isset($_SESSION['nomuser'])) {
        if ($row_ctn == 1) {
            if ($correo == 'carlos_admin@gmail.com') {
                $_SESSION['nomuser'] = $correo;                
                $_SESSION['status'] = 'Master_admin';
                $_SESSION['nombre'] = 'Carlos Henriquez';
                header("location:bienvenida.php");
            }else{
                $_SESSION['nomuser'] = $correo;
                $_SESSION['status'] = 'cliente';
                header("location:principal.php");
            }
            
        } else if ($row_ctn == 0) {
?>
            <script>
                alert('El usuario que ingreso no existe')
            </script>
<?php
        }
    }
}

include ('header_footer/header.php');

?>
<section class="">
    <div class="container-fluid pb-5 ">
        <div class="row my-5  ">

            <div class="col-2 "></div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 ">
                <div class="row  ">

                    <div class="col-12 ">
                        <img class="h-100 h-sm-75 h-md-75 h-lg-75 h-xl-75 w-100" src="img/img_loging/img_loging_a.png" alt="">
                    </div>
                    <div class="col-1 col-xs-1 col-sm-1 col-md-2 col-lg-2 col-xl-2 fondo5_gradiente">

                    </div>
                    <div class="col-10 col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xl-8 card-header">
                        <div class=" text-center  text-dark est_txt_2 fs-3 w-100">Iniciar Sesion</div><hr>
                        <div class="col-12  ">
                            <form action="" method="post">

                                <div class="mb-3 shadow-lg  mt-3">
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Ingrese su usuario">
                                </div>

                                <div class="mb-3 shadow-lg ">
                                    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña">
                                </div>

                                <button name="btn_inicio_sesion" id="btn_inicio_sesion" type="submit" class=" btn   border c_white  bg_verde_claro box_shadow_black w-100  ">iniciar sesion</button>
                                
                                <hr>
                                <div class="text-center est_txt_3">¿No tienes cuenta? <a class="text-decoration-none c_black_hover" href="registrar_usuario_nuevo.php">Registrarse</a></div>
                                <div class="text-center est_txt_3"><a class="text-decoration-none c_black_hover" href="">¿Olvidaste tu contraseña?</a></div>


                            </form>
                        </div>
                    </div>

                    <div class="col-1 col-xs-1 col-sm-1 col-md-2 col-lg-2 col-xl-2 bg-info fondo5_gradiente">

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>


<?php
include 'header_footer/footer.php';

?>