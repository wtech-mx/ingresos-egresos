<?php

if (isset($_POST['id'])) {
    }elseif (isset($_POST['estado'])) {
    }elseif (
		!isset($_POST['id'])
		&& !isset($_POST['estado']))


include("is_logged.php");//Archivo comprueba si el usuario esta logueado
require_once ("../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

		$id = mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));
	    $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));



