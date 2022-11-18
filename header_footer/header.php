<!doctype html>
<!--PASO 1-->
<html lang="es">

<head>
    <title>CRUD php y masql5 b5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css3/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="style_personalizado.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css4/all.min.css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="css_carrusel/style.css" media="screen">
    <link rel="stylesheet" href="css_carrusel/grid.css" media="screen">
    <link rel="stylesheet" href="font/fonts.css" media="screen">
    <!-- Owl Carousel Assets -->
    <link href="css_carrusel/owl.carousel.css" rel="stylesheet">
    <link href="css_carrusel/owl.theme.css" rel="stylesheet">
    <script src="js/jquery-1.7.1.min.js"></script>
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="img/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="img/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox').fancybox();
        });
    </script>


<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">



</head>

<body class="">
    <div class="container-fluid bg-white shadow-lg  ">
        <header>
            <div class="row ">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-xl-4 pt-1 ">
                    <a class="text-decoration-none d-flex  justify-content-center justify-content-md-start align-items-center " href="principal.php">
                        <img class="rounded-circle shadow-lg" width="60px" height="auto" src="img/logotipo.png" alt="imagen logo no disponible">
                        <p class=" mt-md-2 m-2 c_verde_claro est_txt_1 ">CARLOSPET´S</p>
                    </a>
                </div> 
                <div class=" col-sm-12 col-md-7 col-lg-4 col-xl-4  d-flex ">               
                            
                        <form action="ver_producctos_completos.php" method="post" class=" d-flex align-items-center justify-content-start">    
                        <input name="ValueToSearch" id="ValueToSearch" size="100%" class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Search">
                        <button name="btn_buscar_producto" id="btn_buscar_producto" value="btn_buscar_producto" class="btn border c_white  bg_verde_claro box_shadow_black" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4  d-flex justify-content-center align-items-center my-2">
                    <nav class="row w-100  ">
                        <div class="col d-flex  justify-content-center justify-content-md-end align-items-center  ">




                        <?php
                            if(isset($_SESSION['nomuser']) && ($_SESSION['status'] == 'Master_admin')){
                            ?> 
                            <a class=" c_verde_claro text-decoration-none c_black_hover d-flex justify-content-end pe-3 " href="principal_sistema.php">CRUD</a>
                            <?php
                                }
                                ?>






                            <a class=" c_verde_claro text-decoration-none c_black_hover d-flex justify-content-end  " href="principal.php">inicio</a>
                            <a class="c_verde_claro ms-3 text-decoration-none c_black_hover d-flex justify-content-end  pe-1" href="nosotros.php">Nosotros</a>
                            <a class="c_verde_claro ms-3  text-decoration-none c_black_hover d-flex justify-content-end  pe-3" href="contacto.php">Contacto</a>
                            <?php
                            
                            if (!isset($_SESSION['nomuser'])) 
                            {
                            ?>  

                                <a class="c_verde_claro text-decoration-none c_black_hover d-flex justify-content-end  " href="iniciar_sesion.php">Iniciar sesion</a>
                            
                            <?php
                            }
                            else{
                            ?>
                            
                                <a class="c_verde_claro text-decoration-none c_black_hover d-flex justify-content-end " href="logout.php">Cerrar sesion</a>
                                <a class=" c_verde_claro d-flex justify-content-end ms-2" href="logout.php"><img class=" c_verde_claro" width="30px" height="auto" src="img/carrito_de_compra-removebg-preview.png" alt="logo carrito de compra no disponible"></a>
                            
                            <?php
                            }
                           ?>

                        </div>
                    </nav>
                </div>


            </div>
        </header>
    </div>