<?php
require_once 'dbconnect.php';
session_start();
if (!isset($_SESSION['nomuser'])) {
    header('location:bienvenida.php');
}
$codigo = $_GET['id'];
$query = "SELECT * FROM proveedor WHERE codprove = '" . $codigo . "' ";
$result = mysqli_query($link, $query);
include 'header_footer/header.php';
?>
<section>
    <div class="row">
        <div class="col-1 col-xs-1 col-sm-1 col-md-3 col-lg-3 col-xl-3"></div>
        <div class="col-10 col-xs-10 col-sm-10 col-md-6 col-lg-6 col-xl-6 mt-5 p-3 p-xs-2 p-md-2 p-lg-2  p-xl-2  ">
            <div class="row  ">
                <!--imagen de cabecera formulario agregar-->
                <div class="col-12 px-0 ">
                    <img class="h-100  w-100 rounded " src="img/img_crud_1.png" alt="">
                </div>
                <!--Form Agregar-->
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 card-header pt-2 ">

                    <div class=" text-center text-dark fs-4 fw-bold  w-100 ">AGREGAR PROVEEDOR</div>
                    <hr>
                    <div class="col-12  ">
                        <?php
                        while ($rowpro = mysqli_fetch_array($result)) {
                        ?>

                            <form action="proveedor_guardado.php" method="POST">

                                <!--codprove-->
                                <div class="d-flex justify-content-between">
                                    <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                        <input readonly value="<?php echo $rowpro['codprove'] ?>" type="number" class="form-control" name="codprove" id="codprove" aria-describedby="emailHelpId" placeholder="">
                                    </div>
                                    <!--nomprove-->
                                    <div class="mb-2 shadow-lg  mt-3 w-50">
                                        <input value="<?php echo $rowpro['nomprove'] ?>" type="text" class="form-control  " name="nomprove " id="nomprove " aria-describedby="emailHelpId" placeholder="Nombre Proveedor">
                                    </div>
                                </div>
                                <!--nomempprove-->
                                <div class="mb-2 shadow-lg  mt-3 ">
                                    <input value="<?php echo $rowpro['nomempprove'] ?>" type="text" class="form-control" name="nomempprove" id="nomempprove" aria-describedby="emailHelpId" placeholder="Nombre del producto">
                                </div>
                                <!--Municipio readonly-->
                                <div class="d-flex mt-4 ">
                                    <div class="mb-3 shadow-lg w-25 ">
                                        <div class="text-center fondo1_gradiente text-white">Municipio</div>
                                        <input readonly class="form-control" type="text" value="<?php echo $rowpro['municipio'] ?>" name="" id="">
                                    </div>

                                    <!--Municipio-->

                                    <div class="mb-3 shadow-lg w-25 ms-3">
                                        <div class="text-center fondo1_gradiente text-white">Municipio</div>
                                        <select class="form-control " name="combo_municipio" id="combo_municipio">
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

                                    <!--Ciudad readonly-->
                                    <div class="mb-3 shadow-lg w-25 ms-3">
                                        <div class="text-center fondo1_gradiente text-white">Municipio</div>
                                        <input readonly class="form-control" type="text" value="<?php echo $rowpro['ciudad']?>" name="" id="">
                                    </div>
                                    <!--Ciudad-->
                                    <div class="mb-3 shadow-lg w-25 ms-3">
                                        <div class="text-center fondo1_gradiente text-white">Ciudad</div>
                                        <select class="form-control " name="combo_ciudad" id="combo_ciudad">
                                            <option value="Valencia">
                                                Valencia
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <!--codpostal-->
                                    <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                        <input value="<?php echo $rowpro['codpostal']?>" type="number" class="form-control" name="codpostal" id="codpostal" aria-describedby="emailHelpId" placeholder="Cod. Postal">
                                    </div>
                                    <!--codarea-->
                                    <div class="mb-2 shadow-lg  mt-3 w-50 ">
                                        <input value="<?php echo $rowpro['codarea'] ?>" type="number" class="form-control" name="codarea" id="codarea" aria-describedby="emailHelpId" placeholder="Cod. Area">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between ">
                                    <!--numprove-->
                                    <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                        <input value="<?php echo $rowpro['numprove'] ?>" type="number" class="form-control" name="numprove" id="numprove" aria-describedby="emailHelpId" placeholder="Numero">
                                    </div>
                                    <!--cargoprove-->
                                    <div class="mb-2 shadow-lg  mt-3 w-50 ">
                                        <input value="<?php echo $rowpro['cargoprove'] ?>" type="text" class="form-control" name="cargoprove" id="cargoprove" aria-describedby="emailHelpId" placeholder="Cargo">
                                    </div>
                                </div>

                                <button name="btn_modificar_proveedor" id="btn_modificar_proveedor" type="submit" value="btn_modificar_proveedor" class="mt-3 btn   border  fondo1_gradiente text-white bg_verde_claro box_shadow_black btn-outline-success w-100 shadow-lg mb-3">GUARDAR CAMBIOS</button>
                            </form>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>

    </div>
</section>


<?php
include 'header_footer/footer.php';
?>