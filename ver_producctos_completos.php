<?php
include("dbconnect.php");
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}

$query = "SELECT * FROM producto";
$result = mysqli_query($link, $query);

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
 //mx-3 mt-3
include('header_footer/header.php');
?>
<section class="mb-5 fondo_4_gradiente">
    <div class="row d-flex justify-content-around mt-5 px-3">
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>


            <div class="col-7 col-xs-4 col-sm-3 col-md-3 col-lg-2 col-xl-2  shadow-lg rounded ms-4 my-3 py-4  ">
                
                    <form class="row container  m-0 p-0" action="ver_producto.php" method="get">

                       
                                <a class="col-7 col-xs-4 col-sm-3 col-md-3 col-lg-12 col-xl-12 "  href="ver_producto.php?id=<?php echo $row['codprod'] ?>"><img src="img/alimentos/<?php echo $row['imgprod']; ?>" class="  card-img-top " height="300px" width="100%" alt=""></a>

                                <div name="nombre_producto" id="nombre_producto" class="col-7 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-1 "><?php echo recortar_texto($row['nomprod'], 25); ?>
                                </div>

                                <div name="precio_producto" id="precio_producto" class="col-7 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-1  fw-bold"><a class="  " href="ver_producto.php?id=<?php echo $row['codprod']; ?>">Ver más >></a>
                                </div>

                                <div name="precio_producto" id="precio_producto" class="col-7 col-xs-12 col-sm-12col-md-12 col-lg-12 col-xl-12  my-1  fw-bold"><?php echo $row['preunitprod'] . "$"; ?>
                                </div>

                                <div class="col-7 col-xs-4 col-sm-3 col-md-3 col-lg-12 col-xl-12 my-1 ">
                                    <button name="btn_comprar" id="btn_comprar" value="btn_comprar" type="submit" class=" btn border c_white  bg_verde_claro box_shadow_black w-100 ">Comprar</button>
                                </div>
                          
                    </form>
                
            </div>

        <?php
        }
        ?>
    </div>
</section>

<?php
include 'header_footer/footer.php';

?>
<script src="js/bootstrap.bundle.min.js"></script>
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
            itemsTabletSmall: [568, 2],
            itemsMobile: [2, 3],
        });
    });
</script>