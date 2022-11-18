<?php
include("dbconnect.php");
session_start();
$query2 = "SELECT max(codprod) as codprod FROM producto order by codprod";
$result2 = mysqli_query($link, $query2);

$query4 = "SELECT * FROM proveedor";
$result4 = mysqli_query($link, $query4);

while ($row_prod = mysqli_fetch_array($result2)) {
    $num = $row_prod['codprod'];

    $codigo = $num + 1;
}

if (!isset($_SESSION['nomuser'])) {
    header('location: iniciar_sesion.php');
}



if (isset($_POST['btn_search'])) {
    $valueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM producto WHERE codprod like'" . $valueToSearch . "%'";
    $result = mysqli_query($link, $query);
} else {
    $query = "SELECT * FROM producto";
    $result = mysqli_query($link, $query);
}

if (isset($_POST['btn_consulta_prod_por_cat'])) {
    require_once 'dbconnect.php';

    //$cat=$_POST['codcat];
    $codcat = $_POST['combo_categoria'];
    $etiqueta = array();
    $data = array();
    $query_2 = "SELECT nomprod,unistockprod	from producto where codcat='" . $codcat . "' AND unistockprod >=30; ";
    $result_query_2 = mysqli_query($link, $query_2);
    while ($row_query_2 = mysqli_fetch_array($result_query_2)) {
        array_push($etiqueta, $row_query_2['nomprod']);
        array_push($data, $row_query_2['unistockprod']);
    }
}




include('header_footer/header.php');

?>

