<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	$query=mysqli_query($con,"SELECT * FROM nombre_gasto WHERE id_mes_nomg=1");
	 while($row = mysqli_fetch_array($query)){
            	$nombre=$row['nombre'];
?>

		<table class="table table-bordered table-striped" id="mytable">
	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	            	<th>Nombre</th>
	                <th>Cantidad</th>
	            </tr>
	         </thead>

<?php



			$result = mysqli_query($con,"SELECT fecha, SUM(cantidad) as cantidad_sum FROM gasto group by fecha ");
            while ($total = $result->fetch_object()){

?>


	        <tbody>
	            <tr>
	            <td><?php echo $nombre; ?></td>
				<td><?php echo $total->cantidad_sum; ?></td>
	        </tbody>
<?php
	}
}
?>
	    </table>