<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");


$query2 = mysqli_query($con,"SELECT * FROM  nombre_excedentes where id_mes_exc=1");
        	while($row = mysqli_fetch_array($query2)){
		?>
	<table class="table table-bordered table-striped" id="mytable">

	        <thead>

	        	<div id="adicionados"></div>
	            <tr>
	            	<th>nombre</th>
	                <th>Productos</th>
	                <th>Derechos</th>
	                <th>Aprovechamientos</th>
	            </tr>
	        </thead>

	    <?php


		?>

	    <tbody>

<?php

			$result = mysqli_query($con,"SELECT fecha, SUM(monto) as utilizar_sum  FROM excedentes_ingresos WHERE servicios=1 group by fecha");
			$result2 = mysqli_query($con,"SELECT fecha, SUM(monto) as utilizar_sum2  FROM excedentes_ingresos WHERE servicios=2 group by fecha");?>

        	  <?php foreach ($result2 as $results) : ?>
        	  <?php  foreach ($result as $results) :?>
        	  	<?php $sqls = array($results , $result2); ?>
        	 	<tr>
	            	<td><?php echo $id = $results['fecha']; ?></td>
		            <td><?php echo $utilizar_sum = $results['utilizar_sum']; ?></td>
		            <td><?php var_dump($sqls[0]); ?></td>
		            <td><?php var_dump($sqls[1]); ?></td>

			<?php endforeach ?>
			<?php endforeach ?>
<?php
	break;
}
?>

	    </tbody>

	    </table>

