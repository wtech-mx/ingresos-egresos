<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['monto'])) {
            $errors[] = "monto está vacío.";
        }  elseif (
        	!empty($_POST['monto'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $monto = mysqli_real_escape_string($con,(strip_tags($_POST["monto"],ENT_QUOTES)));
        $partida = mysqli_real_escape_string($con,(strip_tags($_POST["partida"],ENT_QUOTES)));
        $utilizado = mysqli_real_escape_string($con,(strip_tags($_POST["utilizado"],ENT_QUOTES)));
        $utilizar = mysqli_real_escape_string($con,(strip_tags($_POST["utilizar"],ENT_QUOTES)));
        $utilizar2 = mysqli_real_escape_string($con,(strip_tags($_POST["utilizar2"],ENT_QUOTES)));
        $utilizar3 = mysqli_real_escape_string($con,(strip_tags($_POST["utilizar3"],ENT_QUOTES)));
        $mes = mysqli_real_escape_string($con,(strip_tags($_POST["mes"],ENT_QUOTES)));

        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE presupuesto SET monto='".$monto."', partida='".$partida."', utilizado='".$utilizado."', utilizar='".$utilizar."' , utilizar2='".$utilizar2."' , utilizar3='".$utilizar3."', mes='".$mes."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El presupuesto ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }

	} else {
		$errors[] = "desconocido.";
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