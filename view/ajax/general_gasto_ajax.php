<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar
	$id=$_REQUEST["id"];
	$id=intval($id);

	$query_validate=mysqli_query($con,"SELECT * FROM nombre_gasto WHERE id='".$id."'");
	$count=mysqli_num_rows($query_validate);
	if ($count==0){
		if($delete=mysqli_query($con, "DELETE FROM gasto WHERE id='$id'")){
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
	}else{
			$aviso="Aviso!";
			$msj="Error al eliminar los datos. La empresa se encuentra vinculada con un sector";
			$classM="alert alert-danger";
			$times="&times;";
		}

}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="nombre_gasto";
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
	$reload = '../gasto-view.php';
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
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
        <?php
			$finales=0;
			while($row = mysqli_fetch_array($query)){
				$id=$row['id'];
				$nombre=$row['nombre'];
				$id_mes_nomg=$row['id_mes_nomg'];
				$finales++;
		?>

		<table class="table table-bordered table-striped" id="mytable">
	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	            	<th>Mes</th>
	            	<th>Nombre</th>
	                <th>Cantidad</th>
					<th>Total Cantidad</th>
	            </tr>
	         </thead>
			<?php

			$result = mysqli_query($con,"SELECT SUM(cantidad) as cantidad_sum FROM gasto");
			while ($total = $result->fetch_object()){



      		$rspta = mysqli_query($con, "SELECT * FROM gasto  ORDER BY  id ASC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_gasto WHERE gasto=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($gasto = $rspta->fetch_object()){
                $sw=in_array($gasto->id,$valores);
	            if ($id == $gasto->gasto_code) {
                 ?>
	        <tbody>
	            <tr>
	            <td><?php echo $id_mes_nomg ?></td>
	            <td><?php echo $nombre ?></td>
				<td><?php echo $gasto->cantidad ?></td>
	            <td><?php echo $total->cantidad_sum; ?></td>
	        </tbody>
				<?php
					     }else{

					     }
			            }

			        ?>
	    </table>
        <?php }
			}
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}
}
?>

