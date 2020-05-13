<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
    if (empty($_POST['egresos'])){
            $errors[] = "egresos está vacío.";
        }  elseif (
            !empty($_POST['egresos'])

        ){
		require_once ("../../../config/config.php");//conexipon de DB
			$gasto_code = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_code"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));
	        $egreso = mysqli_real_escape_string($con,(strip_tags($_POST["egreso"],ENT_QUOTES)));
	        $bien = mysqli_real_escape_string($con,(strip_tags($_POST["bien"],ENT_QUOTES)));
	        $proveedor = mysqli_real_escape_string($con,(strip_tags($_POST["proveedor"],ENT_QUOTES)));
	        $numfact = mysqli_real_escape_string($con,(strip_tags($_POST["numfact"],ENT_QUOTES)));
	        $fecha_carga = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_carga"],ENT_QUOTES)));
			$fecha=date("Y-01-01");

      	$id=intval($_POST['id']);
		// UPDATE data into database
	    $sql = "UPDATE excedentes_egresos SET egresos='".$egresos."', bien='".$bien."', proveedor='".$proveedor."', numfact='".$numfact."', fecha_carga='".$fecha_carga."' WHERE id='".$id."' ";
	    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "El excedentes ha sido actualizado con éxito.";
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