<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['nombre'])){
			$errors[] = "Nombre está vacío.";
		}elseif (empty($_POST['id_mes_exc'])) {
            $errors[] = "id_mes_exc está vacío.";
        }elseif (empty($_POST['id_ingresos'])) {
            $errors[] = "id_ingresos está vacío.";
        }  elseif (
        	!empty($_POST['nombre'])
        	&& !empty($_POST['id_mes_exc'])
        	&& !empty($_POST['id_ingresos'])

        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

			// escaping, additionally removing everything that could be (html/javascript-) code
            $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
            $id_mes_exc = mysqli_real_escape_string($con,(strip_tags($_POST["id_mes_exc"],ENT_QUOTES)));
            $id_ingresos = mysqli_real_escape_string($con,(strip_tags($_POST["id_ingresos"],ENT_QUOTES)));

			//Write register in to id_mes_exc
			$sql = "INSERT INTO nombre_excedentes (nombre, id_mes_exc, id_ingresos)  VALUES( '".$nombre."', '".$id_mes_exc."', '".$id_ingresos."')";
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "El excedente ha sido agregado con éxito.";
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