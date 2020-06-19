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
	$tables="presupuesto";
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
	$reload = './general_presupuesto.php';
	//main query to fetch the data
	//
	$query = mysqli_query($con,"SELECT  $campos FROM  $tables where $sWhere group by partida  ");
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

		<h1><?php echo $fecha; ?></h1>
		<div class="table-responsive">
		    <table class="table table-bordered mb-0">
		        <thead class="bg-dark text-white">
		            <tr>

		                <th>Concepto</th>
		                <th>Ingreso Asignado</th>
		                <th>Utilizado</th>
		                <th>Utilizar</th>

		            </tr>
		        </thead>

		        <?php
					while($row = mysqli_fetch_array($query)){
						$id=$row['id'];
						$gasto_code=$row['gasto_code'];
						$mes_id=$row['mes_id'];
						$monto=$row['monto'];
						$partida=$row['partida'];
						$utilizado=$row['utilizado'];
						$utilizar=$row['utilizar'];
						$fecha=$row['fecha'];
						$finales++;
				?>
		        <tbody>

		            <tr>

					 	<?php if ($partida == 1){

	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$partida HAVING fecha = 2020");
	                	    $partida = 'Adquisición Directa' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){ ?>
			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=1 GROUP BY fecha HAVING fecha = 2020");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>

		               		 	<td><?php echo $resta  ?>  </td>
							<?php } } }?>




						<?php if ($partida == 2): ?>
			                <?php
		                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=$partida");
		                	    $partida = 'restringuidos' ?>
				                <td><?php echo $partida ?></td>
	    						 <?php	while ($total = $result->fetch_object()){?>
				            			                <td>$<?php echo $monto?>  </td>


								<?php
		                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=2 GROUP BY fecha HAVING fecha = 2020");?>
	    						 <?php	while ($total2 = $result2->fetch_object()){?>

					                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

					            <?php  $resta = $monto - $total2->utilizado_sum;?>

			               		 	<td><?php echo $resta  ?>  </td>
								<?php } }?>
						<?php endif ?>


						<?php if ($partida == 3): ?>
		                <?php
	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar3) as utilizar_sum  FROM presupuesto WHERE partida=$partida HAVING fecha = 2020");
	                	    $partida = 'consolidadosa' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){?>
			            			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=3 GROUP BY fecha HAVING fecha = 2020");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>

		               		 	<td><?php echo $resta  ?>  </td>
							<?php } }?>
						<?php endif ?>

		            </tr>

		        </tbody>
		        <?php  } ?>
		    </table>
		</div>
<?php


	}else if ($fecha == 2021) { ?>
		<h1><?php echo $fecha; ?></h1>
		<div class="table-responsive">
		    <table class="table table-bordered mb-0">
		        <thead class="bg-dark text-white">
		            <tr>

		                <th>Concepto</th>
		                <th>Ingreso Asignado</th>
		                <th>Utilizado</th>
		                <th>Utilizar</th>
		                <th>Fecha</th>

		            </tr>
		        </thead>

		        <?php
		        $query3 = mysqli_query($con,"SELECT  * FROM  presupuesto HAVING fecha = 2021");
					while($row = mysqli_fetch_array($query3)){
						$id=$row['id'];
						$gasto_code=$row['gasto_code'];
						$mes_id=$row['mes_id'];
						$monto=$row['monto'];
						$partida=$row['partida'];
						$utilizado=$row['utilizado'];
						$utilizar=$row['utilizar'];
						$fecha=$row['fecha'];
						$finales++;
				?>
		        <tbody>

		            <tr>

					 	<?php if ($partida == 1):

	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$partida GROUP BY fecha HAVING fecha = 2021 ");
	                	    $partida = 'Adquisición Directa' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){ ?>
			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=1 GROUP BY fecha HAVING fecha = 2021");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>
		               		 	<td><?php echo $resta  ?>  </td>
							<?php } }?>
							<td><?php echo $fecha  ?>  </td>
						<?php endif ?>





						<?php if ($partida == 2): ?>
			                <?php
		                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=$partida GROUP BY fecha HAVING fecha = 2021");
		                	    $partida = 'restringuidos' ?>
				                <td><?php echo $partida ?></td>
	    						 <?php	while ($total = $result->fetch_object()){?>
				            			                <td>$<?php echo $monto?>  </td>


								<?php
		                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=2 GROUP BY fecha HAVING fecha = 2021");?>
	    						 <?php	while ($total2 = $result2->fetch_object()){?>

					                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

					            <?php  $resta = $monto - $total2->utilizado_sum;?>

			               		 	<td><?php echo $resta  ?>  </td>
								<?php } }?>
								<td><?php echo $fecha  ?>  </td>
						<?php endif ?>


						<?php if ($partida == 3): ?>
		                <?php
	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar3) as utilizar_sum  FROM presupuesto WHERE partida=$partida GROUP BY fecha HAVING fecha = 2021");
	                	    $partida = 'consolidadosa' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){?>
			            			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=3 GROUP BY fecha HAVING fecha = 2021");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>

		               		 	<td><?php echo $resta  ?>  </td>
							<?php } }?>
							<td><?php echo $fecha  ?>  </td>
						<?php endif ?>

		            </tr>

		        </tbody>
		        <?php  } } ?>
		    </table>
		</div>
	<?php
			}

		}
	}

?>
