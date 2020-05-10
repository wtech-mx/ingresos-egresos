<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
    if (empty($_POST['egreso'])){
            $errors[] = "egreso está vacío.";
        }  elseif (
            !empty($_POST['egreso'])

        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $egreso = mysqli_real_escape_string($con,(strip_tags($_POST["egreso"],ENT_QUOTES)));
        $bien = mysqli_real_escape_string($con,(strip_tags($_POST["bien"],ENT_QUOTES)));
        $proveedor = mysqli_real_escape_string($con,(strip_tags($_POST["proveedor"],ENT_QUOTES)));
        $numfact = mysqli_real_escape_string($con,(strip_tags($_POST["numfact"],ENT_QUOTES)));
        $foto1 = mysqli_real_escape_string($con,(strip_tags($_POST["foto1"],ENT_QUOTES)));
        $foto2 = mysqli_real_escape_string($con,(strip_tags($_POST["foto2"],ENT_QUOTES)));

      	$id=intval($_POST['id']);
		// UPDATE data into database
	    $sql = "UPDATE fideicomisos_egresos SET egreso='".$egreso."', bien='".$bien."', proveedor='".$proveedor."', numfact='".$numfact."', foto1='".$foto1."', foto2='".$foto2."' WHERE id='".$id."' ";
	    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El egreso ha sido actualizado con éxito.";
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