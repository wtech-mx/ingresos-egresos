<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="nombre_presupuesto";
	$campos="*";
	$sWhere=" nombre LIKE '%".$query."%'";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //cuantos registros quieres mostrar
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	//Cuente el número total de filas en su tabla*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$reload = './general_presupuesto.php';
	//consulta principal para recuperar los datos
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//recorrer los datos recuperados


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
	$querys=mysqli_query($con,"SELECT * FROM nombre_presupuesto ");

	while($row = mysqli_fetch_array($querys)){
		$id=$row['id'];
		$nombre=$row['nombre'];

		$AdquiDirecta = 1;
		$Restringido = 2;
		$Consolidada = 3;
?>

	<table class="table table-bordered table-striped" id="mytable">

	         <thead class="bg-dark text-white">
	        	<div id="adicionados"></div>
	            <tr>
	                <th>Partida</th>
	                <th>Por Utilizar</th>
	                <th>Año</th>
	            </tr>
	        </thead>
	    <tbody>
    	<?php



	    $result = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$AdquiDirecta group by fecha ORDER BY fecha ASC");
	    $result2 = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum2  FROM presupuesto WHERE partida=$Restringido group by fecha ORDER BY fecha DESC");
	   	$result3 = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum3  FROM presupuesto WHERE partida=$Consolidada group by fecha ORDER BY fecha DESC");
        	while ($total = $result->fetch_object()){
        		while ($total2 = $result2->fetch_object()){
        			while ($total3 = $result3->fetch_object()){

        		?>

	            <tr>
					<td>Adquisición Directa</td>
		           	<td>$ <?php echo  $total->utilizar_sum;  ?></td>
		           	<td><?php echo($total -> fecha); ?></td>

				</tr>
<?php


        	?>

				<tr>
					<td>Restringido</td>
					<td>$ <?php echo  $total2->utilizar_sum2;  ?></td>
					<td><?php echo($total2 -> fecha); ?></td>

				</tr>
<?php

        		?>

				<tr>
					<td>Consolidada</td>
					<td>$ <?php echo $total3->utilizar_sum3; ?></td>
					<td><?php echo($total3 -> fecha); ?></td>

				</tr>

<?php
					}
				}
			   }break;
			}
?>

	    </tbody>

	    </table>
<?php
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}
}
