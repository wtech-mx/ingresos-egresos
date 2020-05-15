<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");

		?>
	<table class="table table-bordered table-striped" id="mytable">

	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	            	<th>id</th>
	            	<th>Nombre</th>
	                <th>Partida</th>
	                <th>Por Utilizar</th>
	                <th>Año</th>
	            </tr>
	        </thead>

	    <?php
			$query=mysqli_query($con,"SELECT * FROM presupuesto");

			$tables="nombre_presupuesto";
			$campos="*";
			$sWhere="nombre";
        	$query2 = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere");

			while($row = mysqli_fetch_array($query2)){
				$id=$row['id'];
				$nombre=$row['nombre'];
				$id_mes_pre=$row['id_mes_pre'];

			while($row = mysqli_fetch_array($query)){
				$id=$row['id'];
				$partida=$row['partida'];
				$gasto_code=$row['gasto_code'];
				$fecha=$row['fecha'];

		?>

	    <tbody>

    	<?php
	$AdquiDirecta = 1;
	$Restringido = 2;
	$Consolidada = 3;

    if($partida == 1){
     $result = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$AdquiDirecta ");

        	while ($total = $result->fetch_object()){ ?>
	            <tr>
	            	<td><?php echo $id; ?></td>
		            <td><?php echo $nombre; ?></td>
					<td>Adquisición Directa</td>
		           	<td><?php echo  $total->utilizar_sum;  ?></td>
		           	<td><?php echo  $fecha ?></td>

				</tr>
<?php
				}
			 }

		if($partida == 2){
	 $result2 = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$Restringido");
        	while ($total = $result2->fetch_object()){  ?>
				<tr>
					<td><?php echo $id; ?></td>
		            <td><?php echo $nombre ?></td>
					<td>Restringido</td>
					<td><?php echo  $total->utilizar_sum;  ?></td>
					<td><?php echo  $fecha ?></td>

				</tr>
<?php
				}
			 }

		if($partida == 3){
	 $result3 = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto WHERE partida=$Consolidada");
        	while ($total = $result3->fetch_object()){ ?>
				<tr>
					<td><?php echo $id; ?></td>
		            <td><?php echo $nombre ?></td>
					<td>Consolidada</td>
					<td><?php echo $total->utilizar_sum; ?></td>
					<td><?php echo  $fecha ?></td>

				</tr>
<?php
			   }
			 }
			}
		   }
?>

	    </tbody>

	    </table>

