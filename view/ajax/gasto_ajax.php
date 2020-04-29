<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../config/config.php");
	if (isset($_REQUEST["id"])){//codigo para eliminar
	$id=$_REQUEST["id"];
	$id=intval($id);

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


}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$tables="gasto";
	$campos="*";
	$sWhere=" fecha_carga LIKE '%".$query."%' and personal=' '";
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
    <table class="table table-bordered table-striped">

   <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>#ID</th>
                <th>Personal/Gasto</th>
                <th>Concepto</th>
                <th>Cantidad</th>
                <th>Observaciones</th>
                <th>Fecha Carga</th>
                <th></th>
            </tr>
        </thead>
        <?php
			$finales=0;
			while($row = mysqli_fetch_array($query)){
				$id=$row['id'];
				$gasto_code=$row['gasto_code'];
				$personal=$row['personal'];
				$concepto=$row['concepto'];
				$cantidad=$row['cantidad'];
				$observaciones=$row['observaciones'];
				$fecha_carga=$row['fecha_carga'];

				list($date,$hora)=explode(" ",$fecha_carga);
				list($Y,$m,$d)=explode("-",$date);
				$fecha_cargas=$d."-".$m."-".$Y;

				$finales++;
		?>
        <tbody>
            <tr>
                <td><?php echo $gasto_code ?></td>
                <td><?php echo $personal ?></td>
                <td><?php echo $concepto ?></td>
                <td><?php echo $cantidad ?></td>
                <td><?php echo $observaciones ?></td>
                <td><?php echo $fecha_cargas ?></td>
                <td class="text-right">


                    <button type="button" class="btn btn-warning btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $id;?>');"><i class="fa fa-edit"></i></button>

                    <button type="button" class="btn btn-danger btn-square btn-xs" onclick="eliminar('<?php echo $id;?>')"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>

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
<?php
	}else{
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.</div>';
	}

}

?>

<!--<div class="accordion" id="accordionExample">
  <div class="card">
    <a class="btn btn-link"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <div class="card-header bg-primary" id="headingOne">
      <h2 class="mb-0 text-white">
          Collapsible Group Item #1
      </h2>
    </div>
    </a>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

			<form action="" method="get" accept-charset="utf-8">
				  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="Fecha">Fecha</label>
					      <input class="form-control" type="date" value="" id="Fecha">
					    </div>

					    <div class="form-group col-md-4">
					      <label for="Personal">Personal</label>
					      <input type="text" class="form-control" id="Personal">
					    </div>

					    <div class="form-group col-md-4">
					      <label for="Gasto">Gasto/Concepto</label>
					      <input type="text" class="form-control" id="Gasto">
					    </div>

				  </div>

				  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="Cantidad">Cantidad</label>
				 		  <input type="text" class="form-control" id="Cantidad">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="Observacion">Observacion</label>
					      <input type="text" class="form-control" id="Observacion">
					    </div>
				  </div>

				  <div class="form-row">
					    <div class="form-group col-md-3">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen1">
							  <label class="custom-file-label" for="Imagen1">Imagen1</label>
							</div>
					    </div>
					    <div class="form-group col-md-2">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen2">
							  <label class="custom-file-label" for="Imagen2">Imagen2</label>
							</div>
					    </div>
					    <div class="form-group col-md-2">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen3">
							  <label class="custom-file-label" for="Imagen3">Imagen3</label>
							</div>
					    </div>
					    <div class="form-group col-md-2">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen4">
							  <label class="custom-file-label" for="Imagen4">Imagen4</label>
							</div>
					    </div>
					    <div class="form-group col-md-3">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen5">
							  <label class="custom-file-label" for="Imagen5">Imagen5</label>
							</div>
					    </div>
					    <button id="adicionar" class="btn btn-success" type="button">Adicionar a la tabla</button>
				  </div>
			</form>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<p>Elementos en la Tabla:
			  <div id="adicionados"></div>
			</p>
			<h2 class="text-center p-5">Tala de  2020 </h2>

			<table class="table" id="mytable">
				  <thead class="thead-default">
				    <tr>
				      <th>Fecha</th>
				      <th>Fecha</th>
				      <th>Gasto</th>
				      <th>Cantidad</th>
				      <th>Observacion</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				    </tr>
				    <tr>
				    </tr>
				    <tr>
				    </tr>
				    <tr>
				    </tr>
				  </tbody>
			</table>

	  </div>

		<script type="text/javascript">
				$(document).ready(function() {
				$('#adicionar').click(function() {
				  var Fecha = document.getElementById("Fecha").value;
				  var Personal = document.getElementById("Personal").value;
				  var Gasto = document.getElementById("Gasto").value;Observacion
				  var Cantidad = document.getElementById("Cantidad").value;
				  var Observacion = document.getElementById("Observacion").value;
				  var i = 1; //contador para asignar id al boton que borrara la fila
				  var fila = '<tr id="row' + i + '"><td>' + Fecha + '</td><td>' + Personal + '</td><td>' + Gasto + '</td><td>' + Cantidad +'</td><td>' + Observacion +'</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

				  i++;

				  $('#mytable tr:first').after(fila);
				    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
				    var nFilas = $("#mytable tr").length;
				    $("#adicionados").append(nFilas - 1);
				    //le resto 1 para no contar la fila del header
				    document.getElementById("Fecha").value = "";
				    document.getElementById("Personal").value ="";
				    document.getElementById("Gasto").value = "";
				    document.getElementById("Cantidad").focus();
				    document.getElementById("Observacion").focus();
				  });
				$(document).on('click', '.btn_remove', function() {
				  var button_id = $(this).attr("id");
				    //cuando da click obtenemos el id del boton
				    $('#row' + button_id + '').remove(); //borra la fila
				    //limpia el para que vuelva a contar las filas de la tabla
				    $("#adicionados").text("");
				    var nFilas = $("#mytable tr").length;
				    $("#adicionados").append(nFilas - 1);
				  });
				});
		</script>

     </div>
    </div>
</div>-->

