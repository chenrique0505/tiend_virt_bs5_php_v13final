<?php
session_start();
if (!isset($_SESSION['nomuser'])) {
    header('location: iniciar_sesion.php');
}
include ('header_footer/header.php');
?>

<section class="">
    <div class="container mt-5 ">
        <div class="row ">
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card shadow-lg border mb-5 ">
                    <a href="principal.php"><img src="img/img_banner_12.png" class="card-img-top " height="250px" alt=""></a>
                    <div class="card-body text-center fs-4 fw-bold">
                        TIENDA CARLOSPET´S
                    </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card shadow-lg border mt5 ">
                    <a href="principal_sistema.php"><img src="img/img_categorias/img_cat_3.jpg" class="card-img-top " height="250px" alt=""></a>
                    <div class="card-body text-center fs-4 fw-bold">
                        SISTEMA
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include 'header_footer/footer.php';

?>