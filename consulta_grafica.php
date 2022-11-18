<?php
//*include("session.php);
require_once 'dbconnect.php';

session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:bienvenida.php');
}

//$cat=$_POST['codcat];
$codcat = $_POST['codcat'];




$etiqueta = array();
$data = array();
$query = "SELECT nomprod,unistockprod	from producto where codcat='" . $codcat . "' AND unistockprod >=30; ";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    array_push($etiqueta, $row['nomprod']);
    array_push($data, $row['unistockprod']);
}





include 'header_footer/header_con_sesion_iniciada.php';
?>

<section>
<div class="row container">
        <div class="col-6">
            <div class="card">
                <h1 class="text-center">Grafica</h1>
                <div class="card-header">featured</div>
                <div class="card-body">
                    <div class="chart-container" style="height:500px; width:500px">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="container-fluid m-5  pe-5 ps-5">
                <div class="row ">
                    <div class="col p-5  shadow-lg p-3 mb-5 bg-body rounded">
                        <h5 class="text-center">Consulta Producto</h5>
                        <hr>
                        <form action="" method="post">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text" id="usuario"><i class="fa-solid fa-hashtag"></i></span>
                                <input type="text" class="form-control" name="codprod" id="codprod" aria-describedby="helpId" placeholder="codigo producto">
                            </div>
                            <button name="btn_guardar" id="btn_guardar" class="w-100 btn btn-outline-success boton_color " value="btn_guardar" type="submit">Consulta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>

<?php
include 'header_footer/footer.php';
?>
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