<?php
     include("is_logged.php");//Archivo comprueba si el usuario esta logueado

	if (empty($_POST['estado'])) {
        }elseif (empty($_POST['id'])) {
        }elseif (
        	!empty($_POST['estado'])
        	&& !empty($_POST['id'])
        ){
			require_once ("../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

	        $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
        	// var_dump($_POST['estado']);

        	$id = $_POST['id'];;
   //      	var_dump($id);

			// $sql="SELECT id from excedentes_ingresos  where id='".$id."'";
			// var_dump($sql);
			//Write register in to database
			// $sql = "INSERT INTO excedentes_ingresos (estado) VALUES( '".$estado."')" ;
			$sql = "UPDATE excedentes_ingresos SET estado=$estado WHERE id=$id ";
				var_dump($sql);

			var_dump($sql);
			$query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "Los Datos an sido agregado con éxito.";
            } else {
                $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
            }
		}else {
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