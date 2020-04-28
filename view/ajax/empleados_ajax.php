<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar
	$id=$_REQUEST["id"];
	$id=intval($id);
	if($delete=mysqli_query($con, "DELETE FROM empleado WHERE id='$id'")){
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
	$tables="empleado";
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
	$reload = './empleados-view.php';
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
		<div class="table-responsive">
		    <table class="table table-bordered mb-0">
		        <thead class="bg-dark text-white">
		            <tr>
		                <th>#ID</th>
		                <th>Nombre</th>
		                <th>Usuario</th>
		                <th>Correo Electrónico</th>
		                <th>Telefóno</th>
		                <th>Estado</th>
		                <th>Fecha</th>
		                <th></th>
		            </tr>
		        </thead>
		        <?php
					$finales=0;
					while($row = mysqli_fetch_array($query)){
						$id=$row['id'];
						$nombre=$row['nombre'];
						$apellido=$row['apellido'];
						$username=$row['username'];
						$email=$row['email'];
						$domicilio=$row['domicilio'];
						$localidad=$row['localidad'];
						$telefono=$row['telefono'];
						$celular=$row['celular'];
						$registro=$row['registro'];
						$status=$row['status'];
						$created_at=$row['created_at'];

						list($date,$hora)=explode(" ",$created_at);
						list($Y,$m,$d)=explode("-",$date);
						$fecha=$d."-".$m."-".$Y;


						if ($status==1){
							$lbl_status="Activo";
							$lbl_class='label label-success';
						}else {
							$lbl_status="Inactivo";
							$lbl_class='label label-danger';
						}
						/*$kind=$row['kind'];*/

						$finales++;
				?>
		        <tbody>
		            <tr>
		                <td><?php echo $id ?></td>
		                <td><?php echo $nombre." ".$apellido ?></td>
		                <td><?php echo $username ?></td>
		                <td><?php echo $email ?></td>
		                <td><?php echo $telefono ?></td>
		                <td><span class="<?php echo $lbl_class;?>"><?php echo $lbl_status;?></span></td>
		                <td><?php echo $fecha ?></td>
		                <td class="text-right">

		                    <button type="button" class="btn btn-warning btn-circle  btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $id;?>');">
		                    	<i class="fa fa-edit"></i>
		                    </button>

		                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $id;?>')"><i class="fa fas fa-trash"></i>
		                    </button>

		                    <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $id;?>')">
		                    	<i class="fa fa-eye"></i>
		                    </button>

		                </td>
		            </tr>

					<div id="accordion">
					  <div class="card">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					        <?php echo $nombre." ".$apellido ?>
					        </button>
					      </h5>
					    </div>

					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					      <div class="card-body">
					        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					      </div>
					    </div>
					  </div>

					</div>

		        </tbody>
		        <?php }?>
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