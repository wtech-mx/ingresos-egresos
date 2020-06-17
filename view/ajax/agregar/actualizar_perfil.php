<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['nombre'])) {
            $errors[] = "Nombre está vacío.";
        }  elseif (empty($_POST['apellido'])) {
            $errors[] = "Apellido está vacío.";
        } elseif (
        	!empty($_POST['nombre'])
        	&& !empty($_POST['apellido'])
			/*&& !empty($_POST['password'])*/
			// && !empty($_POST['estado'])
			/*&& !empty($_POST['kind'])*/
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

	// escaping, additionally removing everything that could be (html/javascript-) code
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
    $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));

    $password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));
    $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $celular = mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));
    // $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
	$id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE empleado SET nombre='".$nombre."', apellido='".$apellido."', email='".$email."', telefono='".$telefono."', celular='".$celular."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    //Verifico que el campo de la contraseña no este vacia by Amner Saucedo Sosa
    if(!empty(($password))){
    	$sql_password = "UPDATE empleado SET password='".$password."' WHERE id='".$id."' ";
    	$query_password = mysqli_query($con,$sql_password);
    }

    if ($query) {
        $messages[] = "El empleado ha sido actualizado con éxito.";
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