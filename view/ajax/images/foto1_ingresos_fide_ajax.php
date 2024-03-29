<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	/* Connect To Database*/
	require_once ("../../../config/config.php");

	$id=intval($_REQUEST['id']);
	$target_dir="../../resources/images/fideicomiso/ingresos/";
	$image_name = time()."_".basename($_FILES["imagefile1"]["name"]);
	$target_file = $target_dir .$image_name ;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$imageFileZise=$_FILES["imagefile1"]["size"];

	/* Inicio Validacion*/
	// Allow certain file formats
	if(($imageFileType != "pdf") and $imageFileZise>0) {
	$errors[]= "<p>Lo sentimos, sólo se permiten archivos PDF.</p>";
	} else if ($imageFileZise > 1048576) {//1048576 byte=1MB
	$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 1MB</p>";
	} else if (empty($id)){
		$errors[]= "<p>ID del ingresos fideicomisos está vacío.</p>";
	} else{
		/* Fin Validacion*/
		if ($imageFileZise>0){
		move_uploaded_file($_FILES["imagefile1"]["tmp_name"], $target_file);
		$imagen=basename($_FILES["imagefile1"]["name"]);
		$img_update="foto1='view/resources/images/fideicomiso/ingresos/$image_name' ";

		}else { $img_update="";}
		    $sql = "UPDATE fideicomiso_ingresos SET $img_update WHERE id='$id';";
		    $query_new_insert = mysqli_query($con,$sql);

    if ($query_new_insert) {
?>
		<img class="img-responsive" src="view/resources/images/fideicomiso/ingresos/<?php echo $image_name;?>" alt="PDF ing 1" data-toggle="modal" data-target="#myModal" style='cursor:pointer'>
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
				<div class="modal-content">
			 		<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">&nbsp;</h4>
			  		</div>
					<div class="modal-body">
						<img src="view/resources/images/fideicomiso/ingresos/<?php echo $image_name;?>" class="img-responsive">
					</div>
				</div>
		  	</div>
		</div>

	<?php
	    } else {
	        $errors[] = "Lo sentimos, actualización falló. Intente nuevamente. ".mysqli_error($con);
	    }
	}
	?>
<?php
	if (isset($errors)){
?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error! </strong>
		<?php
		foreach ($errors as $error){
				echo $error;
			}
		?>
	</div>
<?php
	}
?>
<?php
	if (isset($messages)){
?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Aviso! </strong>
		<?php
		foreach ($messages as $message){
				echo $message;
			}
		?>
	</div>
<?php
	}
?>
