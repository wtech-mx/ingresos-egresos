<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");

	if (isset($_REQUEST["id"])){//codigo para eliminar
	$id=$_REQUEST["id"];
	$id=intval($id);
	if($delete=mysqli_query($con, "DELETE FROM presupuesto WHERE id='$id'")){
		$aviso="Bien hecho!";
		$msj="Datos eliminados satisfactoriamente.";
		$classM="alert alert-success";
		$times="&times;";
	}else{
		$aviso="Aviso!";
		$msj="Error al eliminar los datos ".mysqli_error($con);
		$classM="alert alert-danger";
		$times="&times;";
	}
}

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="excedentes_ingresos";
	$campos="*";
	$sWhere=" id LIKE '%".$query."%'";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$reload = './general_Exedentes.php';
	//main query to fetch the data
	//
	$query = mysqli_query($con,"SELECT  $campos FROM  $tables where $sWhere  group by servicios ");
	//loop through fetched data

	if (isset($_REQUEST["id"])){
?>
		<div class="<?php echo $classM;?>">
			<button type="button" class="close" data-dismiss="alert"><?php echo $times;?></button>
			<strong><?php echo $aviso?> </strong>
			<?php echo $msj;?>
		</div>
<?php
	}
		if ($numrows>0){
		$numrows = $row['numrows'];
		$finales=0;

		$query2 = mysqli_query($con,"SELECT  * FROM  presupuesto GROUP BY fecha");
		while($row = mysqli_fetch_array($query2)){
			$fecha=$row['fecha'];
	if ($fecha == 2020) {
?>

<h1><?php echo $fecha  ?></h1>
		<div class="table-responsive">
		    <table class="table table-bordered mb-0">
		        <thead class="bg-dark text-white">
	            <tr>
	            	<th>Servicios</th>
	                <th>Ingresos </th>
					<th>Egresos </th>
					<th>Total </th>
	            </tr>
		        </thead>



		        <?php
					$finales=0;
					while($row = mysqli_fetch_array($query)){
						$id=$row['id'];
						$porcentaje=$row['porcentaje'];
						$partida=$row['partida'];
						$servicios=$row['servicios'];
						$concepto=$row['concepto'];
						$area=$row['area'];
						$estado=$row['estado'];
						$monto=$row['monto'];
						$finales++;
				?>
		        <tbody>
		            <tr>


					<?php if ($servicios == 1):
						$result = mysqli_query($con,"SELECT porcentaje, servicios, fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=$servicios && estado=1 GROUP BY fecha HAVING fecha = 2020");
                	    $servicios = 'Productos' ?>
		                <td><?php echo $servicios ?></td>
							<?php	while ($total = $result->fetch_object()){?>

		                <td>$ <?php echo $total->utilizar_sum  ?></td>

						<?php } ?>
						<?php endif ?>

					<?php if ($servicios == 2):
                	    $result = mysqli_query($con,"SELECT porcentaje, servicios, fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=$servicios && estado=1 GROUP BY fecha, estado=1 HAVING fecha = 2020");
                	    $servicios = 'Derechos' ?>
		                <td><?php echo $servicios ?></td>
							<?php	while ($total = $result->fetch_object()){ ?>

		                <td>$ <?php echo $total->utilizar_sum  ?>  </td>

						<?php } ?>
						<?php endif ?>


					<?php if ($servicios == 3):
                	    $result = mysqli_query($con,"SELECT porcentaje, servicios, fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=$servicios && estado=1 group by fecha, estado=1 HAVING fecha = 2020");
                	    $servicios = 'Aprovechamiento' ?>
		                <td><?php echo $servicios ?></td>


							<?php	while ($total = $result->fetch_object()){ ?>

		                <td>$ <?php echo $total->utilizar_sum  ?>  </td>


						<?php } ?>
						<?php endif ?>

		            </tr>
		        </tbody>
		        <?php  }?>

		        <?php  $result = mysqli_query($con,"SELECT fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE estado=1 group by fecha HAVING fecha = 2020");
					while ($total = $result->fetch_object()){ ?>
						<th>Subtotal </th>
		                <td>$ <?php echo $total->utilizar_sum  ?>  </td>


				<?php  $result2 = mysqli_query($con,"SELECT fecha, SUM(egreso) as utilizar_sum2  FROM excedentes_egresos group by fecha HAVING fecha = 2020");
					while ($total2 = $result2->fetch_object()){ ?>
		                <td>$ <?php echo $total2->utilizar_sum2  ?>  </td>


				<?php  $resta = $total->utilizar_sum - $total2->utilizar_sum2;?>
		                <td><?php echo $resta  ?>  </td>
						<?php } }?>


		    </table>
		</div>

<?php	}else if ($fecha == 2021) { ?>
	<h1><?php echo $fecha  ?></h1>
		<div class="table-responsive">
		    <table class="table table-bordered mb-0">
		        <thead class="bg-dark text-white">
		             <tr>
	            	<th>Fecha</th>
	            	<th>Servicios</th>
	                <th>Ingresos </th>
					<th>Egresos </th>
					<th>Total </th>
	            </tr>
		        </thead>

		        <?php
		        $query3 = mysqli_query($con,"SELECT  * FROM  excedentes_ingresos HAVING fecha = 2021");
					while($row = mysqli_fetch_array($query3)){
						$id=$row['id'];
						$porcentaje=$row['porcentaje'];
						$partida=$row['partida'];
						$servicios=$row['servicios'];
						$concepto=$row['concepto'];
						$area=$row['area'];
						$estado=$row['estado'];
						$monto=$row['monto'];
						$fecha=$row['fecha'];
						$finales++;
				?>
		        <tbody>

		           <tr>


					<?php if ($servicios == 1):
						$result = mysqli_query($con,"SELECT porcentaje, servicios, fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=$servicios && estado=1 GROUP BY fecha HAVING fecha = 2021");
                	    $servicios = 'Productos' ?>
		                <td><?php echo $servicios ?></td>
							<?php	while ($total = $result->fetch_object()){?>

		                <td>$ <?php echo $total->utilizar_sum  ?></td>

						<?php } ?>
						<?php endif ?>

					<?php if ($servicios == 2):
                	    $result = mysqli_query($con,"SELECT porcentaje, servicios, fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=$servicios && estado=1 GROUP BY fecha, estado=1 HAVING fecha = 2021");
                	    $servicios = 'Derechos' ?>
		                <td><?php echo $servicios ?></td>
							<?php	while ($total = $result->fetch_object()){ ?>

		                <td>$ <?php echo $total->utilizar_sum  ?>  </td>

						<?php } ?>
						<?php endif ?>


					<?php if ($servicios == 3):
                	    $result = mysqli_query($con,"SELECT porcentaje, servicios, fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=$servicios && estado=1 group by fecha, estado=1 HAVING fecha = 2021");
                	    $servicios = 'Aprovechamiento' ?>
		                <td><?php echo $servicios ?></td>


							<?php	while ($total = $result->fetch_object()){ ?>

		                <td>$ <?php echo $total->utilizar_sum  ?>  </td>


						<?php } ?>
						<?php endif ?>

		            </tr>

		        </tbody>
		        <?php  }?>

		        <?php  $result = mysqli_query($con,"SELECT fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE estado=1 group by fecha HAVING fecha = 2021");
					while ($total = $result->fetch_object()){ ?>
						<th>Subtotal </th>
		                <td>$ <?php echo $total->utilizar_sum  ?>  </td>


				<?php  $result2 = mysqli_query($con,"SELECT fecha, SUM(egreso) as utilizar_sum2  FROM excedentes_egresos group by fecha HAVING fecha = 2021");
					while ($total2 = $result2->fetch_object()){ ?>
		                <td>$ <?php echo $total2->utilizar_sum2  ?>  </td>


				<?php  $resta = $total->utilizar_sum - $total2->utilizar_sum2;?>
		                <td><?php echo $resta  ?>  </td>
						<?php } }?>
		        <?php  }  ?>
		    </table>
		</div>
	<?php
			}

		}
	}

?>
