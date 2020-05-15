<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	$query=mysqli_query($con,"SELECT * FROM nombre_presupuesto");

			while($row = mysqli_fetch_array($query)){
				$id=$row['id'];
				$nombre=$row['nombre'];
				$fecha=$row['fecha'];

		?>
	<table class="table table-bordered table-striped" id="mytable">

	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
				<h3><?php echo $nombre; ?></h3>
	            	<th>id</th>
	                <th>Partida</th>
	                <th>Por Utilizar</th>
	                <th>Año</th>
	            </tr>
	        </thead>

	    <?php



		?>

	    <tbody>

    	<?php
	    $result = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=1 group by fecha");
        	while ($total = $result->fetch_object()){
		?>
	            <tr>
	            	<td><?php echo $id; ?></td>
					<td>Adquisición Directa</td>
		           	<td><?php echo  $total->utilizar_sum;  ?></td>
		           	<td><?php echo  $fecha ?></td>

				</tr>
<?php
				}


	 $result2 = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum2  FROM presupuesto WHERE partida=2 group by fecha");
        	while ($total = $result2->fetch_object()){  ?>
				<tr>
					<td><?php echo $id; ?></td>
					<td>Restringido</td>
					<td><?php echo  $total->utilizar_sum2;  ?></td>
					<td><?php echo  $fecha ?></td>

				</tr>
<?php
				}


	 $result3 = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum3  FROM presupuesto WHERE partida=3 group by fecha");
        	while ($total = $result3->fetch_object()){ ?>
				<tr>
					<td><?php echo $id; ?></td>
					<td>Consolidada</td>
					<td><?php echo $total->utilizar_sum3; ?></td>
					<td><?php echo  $fecha ?></td>

				</tr>
<?php
			   }break;

}
?>

	    </tbody>

	    </table>

