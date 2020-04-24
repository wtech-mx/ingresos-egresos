<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['id'])){
		$errors[] = "ID del gasto está vacío";
	} else if (empty($_POST['gasto_code'])){
		$errors[] = "Código del gasto está vacío";
	}elseif (
		!empty($_POST['id'])
		&& !empty($_POST['gasto_code'])
		) {

		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id=intval($_POST['id']);
        $gasto_code = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_code"],ENT_QUOTES)));
		$personal = mysqli_real_escape_string($con,(strip_tags($_POST["personal"],ENT_QUOTES)));
		$concepto= mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
		$cantidad= mysqli_real_escape_string($con,$_POST["cantidad"]);
		$observaciones= mysqli_real_escape_string($con,(strip_tags($_POST["observaciones"],ENT_QUOTES)));

		// update data
        $sql = "UPDATE gasto SET gasto_code='".$gasto_code."', personal='".$personal."', concepto='".$concepto."', cantidad='".$cantidad."', observaciones='".$observaciones."' WHERE id='$id' ";
        $query = mysqli_query($con,$sql);

        // if user has been update successfully
        if ($query) {
            $messages[] = "Los datos han sido procesados exitosamente.";
			//print ("<script>window.location='./?view=choques';</script>");
        } else {
            $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo. ".mysqli_error($con);
        }


	} else {
		$errors[] = " Desconocido";
	}
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