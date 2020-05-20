<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado

		$target_dir="../../resources/images/gastosCorriente/";
		$image_name = time()."_".basename($_FILES["foto1"]["name"]);
		$target_file = $target_dir .$image_name ;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$imageFileZise=$_FILES["foto1"]["size"];

		move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file);
		$imagen=basename($_FILES["foto1"]["name"]);
		$img_update="view/resources/images/gastosCorriente/$image_name";

		$target_dir2="../../resources/images/gastosCorriente/";
		$image_name2 = time()."_".basename($_FILES["foto2"]["name"]);
		$target_file2 = $target_dir2 .$image_name2 ;
		$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
		$imageFileZise2=$_FILES["foto2"]["size"];

		/* Fin Validacion*/
		move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file2);
		$imagen2=basename($_FILES["foto2"]["name"]);
		$img_update2="view/resources/images/gastosCorriente/$image_name2";

	if (empty($_POST['gasto_fide'])) {
            $errors[] = "gasto fide está vacío.";
        }elseif (empty($_POST['mes_id'])) {
            $errors[] = "mes_id está vacío.";
        }elseif (empty($_POST['servicio'])) {
            $errors[] = "Servicio está vacío.";
        }elseif (
        	!empty($_POST['gasto_fide'])
        	&& !empty($_POST['mes_id'])
        	&& !empty($_POST['servicio'])
        ){
		require_once ("../../../config/config.php");//conexipon de DB
	        $gasto_fide = mysqli_real_escape_string($con,(strip_tags($_POST["gasto_fide"],ENT_QUOTES)));
	        $mes_id = mysqli_real_escape_string($con,(strip_tags($_POST["mes_id"],ENT_QUOTES)));
	        $servicio = mysqli_real_escape_string($con,(strip_tags($_POST["servicio"],ENT_QUOTES)));
	        $ingresos = mysqli_real_escape_string($con,(strip_tags($_POST["ingresos"],ENT_QUOTES)));
	        $pagodoc = mysqli_real_escape_string($con,(strip_tags($_POST["pagodoc"],ENT_QUOTES)));
	        $total = mysqli_real_escape_string($con,(strip_tags($_POST["total"],ENT_QUOTES)));
	        $fecha_carga=date("Y-m-d");
	        $fecha=date("Y-01-01");

			$id = $_POST["gasto_fide"];
			$sql="SELECT id from nombre_fideicomisos LIMIT 1 where id='".$id."'";
			//Write register in to database
			$sql = "INSERT INTO fideicomiso_ingresos (gasto_fide, mes_id, servicio, ingresos, total, pagodoc, foto1, foto2, fecha_carga) VALUES( '".$id."', '".$mes_id."',  '".$servicio."','".$ingresos."','".$total."','".$pagodoc."', '".$fecha_carga."', '".$img_update."', '".$img_update2."')";// COMANDO DE SQL PARA
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