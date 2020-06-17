<?php
    $active1="active";
    include "resources/header.php";

    if ($_SESSION['dashboard']==1){

        $empleados = mysqli_query($con, "SELECT * FROM empleado");
        $talleres = mysqli_query($con, "SELECT * FROM taller");
        $empresas = mysqli_query($con, "SELECT * FROM empresa");
        $vehiculos = mysqli_query($con, "SELECT * FROM vehiculo");

        function suma_reparaciones($month){
            global $con;
            $year=date('Y');
            $sql="SELECT count(id) as id FROM reparaciones WHERE year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }
        function suma_choques($month){
            global $con;
            $year=date('Y');
            $sql="SELECT count(id) as id FROM choque WHERE year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }

?>
        <!--main content start-->
<div class="col">
        <div class="row p-3">

          <div class="col-sm-6">
            <div class="card text-white bg-primary mb-3">
              <div class="card-body">
                <h5 class="card-title text-white"><strong>Gasto Corriente</strong></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-success">ir</a>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card text-white bg-secondary mb-3">
              <div class="card-body">
                <h5 class="card-title text-white"><strong>Fideicomiso</strong></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-danger">ir</a>
              </div>
            </div>
          </div>

        </div>
        <div class="row">

          <div class="col-sm-6">
            <div class="card text-white bg-success mb-3">
              <div class="card-body">
                <h5 class="card-title text-white">Exedentes</h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-dark">ir</a>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body">
                <h5 class="card-title text-white">Presupuesto Federal</h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-secondary">ir</a>
              </div>
            </div>
          </div>

        </div>
        <div class="row">

          <div class="col-sm-12">
            <div class="card text-white bg-dark mb-3">
              <div class="card-body">
                <h5 class="card-title text-white">Configuracion</h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-success">ir</a>
              </div>
            </div>
          </div>

        </div>
</div>
        <!--main content end-->

<?php
    include "resources/footer.php";
?>
<script src="assets/plugins/chartjs/Chart.min.js"></script>
<!--Page Level JS-->
<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>
<script>
var barChartData = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : [<?php echo suma_reparaciones(1);?>, <?php echo suma_reparaciones(2);?>, <?php echo suma_reparaciones(3);?>, <?php echo suma_reparaciones(4);?>, <?php echo suma_reparaciones(5);?>, <?php echo suma_reparaciones(6);?>, <?php echo suma_reparaciones(7);?>,<?php echo suma_reparaciones(8);?>,<?php echo suma_reparaciones(9);?>,<?php echo suma_reparaciones(10);?>,<?php echo suma_reparaciones(11);?>,<?php echo suma_reparaciones(12);?>]
        },
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            data : [<?php echo suma_choques(1);?>, <?php echo suma_choques(2);?>, <?php echo suma_choques(3);?>, <?php echo suma_choques(4);?>, <?php echo suma_choques(5);?>, <?php echo suma_choques(6);?>, <?php echo suma_choques(7);?>,<?php echo suma_choques(8);?>,<?php echo suma_choques(9);?>,<?php echo suma_choques(10);?>,<?php echo suma_choques(11);?>,<?php echo suma_choques(12);?>]
        }
    ]

}
var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
</script>

<!-- Morris  -->
<script src="assets/plugins/morris/js/morris.min.js"></script>
<script src="assets/plugins/morris/js/raphael.2.1.0.min.js"></script>

<!--Load these page level functions-->
<script>
    $(document).ready(function() {
        app.timer();
        app.weather();
    });
</script>
<?php
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush();
?>