<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['personal'])) {
            $errors[] = "personal está vacío.";
        }elseif (empty($_POST['concepto'])) {
            $errors[] = "concepto está vacío.";
        }elseif (empty($_POST['cantidad'])) {
            $errors[] = "cantidad está vacío.";
        }elseif (empty($_POST['observaciones'])) {
            $errors[] = "observaciones está vacío.";
        }elseif (
        	!empty($_POST['personal'])
        	&& !empty($_POST['concepto'])
        	&& !empty($_POST['cantidad'])
        	&& !empty($_POST['observaciones'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

			// escaping, additionally removing everything that could be (html/javascript-) code

	        $personal = mysqli_real_escape_string($con,(strip_tags($_POST["personal"],ENT_QUOTES)));
	        $concepto = mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
	        $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
	        $observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["observaciones"],ENT_QUOTES)));


			$fecha_carga=date("Y-m-d H:i:s");

			//Write register in to database
			$sql = "INSERT INTO gasto (personal, concepto, cantidad, observaciones) VALUES( '', '', '', '');";
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Los Datos de gasto ha sido agregado con éxito.";
				//save_log('Categorías','Registro de categoría',$_SESSION['user_id']);
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