<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado

		$target_dir="../../resources/images/gastosCorriente/";
		$image_name = time()."_".basename($_FILES["foto1"]["name"]);
		$target_file = $target_dir .$image_name ;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$imageFileZise=$_FILES["foto1"]["size"];

		move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file);
		$imagen=basename($_FILES["foto1"]["name"]);
		$img_update="view/resources/images/gastosCorriente/$image_name";

		$target_dir2="../../resources/images/gastosCorriente/";
		$image_name2 = time()."_".basename($_FILES["foto2"]["name"]);
		$target_file2 = $target_dir2 .$image_name2 ;
		$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
		$imageFileZise2=$_FILES["foto2"]["size"];

		/* Fin Validacion*/
		move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file2);
		$imagen2=basename($_FILES["foto2"]["name"]);
		$img_update2="view/resources/images/gastosCorriente/$image_name2";

	if (empty($_POST['personal'])) {
            $errors[] = "personal está vacío.";
        }  elseif (
        	!empty($_POST['personal'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $personal = mysqli_real_escape_string($con,(strip_tags($_POST["personal"],ENT_QUOTES)));
        $concepto = mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
        $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
        $observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["observaciones"],ENT_QUOTES)));


        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE gasto SET personal='".$personal."', concepto='".$concepto."', cantidad='".$cantidad."', observaciones='".$observaciones."', foto1='".$img_update."', foto2='".$img_update2."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El Gasto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }

	} else {
		$errors[] = "desconocido.";
	}

?>
<script type="text/javascript">
window.history.go(-1);
window.history.back();
</script>


<?php
if (isset($errors)){

			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong>
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){

				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>