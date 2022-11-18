<?php
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}
include('header_footer/header.php');

?>
<section class="">
    <div class="container row my-5 pb-5 mt-3 pt-3">
        
        <div class="row   d-flex justify-content-center">
            
            
            <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 card-header">
                <div class="row">
                    <img class="h-100 h-sm- h-md- h-lg- h-xl- w-100" src="img/img_loging/img_loging_a.png" alt="">
                </div>
                <div class=" text-center  text-dark est_txt_2 fs-3 w-100">CONTACTO</div>
                <hr>
                <div class="col-12  ">
                    <form action="" method="post">

                        <div class="mb-3 shadow-lg  mt-3">
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Ingrese usuario">
                        </div>

                        <div class="mb-3 shadow-lg ">
                            <input type="tel" class="form-control" name="tel" id="tel" placeholder="Ingrese telefono">
                        </div>

                        <div class="mb-3 shadow-lg  mt-3">
                            <textarea class="w-100 h-100" name="textarea_contacto" id="textarea_contacto" rows="3" placeholder="Ingrese su mensaje"></textarea>
                        </div>

                        <button name="btn_inicio_sesion" id="btn_inicio_sesion" type="submit" class=" btn   border c_white  bg_verde_claro box_shadow_black w-100  ">ENVIAR</button>
                        <hr>




                    </form>
                </div>
            </div>

            
        </div>

        </div>
</section>


<?php
include 'header_footer/footer.php';

?>