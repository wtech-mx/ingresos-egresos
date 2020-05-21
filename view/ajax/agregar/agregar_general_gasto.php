<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['general_id'])) {
            $errors[] = "general_id está vacío.";
        }elseif (empty($_POST['mes_id'])) {
            $errors[] = "mes_id está vacío.";
        }elseif (empty($_POST['captados'])) {
            $errors[] = "captados está vacío.";
        }elseif (empty($_POST['regresados'])) {
            $errors[] = "regresados está vacío.";
        }elseif (empty($_POST['utilizado'])) {
            $errors[] = "utilizado está vacío.";
        }elseif (empty($_POST['disponible'])) {
            $errors[] = "disponible está vacío.";
        }elseif (empty($_POST['fecha_carga'])) {
            $errors[] = "fecha_carga está vacío.";
        }elseif (
        	!empty($_POST['general_id'])
        	&& !empty($_POST['mes_id'])
        	&& !empty($_POST['captados'])
        	&& !empty($_POST['regresados'])
        	&& !empty($_POST['utilizado'])
        	&& !empty($_POST['disponible'])
        	&& !empty($_POST['fecha_carga'])
        ){
		require_once ("../../../config/config.php");//conexipon de DB
	        $general_id = mysqli_real_escape_string($con,(strip_tags($_POST["general_id"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));
	        $captados = mysqli_real_escape_string($con,(strip_tags($_POST["captados"],ENT_QUOTES)));
	        $regresados = mysqli_real_escape_string($con,(strip_tags($_POST["regresados"],ENT_QUOTES)));
	        $utilizado = mysqli_real_escape_string($con,(strip_tags($_POST["utilizado"],ENT_QUOTES)));
	        $disponible = mysqli_real_escape_string($con,(strip_tags($_POST["disponible"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d");

			$id = $_POST["general_id"];
			$sql="SELECT id from nombre_gasto LIMIT 1 where id='".$id."'";
			$target_dir="view/resources/images/gastosCorriente/gastoCorriente.jpg";
			//Write register in to database
		$sql = "INSERT INTO general_gasto (general_id, mes_id, captados, regresados,  utilizado, disponible, fecha_carga) VALUES( '".$id."', '".$mes_id."', '".$captados."','".$regresados."', '".$utilizado."', '".$disponible."', '".$fecha_carga."')";// COMANDO DE sQL PARA
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Los Datos de gasto ha sido agregado con éxito.";

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