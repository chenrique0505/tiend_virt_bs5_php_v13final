<?php


require_once 'dbconnect.php';
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:bienvenida.php');
}
$codigo = $_GET['id'];
$query = "SELECT * FROM producto WHERE codprod = '" . $codigo . "' ";
$result = mysqli_query($link, $query);
include 'header_footer/header.php';
?>
<section>
    <div class="row me-0 mb-5">
        <div class="col-1 col-xs-1 col-sm-1 col-md-3 col-lg-3 col-xl-3"></div>

        <div class="col-10 col-xs-10 col-sm-10 col-md-6 col-lg-6 col-xl-6 mt-5 p-3 p-xs-2 p-md-2 p-lg-2  p-xl-2">
            <div class="row  ">
                <!--imagen de cabecera formulario agregar-->
                <div class="col-12 ">
                    <img class="h-100 h-sm-75 h-md-75 h-lg-75 h-xl-75 w-100 rounded" src="img/img_crud_1.png" alt="">
                </div>
                <!--Form Agregar-->
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 card-header ">

                    <div class=" text-center text-dark fs-3 fw-bold  w-100 ">MODIFICAR PRODUCTO</div>
                    <hr>
                    <div class="col-12  ">

                        <?php
                        while ($rowpro = mysqli_fetch_array($result)) {
                        ?>

                            <form action="producto_guardado.php" method="POST">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                        <div class="text-center fondo1_gradiente text-white">Codigo</div>
                                        <input readonly  value="<?php echo $rowpro['codprod']; ?>" type="number" class="form-control " name="codprod" id="codprod" aria-describedby="emailHelpId" placeholder="Codigo">
                                    </div>

                                    <div class="mb-2 shadow-lg  mt-3 w-50">
                                        <div class="text-center fondo1_gradiente text-white">Precio</div>
                                        <input value="<?php echo $rowpro['preunitprod']; ?>" type="number" class="form-control" name="preunitprod" id="preunitprod" aria-describedby="emailHelpId" placeholder="Precio">
                                    </div>
                                </div>

                                <div class="mb-2 shadow-lg  mt-5">
                                    <div class="text-center fondo1_gradiente text-white">Nombre</div>
                                    <input value="<?php echo $rowpro['nomprod']; ?>" type="text" class="form-control" name="nomprod" id="nomprod" aria-describedby="emailHelpId" placeholder="Nombre del producto">
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="mb-3 shadow-lg  mt-5 w-50 me-3">
                                        <div class="text-center fondo1_gradiente text-white">Cant. de unidades en el stock</div>
                                        <input value="<?php echo $rowpro['unistockprod']; ?>" type="number" class="form-control" name="unistockprod" id="unistockprod" aria-describedby="emailHelpId" placeholder="STOCK">
                                    </div>

                                    <div class="mb-3 shadow-lg  mt-5 w-50">
                                        <div class="text-center fondo1_gradiente text-white">Cant. por pedido</div>
                                        <input value="<?php echo $rowpro['unipedprod']; ?>" type="number" class="form-control" name="unipedprod" id="unipedprod" aria-describedby="emailHelpId" placeholder="Cant.por pedido">
                                    </div>

                                </div>

                                <div class="d-flex">
                                    <div class="mb-3 shadow-lg w-25 mt-5 h-100 me-3">
                                        <div class="text-center fondo1_gradiente text-white">Cod. Categoria</div>

                                        <input readonly value="<?php echo $rowpro['codcat']; ?>" type="number" class="form-control" name="codcat" id="codcat" aria-describedby="emailHelpId" placeholder="Cant.por pedido">
                                    </div>

                                    <div class="mb-3 shadow-lg w-25 mt-5 me-3">
                                        <div class="text-center fondo1_gradiente text-white">Seleccione Categoria</div>

                                        <select class="form-control " name="combo_categoria" id="combo_categoria">
                                            <option value="0">
                                                0-Alimentos
                                            </option>
                                            <option value="1">
                                                1-Juguetes
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3 shadow-lg w-25 mt-5 h-100 me-3">
                                        <div class="text-center fondo1_gradiente text-white">Cod. Proveedor</div>
                                        <input readonly value="<?php echo $rowpro['codprove']; ?>" type="number" class="form-control" name="codprov" id="codprov" aria-describedby="emailHelpId" placeholder="Cant.por pedido">
                                    </div>

                                    <div class="mb-3 shadow-lg mt-5 w-25">
                                        <div class="text-center fondo1_gradiente text-white">Seleccione Proveedor</div>
                                        <select class="form-control " name="combo_proveedor" id="combo_proveedor">
                                            <option value="1">
                                                1-nestle
                                            </option>
                                            <option value="2">
                                                2-Mini Mascotas
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="mb-3 shadow-lg mt-5 mt-1 ">
                                    <div class="text-center fondo1_gradiente text-white">Nombre de la imagen del producto</div>
                                    <input value="<?php echo $rowpro['imgprod']; ?>" type="text" class="form-control" name="imgprod" id="imgprod" aria-describedby="emailHelpId" placeholder="Nombre del producto">
                                </div>
                                
                                <div>
                                    <textarea value="<?php echo $rowpro['descprod']; ?>" class="w-100 h-100 mb-3 shadow-lg  mt-3" name="textarea_desc_producto" id="textarea_desc_producto" rows="6" placeholder="<?php echo $rowpro['descprod']; ?>"></textarea>
                                </div>

                                <button name="btn_modificar_producto" id="btn_modificar_producto" type="submit" value="btn_modificar_producto" class=" btn   border   text-white bg_verde_claro box_shadow_black btn-outline-success w-100 shadow-lg mt-5">GUARDAR CAMBIOS</button>
                            </form>

                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>


        <div class="col-1 col-xs-1 col-sm-1 col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</section>
<?php
include 'header_footer/footer.php';
?>