<?php
	include("is_logged.php");//Archivo comprueba si el usuario esta logueado
	require_once ("../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

	if(isset($_POST['id'])){
		var_dump($_POST['id']);

	}elseif (isset($_POST['estado'])) {
		var_dump($_POST['estado']);
	}
?>
