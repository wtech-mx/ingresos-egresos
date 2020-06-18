<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");

		?>
		<table class="table table-bordered table-striped" id="mytable">
	        <thead>
	            <tr>
<!-- 	            	<th>Mes</th> -->
					<th>Año</th>
	            	<th>Nombre</th>
	                <th>Ingresos Reales</th>
	                <th>Ingreso Utilizado</th>
	                <th>Ingreso Disponible</th>

<!-- 					<th>Total Cantidad</th> -->
	            </tr>
	         </thead>
			<?php
		$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
		if($action == 'ajax'){
		$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
		$tables="nombre_fideicomisos";
		$campos="*";
		$sWhere=" nombre LIKE '%".$query."%'";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = intval($_REQUEST['per_page']); //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		else {echo mysqli_error($con);}
		$total_pages = ceil($numrows/$per_page);
		$reload = '../general_fideicomiso-view.php';
		//main query to fetch the data
		$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
		//loop through fetched data
		while($row = mysqli_fetch_array($query)){
			$id=$row['id'];
			$nombre=$row['nombre'];
			$id_mes_nomfide=$row['id_mes_nomfide'];

      		$rspta = mysqli_query($con, "SELECT * FROM fideicomiso_ingresos  ORDER BY  id ASC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_fideicomisos WHERE fideicomiso_ingresos=$id ");
            $valores=array();

            while ($gasto = $rspta->fetch_object()){
                $sw=in_array($gasto->id,$valores);
	            if ($id == $gasto->gasto_fide) {

	            $result = mysqli_query($con,"SELECT fecha, SUM(total) as total_sum FROM fideicomiso_ingresos group by fecha ");
	            while ($total = $result->fetch_object()){

	            $result = mysqli_query($con,"SELECT fecha, SUM(egreso) as egreso_sum FROM fideicomisos_egresos group by fecha ");
	            while ($egreso = $result->fetch_object()){
                 ?>

	        <tbody>
	            <tr>
	            	<td><?php echo $total->fecha; ?></td>
		            <td><?php echo $nombre ?></td>
					<td>$<?php echo round($total->total_sum, 2, PHP_ROUND_HALF_UP); ?></td>
					<td>$<?php echo $egreso->egreso_sum; ?></td>
	               		<?php  $interesDisp= $total->total_sum - $egreso->egreso_sum; ?>
					<td>$<?php echo round($interesDisp, 2, PHP_ROUND_HALF_UP); ?></td>

				</tr>
	        </tbody>

				<?php
				 }
				}
		       }break;
              }
		}
	}
 ?>

	    </table>

