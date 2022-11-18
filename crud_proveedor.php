<?php
include("dbconnect.php");
session_start();
$query2 = "SELECT max(codprove) as codprove FROM proveedor order by codprove";
$result2 = mysqli_query($link, $query2);
while ($row_prod = mysqli_fetch_array($result2)) {
    $num = $row_prod['codprove'];

    $codigo = $num + 1;
}

if (isset($_POST['btn_search'])) {
    $valueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM producto WHERE codprod like'" . $valueToSearch . "%'";
    $result = mysqli_query($link, $query);
} else {
    $query = "SELECT * FROM proveedor";
    $result = mysqli_query($link, $query);
}


include('header_footer/header.php')
?>
<section>
    <aside class="col-1   pt-5 mt-5 fixed-top  ">

        <div class="p-0 m-0">
            <form class="my-5 rounded-circle" action="">
                <button type="submit" class=" list-group-item list-group-item-action text-center active fondo1_gradiente " aria-current="true">
                    CRUDS
                </button>
            </form>
            <form class="my-5 rounded-circle" action="principal_sistema.php">
                <button type="submit" class="list-group-item list-group-item-action text-center btn  btn-outline-success text-dark form-control rounded-0 est_txt_3 fondo5_gradiente ">Productos</button>
            </form>
            <form class="my-5 rounded-circle" action="crud_proveedor.php">
                <button type="submit" class="list-group-item list-group-item-action text-center btn  btn-outline-dark text-dark form-control rounded-0 est_txt_3 fondo5_gradiente">Proveedor</button>
            </form>
            <form class="my-5 rounded-circle" action="">
                <button type="submit" class="list-group-item list-group-item-action text-center btn  btn-outline-success text-dark form-control rounded-0 est_txt_3 fondo5_gradiente">Categoria</button>
            </form>
            <form class="my-5 rounded-circle" action="">
                <button type="submit" class="list-group-item list-group-item-action text-center btn  btn-outline-dark text-dark form-control rounded-0 est_txt_3 fondo5_gradiente">Pedidos</button>
            </form>

        </div>
    </aside>
    <div class="row container-fluid w-100 mx-0 px-0 ">
        <div class="col-1"></div>
        <div class="col-10 col-xs-8 col-sm-9 col-md-11 col-lg-11 col-xl-11 px-0">
            <div class="row  p-0 mx-0 mb-5">
                <!--TABLA-->
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 px-5">
                    <div class=" row container-fluid mx-0 px-0 mt-5 ">
                        <div class="col ">
                            <table class="
                                table 
                                table-responsive 
                                table-ligth 
                                table-hover 
                                table-bordered 
                                table-responsive-sm 
                                table-responsive-md 
                                table-responsive-lg
                                table-responsive-xl 
                                shadow-lg
                                ">
                                <thead class="fondo5_gradiente ">
                                    <h1 class="text-center mb- text-dark ">CRUD PROVEEDORES</h1><br>
                                    <tr>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Codigo</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Nombre</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Empresa</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Municipio</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Actualizar</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="fondo5_gradiente">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center  align-middle"><?php echo $row['codprove']; ?></td>
                                            <td class="text-center est_txt_3 align-middle"><?php echo $row['nomprove']; ?></td>
                                            <td class="text-center align-middle "><?php echo $row['nomempprove']; ?></td>
                                            <td class="text-center align-middle "><?php echo $row['municipio']; ?></td>
                                            <td class="text-center align-middle"><a href="proveedor_modificado.php?id=<?php echo $row['codprove'] ?>"><img src="img/icons8-Edit-32.png " alt=""></a></td>
                                            <td class="text-center align-middle"><a href="#" onclick="del('<?php echo $row['codprove']; ?>')"><img src="img/icons8-Trash-32.png" alt=""></a></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!--FORMULARIO DE AGREGAR-->
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 my-5  pe-5 ms-3 ms-xs-3 ms-sm-3 ps-md-3 ms-lg-0 ms-xl-0  ">
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
                            
                                <form action="proveedor_agregado.php" method="post">
                                    <!--codprove-->
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                            <input readonly value="<?php echo $codigo; ?>" type="number" class="form-control" name="codprove" id="codprove" aria-describedby="emailHelpId" placeholder="Codigo">
                                        </div>
                                    </div>
                                    <!--nomempprove-->
                                    <div class="mb-2 shadow-lg  mt-3 ">
                                        <input value="" type="text" class="form-control" name="nomempprove" id="nomempprove" aria-describedby="emailHelpId" placeholder="Nombre de la empresa del proveedor">
                                    </div>
                                    <!--Municipio-->


                                    <div class="d-flex mt-4">
                                        <div class="mb-3 shadow-lg w-50 me-3">
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

                                    <!--Ciudad-->
                                        <div class="mb-3 shadow-lg w-50 ">
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
                                            <input  value="" type="number" class="form-control" name="codpostal" id="codpostal" aria-describedby="emailHelpId" placeholder="Cod. Postal">
                                        </div>
                                        <!--codigo de area-->
                                        <div class="mb-2 shadow-lg  mt-3 w-50 ">
                                            <input  value="" type="number" class="form-control" name="codarea" id="codarea" aria-describedby="emailHelpId" placeholder="Cod. Area">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <!--numero del proveedor-->
                                        <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                            <input  value="" type="number" class="form-control" name="numprove" id="numprove" aria-describedby="emailHelpId" placeholder="Numero">
                                        </div>
                                        <!--cargo del proveedor-->
                                        <div class="mb-2 shadow-lg  mt-3 w-50 ">
                                            <input  value="" type="text" class="form-control" name="cargoprove" id="cargoprove" aria-describedby="emailHelpId" placeholder="Cargo">
                                        </div>
                                    </div>
                                    <!--Nombre del proveedor-->
                                    <div class="mb-4 shadow-lg  mt-3 ">
                                        <input value="" type="text" class="form-control " name="nomprove " id="nomprove " aria-describedby="emailHelpId" placeholder="Nombre Proveedor">
                                    </div>

                                    <button name="btn_agregar_proveedor" id="btn_agregar_proveedor" type="submit" value="btn_agregar_producto" class=" btn   border  fondo1_gradiente text-white bg_verde_claro box_shadow_black btn-outline-success w-100 shadow-lg mb-3">AGREGAR PRODUCTO</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('header_footer/footer.php')

?>

<script>
    function del(id) {
        alertify.confirm("CTMC/SYSTEM", "Desea Eliminar Proveedor?.",
            function() {
                window.location = "proveedor_eliminado.php?codprove=" + id;
            },
            function() {
                window.location = "crud_proveedor.php";
            })
    }
</script>
<script src="alertifyjs/alertify.min.js"></script>