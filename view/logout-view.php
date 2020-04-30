<?php
	//session_start();
	//$_SESSION['user_id']=1;
	if (isset($_SESSION['user_id'])) {

		unset($_SESSION['dashboard']);
		unset($_SESSION['empleados']);
		unset($_SESSION['taller']);
		unset($_SESSION['Exedentes']);
		unset($_SESSION['Fideicomiso']);
		unset($_SESSION['Presupuesto-general']);
		unset($_SESSION['gasto']);
		unset($_SESSION['configuracion']);

		session_destroy();
		header("location: ./?view=index"); //estemos donde estemos nos redirije al index
	}

?>