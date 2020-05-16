<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['gasto_code'])) {
            $errors[] = "gasto_code está vacío.";
        }elseif (empty($_POST['mes_id'])) {
            $errors[] = "mes_id está vacío.";
        }elseif (empty($_POST['personal'])) {
            $errors[] = "personal está vacío.";
        }elseif (empty($_POST['concepto'])) {
            $errors[] = "concepto está vacío.";
        }elseif (empty($_POST['cantidad'])) {
            $errors[] = "cantidad está vacío.";
        }elseif (empty($_POST['observaciones'])) {
            $errors[] = "observaciones está vacío.";
        }elseif (empty($_POST['fecha_carga'])) {
            $errors[] = "fecha_carga está vacío.";
        }elseif (
        	!empty($_POST['gasto_code'])
        	&& !empty($_POST['mes_id'])
        	&& !empty($_POST['personal'])
        	&& !empty($_POST['concepto'])
        	&& !empty($_POST['cantidad'])
        	&& !empty($_POST['observaciones'])
        	&& !empty($_POST['foto1'])
        	&& !empty($_POST['foto2'])
        	&& !empty($_POST['fecha_carga'])
        ){
		require_once ("../../../config/config.php");//conexipon de DB
		$fecha_carga = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_carga"],ENT_QUOTES)));
	        $gasto_code = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_code"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));
	        $personal = mysqli_real_escape_string($con,(strip_tags($_POST["personal"],ENT_QUOTES)));
	        $concepto = mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
	        $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));
	        $observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["observaciones"],ENT_QUOTES)));
	        $foto1 = mysqli_real_escape_string($con,(strip_tags($_POST["foto1"],ENT_QUOTES)));
	        $foto2 = mysqli_real_escape_string($con,(strip_tags($_POST["foto2"],ENT_QUOTES)));
			$fecha=date("Y-01-01");

			$id = $_POST["gasto_code"];
			$sql="SELECT id from nombre_gasto LIMIT 1 where id='".$id."'";
			$target_dir="view/resources/images/gastosCorriente/gastoCorriente.jpg";
			//Write register in to database
			$sql = "INSERT INTO gasto (gasto_code, mes_id, personal, concepto, cantidad, observaciones, foto1, foto2, fecha_carga, fecha) VALUES( '".$id."', '".$mes_id."', '".$personal."', '".$concepto."', '".$cantidad."', '".$observaciones."', '".$foto1."', '".$foto2."', '".$target_dir."', '".$fecha_carga."', '".$fecha."')";// cOMANDO DE sQL PARA INSERTAR LSO DATOS A LA tABLA DE dB
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                // $messages[] = "Los Datos de gasto ha sido agregado con éxito.";

				//save_log('Categorías','Registro de categoría',$_SESSION['user_id']);
            } else {
                $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
                header("Location: http://localhost/ingresos-egresos/?view=gasto");
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