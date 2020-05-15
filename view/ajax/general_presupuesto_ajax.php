<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");

	$query=mysqli_query($con,"SELECT * FROM nombre_presupuesto ");

	while($row = mysqli_fetch_array($query)){
		$id=$row['id'];
		$nombre=$row['nombre'];
		$AdquiDirecta = 1;
		$Restringido = 2;
		$Consolidada = 3;
		?>
	<table class="table table-bordered table-striped" id="mytable">

	        <thead>
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
        	while ($total = $result->fetch_object()){
        		?>

	            <tr>
					<td>Adquisición Directa</td>
		           	<td>$ <?php echo  $total->utilizar_sum;  ?></td>
		           	<td><?php echo($total -> fecha); ?></td>
				</tr>
<?php
				}


	 $result2 = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum2  FROM presupuesto WHERE partida=$Restringido group by fecha ORDER BY fecha DESC");
        	while ($total2 = $result2->fetch_object()){  ?>
				<tr>
					<td>Restringido</td>
					<td>$ <?php echo  $total2->utilizar_sum2;  ?></td>
					<td><?php echo($total2 -> fecha); ?></td>

				</tr>
<?php
				}


	 $result3 = mysqli_query($con,"SELECT partida, fecha, SUM(utilizar) as utilizar_sum3  FROM presupuesto WHERE partida=$Consolidada group by fecha ORDER BY fecha DESC");
        	while ($total3 = $result3->fetch_object()){ ?>
				<tr>

					<td>Consolidada</td>
					<td>$ <?php echo $total3->utilizar_sum3; ?></td>
					<td><?php echo($total3 -> fecha); ?></td>

				</tr>
<?php
			   }break;
			}
?>

	    </tbody>

	    </table>

