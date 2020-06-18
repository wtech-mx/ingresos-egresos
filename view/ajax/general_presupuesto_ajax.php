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
?>


		<div class="table-responsive">
		    <table class="table table-bordered mb-0">
		        <thead class="bg-dark text-white">
		            <tr>
<!-- 		                <th>#ID</th>
		                <th>gasto_code</th>
		                <th>mes_id</th>
		                <th>monto</th>
		                <th>Utilizado</th> -->
		                <th>Concepto</th>
		                <th>Ingreso Asignado</th>
		                <th>Utilizado</th>
		                <th>Utilizar</th>
		            </tr>
		        </thead>


			<?php echo $numrows = $row['numrows']; ?>

		        <?php
					$finales=0;
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
<!-- 		                <td><?php echo $id ?></td>
		                <td><?php echo $gasto_code ?></td>
		                <td><?php echo $mes_id ?></td>
		                <td>$ <?php echo $monto ?></td>

		                <td>$ <?php echo $utilizado ?></td> -->

					 	<?php if ($partida == 1):

	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$partida group by fecha ");
	                	    $partida = 'Adquisición Directa' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){ ?>
			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto  group by fecha ");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>

		               		 	<td><?php echo $resta  ?>  </td>
							<?php } }?>
							<?php endif ?>




						<?php if ($partida == 2): ?>
		                <?php
	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=$partida group by fecha ");
	                	    $partida = 'restringuidos' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){?>
			            			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=2  group by fecha ");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>

		               		 	<td><?php echo $resta  ?>  </td>
							<?php } }?>
						<?php endif ?>




						<?php if ($partida == 3): ?>
		                <?php
	                	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar3) as utilizar_sum  FROM presupuesto WHERE partida=$partida group by fecha ");
	                	    $partida = 'consolidadosa' ?>
			                <td><?php echo $partida ?></td>
    						 <?php	while ($total = $result->fetch_object()){?>
			            			                <td>$<?php echo $monto?>  </td>


							<?php
	                	     $result2 = mysqli_query($con,"SELECT  fecha, SUM(utilizado) as utilizado_sum  FROM presupuesto WHERE partida=3  group by fecha ");?>
    						 <?php	while ($total2 = $result2->fetch_object()){?>

				                <td>$ <?php echo $total2->utilizado_sum  ?>  </td>

				            <?php  $resta = $monto - $total2->utilizado_sum;?>

		               		 	<td><?php echo $resta  ?>  </td>
							<?php } }?>
						<?php endif ?>

		            </tr>

		        </tbody>
		        <?php  }?>
		        <tfoot>
		            <tr>
						<td colspan='10'>
							<?php
								$inicios=$offset+1;
								$finales+=$inicios -1;
								echo "Mostrando $inicios al $finales de $numrows registros";
								echo paginate($reload, $page, $total_pages, $adjacents);
							?>
						</td>
					</tr>
				</tfoot>
		    </table>
		</div>

<?php
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}
}
?>