<section class="">
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
        <!--seccion del aside-->
        <aside class="col-1">
        </aside>
        <!--Seccion del CRUD Y formulario de agregar registro-->
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
                                    <h1 class="text-center mb- text-dark ">CRUD PRODUCTOS</h1><br>
                                    <tr>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Codigo</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Nombre</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Precio por unidad</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Unidades en almacen</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Actualizar</th>
                                        <th class="text-center align-middle fondo1_gradiente text-white" scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="fondo5_gradiente">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center  align-middle"><?php echo $row['codprod']; ?></td>
                                            <td class="text-center est_txt_3"><?php echo $row['nomprod']; ?></td>
                                            <td class="text-center  align-middle"><?php echo $row['preunitprod']; ?></td>
                                            <td class="text-center  align-middle"><?php echo $row['unistockprod']; ?></td>
                                            <td class="text-center align-middle"><a href="producto_modificado.php?id=<?php echo $row['codprod'] ?>"><img src="img/icons8-Edit-32.png " alt=""></a></td>
                                            <td class="text-center align-middle"><a href="#" onclick="del('<?php echo $row['codprod']; ?>')"><img src="img/icons8-Trash-32.png" alt=""></a></td>

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

                            <div class=" text-center text-dark fs-4 fw-bold  w-100 ">AGREGAR PRODUCTO</div>
                            <hr>
                            <div class="col-12  ">
                                <form action="producto_agregado.php" method="post">

                                    <div class="d-flex justify-content-between">
                                        <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                            <input readonly value="<?php echo $codigo; ?>" type="number" class="form-control" name="codprod" id="codprod" aria-describedby="emailHelpId" placeholder="Codigo">
                                        </div>

                                        <div class="mb-2 shadow-lg  mt-3 w-50">
                                            <input value="" type="number" class="form-control" name="preunitprod" id="preunitprod" aria-describedby="emailHelpId" placeholder="Precio">
                                        </div>
                                    </div>

                                    <div class="mb-2 shadow-lg  mt-3">
                                        <input value="" type="text" class="form-control" name="nomprod" id="nomprod" aria-describedby="emailHelpId" placeholder="Nombre del producto">
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3 shadow-lg  mt-3 w-50 me-3">
                                            <input value="" type="number" class="form-control" name="unistockprod" id="unistockprod" aria-describedby="emailHelpId" placeholder="STOCK">
                                        </div>

                                        <div class="mb-3 shadow-lg  mt-3 w-50">
                                            <input value="" type="number" class="form-control" name="unipedprod" id="unipedprod" aria-describedby="emailHelpId" placeholder="Unid.por pedido">
                                        </div>

                                    </div>

                                    <div class="d-flex">
                                        <div class="mb-3 shadow-lg w-50 me-3">
                                            <div class="text-center fondo1_gradiente text-white">Categoria</div>
                                            <select class="form-control " name="combo_categoria" id="combo_categoria">
                                                <option value="0">
                                                    0-Alimentos
                                                </option>
                                                <option value="1">
                                                    1-Juguetes
                                                </option>
                                            </select>
                                        </div>


                                        <div class="mb-3 shadow-lg w-50">
                                            <div class="text-center fondo1_gradiente text-white">Proveedor</div>
                                            <select class="form-control " name="combo_proveedor" id="combo_proveedor">
                                                <option value="1">
                                                    nestle
                                                </option>
                                                <option value="2">
                                                    Mini Mascotas
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 shadow-lg  mt-1 ">
                                        <input value="" type="text" class="form-control " name="imgprod " id="imgprod " aria-describedby="emailHelpId" placeholder="Nombre de la imagen del producto">
                                    </div>

                                    <div class="mb-3 shadow-lg  mt-1 ">

                                        <div class="mb-3 shadow-lg  mt-3">
                                            <textarea class="w-100 h-100" name="textarea_producto" id="textarea_producto" rows="6" placeholder="Descripcion del producto"></textarea>
                                        </div>
                                    </div>

                                    <button name="btn_agregar_producto" id="btn_agregar_producto" type="submit" value="btn_agregar_producto" class=" btn   border  fondo1_gradiente text-white bg_verde_claro box_shadow_black btn-outline-success w-100 shadow-lg ">AGREGAR PRODUCTO</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Seccion reporte de tabla producto-->
                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mt-5 ms-4 border">
                    <div class=" d-flex justify-content-start align-items-center py-3">
                        <form class="row " action="pdf_datos_producto.php" method="post">
                            <div class="w-100 ms-2">
                                <button value="btn_pdf_registros_producto" name="btn_pdf_registros_producto" id="btn_pdf_registros_producto" type="submit" class=" h-100 btn  shadow-lg border c_white  bg_verde_claro box_shadow_black w-auto est_txt_3 ">Datos de productos </button>
                            </div>
                        </form>

                        <form class="row" action="pdf_datos_todos_proveedores.php" method="post">
                            <div class="w-100 ms-2">
                                <button value="btn_pdf_registros_producto" name="btn_pdf_registros_producto" id="btn_pdf_registros_producto" type="submit" class=" h-100 btn shadow-lg  border c_white  bg_verde_claro box_shadow_black w-auto est_txt_3 ">Datos de los proveedores </button>
                            </div>
                        </form>
                    </div>


                    <form class="row" action="pdf_datos_proveedor.php" method="post">
                        <div class="col d-flex justify-content-center align-items-center border p-3 ">
                            <div class="w-100 mx-2 ">
                                <button value="btn_pdf_prod_x_proveedor" name="btn_pdf_prod_x_proveedor" id="btn_pdf_prod_x_proveedor" type="submit" class="w-100 h-100 btn   border c_white  bg_verde_claro box_shadow_black  shadow-lg ">Datos del proveedor</button>
                            </div>
                            <div class="w-100 d-flex ms-2">
                                <div class="est_txt_3 fondo1_gradiente text-white text-center shadow-lg px-2 d-flex align-items-center">proveedor</div>
                                <select class=" form-control shadow-lg" name="combo_proveedor" id="combo_proveedor">
                                    <?php
                                    while ($row = mysqli_fetch_array($result4)) {
                                    ?>
                                        <option value="<?php echo $row['codprove']; ?>">
                                            <?php echo $row['nomprove']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>



                    <form class="row" action="pdf_prod_x_cliente.php" method="post">
                        <div class="col d-flex justify-content-center align-items-center border p-3">
                            <div class="w-100 ms-2 shadow-lg">
                                <button value="btn_pdf_prod_x_cliente.php" name="btn_pdf_prod_x_cliente" id="btn_pdf_prod_x_cliente" type="submit" class=" btn   border c_white  bg_verde_claro box_shadow_black w-100  ">Productos por cliente</button>
                            </div>

                            <div class="w-100 d-flex ms-3">
                                <div class="est_txt_3 fondo1_gradiente text-white text-center shadow-lg px-2 d-flex align-items-center">Cedula</div>
                                <input value="" type="text" class="form-control" name="cedcli" id="cedcli" aria-describedby="emailHelpId" placeholder="C.I. del Cliente">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="row ">
                    <!--Consulta producto por categoria-->
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ps-4 mt-5  ">
                        <div class="row border m-0 p-0">


                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0  border ">
                                <h4 class="card-header h-100 d-flex align-items-center justify-content-center">Consulta de Productos por categoria con + de 30 unid. en stock<h4>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0 m-0  border">
                                <!--form consulta-->

                                <form action="" method="POST">
                                    <div class="d-flex justify-content-between p-3">

                                        <div class="shadow-lg w-100 me-2 d-flex">
                                            <div class="text-center fondo1_gradiente text-white w-50 est_txt_3 d-flex align-items-center justify-content-center">Seleccione Categoria</div>
                                            <select class="form-control w-50 " name="combo_categoria" id="combo_categoria">
                                                <option value="0">
                                                    0-Alimentos
                                                </option>
                                                <option value="1">
                                                    1-Juguetes
                                                </option>
                                            </select>
                                        </div>


                                        <div class="w-75  ms-2">
                                            <button value="btn_consulta_prod_por_cat" name="btn_consulta_prod_por_cat" id="btn_consulta_prod_por_cat" type="submit" class=" h-100 btn   border c_white  bg_verde_claro box_shadow_black w-100 est_txt_3 ">CONSULTAR</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!--Grafica de consulta de productos por categoria-->
                            <div class="row fondo5_gradiente p-0 m-0 ">
                                <div class="col-1 col-xs-1 col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 m-0"></div>

                                <div class="col-10 col-xs-10 col-sm-8 col-md-8 col-lg-8 col-xl-8    ">

                                    <div class="row">

                                        <div class="col-12 card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="chart-container" style="height:500px; width:500px">
                                                    <canvas id="myChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-1 col-xs-1 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
</section>
</body>
<?php
include 'header_footer/footer.php';
?>

<script>
    function del(id) {
        alertify.confirm("CTMC/SYSTEM", "Desea Eliminar Producto.",
            function() {
                window.location = "producto_eliminado.php?codprod=" + id;
            },
            function() {
                window.location = "principal_sistema.php";
            })
    }
</script>
<script src="alertifyjs/alertify.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="charjs/chart.js"></script>
<script src="charjs/chart.esm.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="charjs/jquery/jquery.js"></script>

<script src="/alertifyjs/alertify.min.js"></script>



<script src="js/bootstrap.min.js"></script>
<script src="charjs/chart.js"></script>
<script src="charjs/chart.esm.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="charjs/jquery/jquery.js"></script>

<script>
    const labels = <?php echo json_encode($etiqueta) ?>;


    const data = {
        labels: labels,
        datasets: [{
            label: 'Mi Primer datasets',
            backgroundColor: ['rgb(255,99,132,10)',
                'rgb(125,123,10,10)',
                'rgb(255,206,86,10)',
                'rgb(75,192,192,10)',
                'rgb(153,102,255,10)',
                'rgb(255,159,64,10)'
            ],
            borderColor: 'white',
            data: <?php echo json_encode($data) ?>,
        }]
    };
    const config = {
        type: 'doughnut', //polarArea,bar,line,pie
        data: data,
        options: {}
    };
</script>

<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    )
</script>