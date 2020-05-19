<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['gasto_code'])) {
            $errors[] = "gasto_code está vacío.";
        }elseif (empty($_POST['mes_id'])) {
            $errors[] = "mes_id está vacío.";
        }elseif (empty($_POST['partida'])) {
            $errors[] = "partida está vacío.";
        }elseif (empty($_POST['concepto'])) {
            $errors[] = "concepto está vacío.";
        }elseif (empty($_POST['area'])) {
            $errors[] = "area está vacío.";
        }elseif (empty($_POST['monto'])) {
            $errors[] = "monto está vacío.";
        }elseif (empty($_POST['servicios'])) {
            $errors[] = "servicios está vacío.";
        }elseif (
        	!empty($_POST['gasto_code'])
        	&& !empty($_POST['mes_id'])
        	&& !empty($_POST['partida'])
        	&& !empty($_POST['concepto'])
        	&& !empty($_POST['area'])
        	&& !empty($_POST['monto'])
        	&& !empty($_POST['servicios'])
        	&& !empty($_POST['porcentaje'])
        ){

		require_once ("../../../config/config.php");//conexipon de DB



	        $gasto_code = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_code"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));
	        $partida = mysqli_real_escape_string($con,(strip_tags($_POST["partida"],ENT_QUOTES)));
	        $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
	        $concepto = mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
	        $area = mysqli_real_escape_string($con,(strip_tags($_POST["area"],ENT_QUOTES)));
	        $monto = mysqli_real_escape_string($con,(strip_tags($_POST["monto"],ENT_QUOTES)));
			$fecha=date("Y-01-01");
			$servicios = mysqli_real_escape_string($con,(strip_tags($_POST["servicios"],ENT_QUOTES)));

			if ($_POST['porcentaje'] == 1 ) {
				 $porcentaje = mysqli_real_escape_string($con,(strip_tags($_POST["porcentaje"],ENT_QUOTES)));
			$id = $_POST["gasto_code"];
			$sql="SELECT id from nombre_excedentes LIMIT 1 where id='".$id."'";
			//Write register in to database
			$sql = "INSERT INTO excedentes_ingresos (gasto_code, mes_id, partida, porcentaje, concepto, area, monto, fecha, estado, servicios) VALUES( '".$id."', '".$mes_id."', '".$partida."', '".$porcentaje."', '".$concepto."', '".$area."', '".$monto."', '".$fecha."', '".$estado."', '".$servicios."')";

			}else{
			$porcentaje2 = mysqli_real_escape_string($con,(strip_tags($_POST["porcentaje"],ENT_QUOTES)));
			$id = $_POST["gasto_code"];
			$sql="SELECT id from nombre_excedentes LIMIT 1 where id='".$id."'";
			//Write register in to database
			$sql = "INSERT INTO excedentes_ingresos (gasto_code, mes_id, partida, porcentaje2, concepto, area, monto, fecha, servicios) VALUES( '".$id."', '".$mes_id."', '".$partida."', '".$porcentaje2."', '".$concepto."', '".$area."', '".$monto."', '".$fecha."', '".$servicios."')";
			}



			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                // $messages[] = "Los Datos de gasto ha sido agregado con éxito.";

				//save_log('Categorías','Registro de categoría',$_SESSION['user_id']);
            } else {
                $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
            }
		}
		else {
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