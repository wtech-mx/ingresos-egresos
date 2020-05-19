<?php

	include("is_logged.php");//Archivo comprueba si el usuario esta logueado

	if(isset($_POST['id']))
	{


	var_dump($_POST['id']);
	require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
}
?>
