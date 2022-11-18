<?php
include("dbconnect.php");
    $query = "SELECT * FROM proveedor";    
    $result = mysqli_query($link, $query);  
include 'header_footer/header.php';
?>
<section>
    <div class="row container mt-5">
        <div class="col">BIENVENIDO</div>
        <form action="pdf_datos_proveedor.php" method="post">          
        
            <select name="combo_proveedor" id="combo_proveedor">
                    <?php
                        while ($row = mysqli_fetch_array($result)) 
                        {
                    ?>
                        <option value="<?php echo $row['codprove']; ?>">
                            <?php echo $row['nomprove']; ?>
                        </option>
                    <?php
                    }
                    ?>
            </select>
            <button class="btn btn-outline-success boton_color" type="submit">Reporte</button>
        </form>

    </div>

</section>
<?php
include 'header_footer/footer.php';
?>
