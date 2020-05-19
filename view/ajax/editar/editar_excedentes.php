<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
    if (empty($_POST['partida'])){
            $errors[] = "Partida está vacío.";
        }  elseif (
            !empty($_POST['partida'])

        ){
		require_once ("../../../config/config.php");//conexipon de DB
			$partida = mysqli_real_escape_string($con,(strip_tags($_POST["partida"],ENT_QUOTES)));

	        $concepto = mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
	        $area = mysqli_real_escape_string($con,(strip_tags($_POST["area"],ENT_QUOTES)));
	        $monto = mysqli_real_escape_string($con,(strip_tags($_POST["monto"],ENT_QUOTES)));
			$fecha=date("Y-01-01");

			if ($_POST['porcentaje'] == 1 ) {
				 $porcentaje = mysqli_real_escape_string($con,(strip_tags($_POST["porcentaje"],ENT_QUOTES)));
		      	$id=intval($_POST['id']);
				// UPDATE data into database
			    $sql = "UPDATE excedentes_ingresos SET partida='".$partida."', porcentaje='".$porcentaje."', concepto='".$concepto."', area='".$area."', monto='".$monto."' WHERE id='".$id."' ";
			    $query = mysqli_query($con,$sql);

			}else{
				$porcentaje2 = mysqli_real_escape_string($con,(strip_tags($_POST["porcentaje"],ENT_QUOTES)));
		      	$id=intval($_POST['id']);
				// UPDATE data into database
			    $sql = "UPDATE excedentes_ingresos SET partida='".$partida."', porcentaje2='".$porcentaje2."', concepto='".$concepto."', area='".$area."', monto='".$monto."' WHERE id='".$id."' ";
			    $query = mysqli_query($con,$sql);
			}



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