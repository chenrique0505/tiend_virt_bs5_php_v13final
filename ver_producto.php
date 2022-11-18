<?php
include("dbconnect.php");
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}


$codprod = $_GET['id'];
$codcat = 0;
$query = "SELECT * from producto inner join categoria using(codcat)  where codprod='" . $codprod . "'";
$result = mysqli_query($link, $query);


include('header_footer/header.php');
?>
<section class="">
    <div class="container-fluid  ">
        <div class="row d-flex justify-content-around ">

            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>

                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 ">
                    <a href=""><img src="img/alimentos/<?php echo $row['imgprod']; ?>" class="card shadow-lg border my-3    card-img-top w-100" height="auto" alt=""></a>
                </div>

                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4  pt-3 ">
                    <div class="row  my-3  h-75 ">
                        <div class="col-12 fw-bold fs-2 ">
                            <?php echo $row['nomprod']; ?>
                        </div>
                        <div class="col-12 card-header ">
                            <span class="fw-bold fs-3">Categoria:</span>
                            <span class="fw-light fs-4"><?php echo " " . $row['nomcat']; ?></span>
                        </div>
                        <div class="col-12 fw-bold fs-2 ">
                            <?php echo $row['preunitprod'] . "$"; ?>
                        </div>
                        <div class="col-12  ">
                            <?php echo $row['descprod'] ?>
                        </div>
                        <div class="col-12 fw-bold fs-2 ">

                            <div class="col py-3 d-flex align-items-end">
                                <button name="btn_comprar" id="btn_comprar" value="btn_comprar" type="submit" class=" btn  border c_white  bg_verde_claro box_shadow_black w-100 h-50" value="">Comprar</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row ">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 my-3 text-center fw-bold pb-5 pt-4 ">
                        <div class="row d-flex justify-content-center">
                            <div class="col-1"></div>
                            <div class="col-3"><a href="ver_producto.php?id">

                                    <img src="img/alimentos/<?php echo $row['imgprod']; ?>" class="card shadow-lg border  card-img-top w-50" height="auto" alt=""></a></div>
                            <div class="col-3"><a href=""><img src="img/alimentos/<?php echo $row['imgprod']; ?>" class="card shadow-lg border   card-img-top w-50" height="auto" alt=""></a></div>
                            <div class="col-3"><a href=""><img src="img/alimentos/<?php echo $row['imgprod']; ?>" class="card shadow-lg border   card-img-top w-50" height="auto" alt=""></a></div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>


        </div>
</section>

<?php
include 'header_footer/footer.php';

?>