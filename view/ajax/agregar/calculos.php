<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['gasto_fide'])) {
            $errors[] = "gasto fide está vacío.";
        }elseif (empty($_POST['mes_id'])) {
            $errors[] = "mes_id está vacío.";
        }elseif (
        	!empty($_POST['gasto_fide'])
        	&& !empty($_POST['mes_id'])
        ){
		require_once ("../../../config/config.php");//conexipon de DB
	        $gasto_fide = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_fide"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));



			$id = $_POST["gasto_fide"];
			$sql ="SELECT id from nombre_fideicomisos LIMIT 1 where id='".$id."'";
			//Write register in to database
			$sql = "INSERT INTO fideicomiso_ingresos (gasto_fide, mes_id) VALUES( '".$id."', '".$mes_id."')";// COMANDO DE SQL PARA
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                // $messages[] = "Los Datos de gasto ha sido agregado con éxito.";

				//save_log('Categorías','Registro de categoría',$_SESSION['user_id']);
            } else {
                $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
            }
		}else {
			$errors[] = "desconocido.";
			echo $sql;
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