<?php
include("dbconnect.php");
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}


$query = "SELECT * FROM producto";
$result = mysqli_query($link, $query);
$i = 0;


$noticia = "SELECT * FROM producto ORDER BY codprod DESC";
//echo $noticia;
$noticias = $mysqli->query($noticia);
$limite = 100;
function recortar_texto($texto, $limite)
{
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if ($tamano <= $limite) {
        return $texto;
    } else {
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }
    return $resultado;
}
$not = $noticias->fetch_assoc();

include('header_footer/header.php')
?>


<body class="">

    <section class="mb-5 fondo_4_gradiente">
        <!--Seccion banner-->
        <div class="row m-0 mt-0 mb-5 ">
            <div class="col m-0  mx-sm-0  mx-md-0  mx-lg-0  mx-xl-0 px-0">
                <div id="myCarousel" class="carousel slide  shadow-lg" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner shadow-lg mt-0">
                        <div class="carousel-item active ">
                            <img class="bd-placeholder-img  " src="img/img_banner_5.jpg" width="100%" height="350px" alt="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100 %" height="100%" fill="#777" />
                        </div>
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" src="img/img_banner_6.jpg" width="100%" height="350px" alt="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777" />
                        </div>
                        <div class="carousel-item">
                            <img class="bd-placeholder-img" src="img/img_banner_7.jpg" width="100%" height="350px" alt="" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777" />
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <script src="js/bootstrap.bundle.min.js"></script>

        </div>
        <!--Seccion categoria-->
        <div class="container  ">
            <div class="row ">
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card shadow-lg border mb-5 ">
                        <a href="ver_producctos_completos.php"><img src="img/img_banner_12.png" class="card-img-top " height="250px" alt=""></a>
                        <div class="card-body text-center fs-4 fw-bold">
                            ALIMENTOS
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card shadow-lg border mt5 ">
                        <a href="ver_producctos_completos.php"><img src="img/img_categorias/img_cat_3.jpg" class="card-img-top " height="250px" alt=""></a>
                        <div class="card-body text-center fs-4 fw-bold">
                            JUGUETES
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Seccion carrusel-->
        
        <div id="myCarousel1" class="carousel row slide col shadow-lg mx-5" data-bs-ride="carousel">  
        <div class=""><a class="text-success ps-2 fw-bold fs-3 d-flex align-item-center mt-3" href="ver_producctos_completos.php?id=<?php echo $not['codprod'] ?>">Productos</a> <hr>   </div>     
            <div class="col noticias slider shadow-lg ">            
                <div id="owl-demo" class=" row ">
                    <?php
                    while ($not = $noticias->fetch_assoc()) {
                        $codprod = $not['codprod'];
                        $nomprod = $not['nomprod'];
                        $precio_prod = $not['preunitprod'];
                        $stock = $not['unistockprod'];
                        $unid_prod = $not['unipedprod'];
                        $codcat  = $not['codcat'];
                        $codprove  = $not['codprove'];
                        $imagen_prod = $not['imgprod'];
                    ?>

                        <form action="" method="post" class="item row border py-4 shadow-lg">
                            <div class="col-12  ">
                                <a href="ver_producto.php?id=<?php echo $not['codprod'] ?>"><img class="" height="250px" src="img/alimentos/<?php echo $not['imgprod']; ?>" alt=""></a>
                            </div>

                            <div class="col-12">
                                <?php echo recortar_texto($nomprod, 25); ?><br>
                                <a class="  " href="ver_producto.php?id=<?php echo $not['codprod']; ?>">Ver más >></a>
                            </div>                            

                            <div class="col-12 ">
                                <div class="fw-bold fs-4">
                                    <?php echo $not['preunitprod'] . "$"; ?>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <button name="btn_comprar" id="btn_comprar" value="btn_comprar" class=" btn  border c_white  bg_verde_claro box_shadow_black w-75">Comprar</button>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>

                <script src="js/owl.carousel.js"></script>
                <!-- Control de Responsive Design !-->
                <script>
                    $(document).ready(function() {
                        $("#owl-demo").owlCarousel({
                            autoPlay: 3000,
                            items: 4,
                            itemsDesktop: [1199, 3],
                            itemsDesktopSmall: [979, 2],
                            itemsTablet: [768, 2],
                            itemsTabletSmall: [568, 1],
                            itemsMobile: [2, 3],
                        });
                    });
                </script>

            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    </div>


    <?php
    include 'header_footer/footer.php';

    ?>