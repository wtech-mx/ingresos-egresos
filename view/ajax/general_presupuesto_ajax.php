<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");

	$query=mysqli_query($con,"SELECT * FROM presupuesto");
?>

	<table class="table table-bordered table-striped" id="mytable">

	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	            	<th>Nombre</th>
	                <th>Partida</th>
	                <th>Por Utilizar</th>
	            </tr>
	        </thead>

	    <?php
			$finales=0;
			while($row = mysqli_fetch_array($query)){
				$id=$row['id'];
				$partida=$row['partida'];
				$gasto_code=$row['gasto_code'];
				$finales++;
		?>

	    <tbody>

    	<?php
    	if($partida == 1){
        	$result = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto group by partida=1");

    	?>
	            <tr>
		            <td><?php echo $id ?></td>
					<td><?php echo 'Adquisición Directa' ?></td>
		            <td><?php echo $utilizar_sum; ?></td>
				</tr>
		<?php  }?>

		<?php if($partida == 2){
        	$result = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto group by partida=2");
        	while ($total = $result->fetch_object()){
    	?>
				<tr>
		            <td><?php echo $id ?></td>
					<td><?php echo 'Restringido' ?></td>
					<td><?php echo  $total->utilizar_sum;  ?></td>
				</tr>
		<?php } }?>

		<?php if($partida == 3){
        	$result = mysqli_query($con,"SELECT partida, SUM(utilizar) as utilizar_sum  FROM presupuesto group by partida=3");
        	while ($total = $result->fetch_object()){
    	?>
				<tr>
		            <td><?php echo $id ?></td>
					<td><?php echo 'Consolidada' ?></td>
					<td><?php echo $total->utilizar_sum; ?></td>
				</tr>
		<?php } }?>

	    </tbody>
			<?php
				    }

		    ?>
	    </table>

