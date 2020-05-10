<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['gasto_fide_egresos'])) {
            $errors[] = "gasto_fide_egresos está vacío.";
        }elseif (empty($_POST['mes_id'])) {
            $errors[] = "mes_id está vacío.";
        }elseif (empty($_POST['egreso'])) {
            $errors[] = "egreso está vacío.";
        }elseif (empty($_POST['bien'])) {
            $errors[] = "bien está vacío.";
        }elseif (empty($_POST['proveedor'])) {
            $errors[] = "proveedor está vacío.";
        }elseif (empty($_POST['numfact'])) {
            $errors[] = "numfact está vacío.";
        }elseif (empty($_POST['fecha_carga'])) {
            $errors[] = "fecha_carga está vacío.";
        }elseif (
        	!empty($_POST['gasto_fide_egresos'])
        	&& !empty($_POST['mes_id'])
        	&& !empty($_POST['egreso'])
        	&& !empty($_POST['bien'])
        	&& !empty($_POST['proveedor'])
        	&& !empty($_POST['numfact'])
        	&& !empty($_POST['fecha_carga'])
        ){
		require_once ("../../../config/config.php");//conexipon de DB
	        $gasto_fide_egresos = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_fide_egresos"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));
	        $egreso = mysqli_real_escape_string($con,(strip_tags($_POST["egreso"],ENT_QUOTES)));
	        $bien = mysqli_real_escape_string($con,(strip_tags($_POST["bien"],ENT_QUOTES)));
	        $proveedor = mysqli_real_escape_string($con,(strip_tags($_POST["proveedor"],ENT_QUOTES)));
	        $numfact = mysqli_real_escape_string($con,(strip_tags($_POST["numfact"],ENT_QUOTES)));
			$fecha_carga=date("Y-m-d H:i:s");

			$id = $_POST["gasto_fide_egresos"];
			$sql="SELECT id from nombre_fideicomisos LIMIT 1 where id='".$id."'";
			$target_dir="view/resources/images/gastosCorriente/gastoCorriente.jpg";
			//Write register in to database
			$sql = "INSERT INTO fideicomisos_egresos (gasto_fide_egresos, mes_id, egreso, bien, proveedor, numfact, fecha_carga) VALUES( '".$id."', '".$mes_id."','".$egreso."', '".$bien."', '".$proveedor."', '".$numfact."', '".$fecha_carga."')";// cOMANDO DE sQL PARA
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