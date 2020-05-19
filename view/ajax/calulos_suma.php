<?php

	include("is_logged.php");//Archivo comprueba si el usuario esta logueado

	if(isset($_POST['id']))
	{

	var_dump($_POST['id']);

// Para copiar los datos de una columna a otra dentro de otra tabla, debes ejecutar la siguiente sentencia:
//
// UPDATE `la_tabla` SET `columna_destino`=`columna_origen`
	require_once ("../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
}
?>
