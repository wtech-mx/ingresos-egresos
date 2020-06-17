<?php

$consul = "select * from presupuesto";
$resul = mysqli_query($con,$consul);
$num = mysqli_num_rows($resul);
//si la tabla esta vacia
if ($num == 0){
	?>
<form  role="form" method="post" action="view/ajax/agregar/agregar_presupuesto.php">

		<h1>Adquisición Directa</h1>

		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="gasto_code">Id Nombre <?php echo $id ?></label>
			      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_code" name="gasto_code">
			    </div>
			</div>
		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="mes_id">Id MES </label>
			      <input class="form-control" type="number" value="1" id="mes_id" name="mes_id">
			    </div>
			</div>
			<div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="partida">Partida</label>
			      <input class="form-control" type="number" value="1" id="partida" name="partida">
			    </div>
			</div>

			 <div class="form-row">
			 	<div class="form-group col-md-6">
			      <label for="monto">Monto</label>
			      <input type="text" class="form-control" id="monto" name="monto">
			    </div>
			 	<div class="form-group col-md-4">
			      <label for="utilizado">Utilizado</label>
			      <input type="number" class="form-control" id="utilizado" name="utilizado">
			    </div>
			    <div class="form-group col-md-4" style="display: none;">
			      <label for="utilizar">Por Utilizar</label>
		 		  <input type="number" class="form-control" id="utilizar" name="utilizar">
			    </div>
		     </div>

		 	<div class="row">
			 	<div class="col-md-12">
					<button type="submit" id="guardar_datos_gasto" name="guardar_datos_gasto" class="btn btn-success">Agregar</button>
			    </div>
		    </div>
</form>
<?php
}else{

      		$rspta = mysqli_query($con, "SELECT * FROM presupuesto ORDER BY  id DESC");
	   		$marcados = mysqli_query($con, "SELECT * FROM nombre_presupuesto WHERE presupuesto=$id ");
            $valores=array();

            while ($presupuesto = $rspta->fetch_object()){
                $sw=in_array($presupuesto->id,$valores);
	            if ($id == $presupuesto->gasto_code) {
	            	if ($presupuesto->partida ==  1) {

?>
<form  role="form" method="post" action="view/ajax/agregar/agregar_presupuesto.php">

		<h1>Adquisición Directa</h1>

		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="gasto_code">Id Nombre <?php echo $id ?></label>
			      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_code" name="gasto_code">
			    </div>
			</div>
		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="mes_id">Id MES </label>
			      <input class="form-control" type="number" value="1" id="mes_id" name="mes_id">
			    </div>
			</div>
			<div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="partida">Partida</label>
			      <input class="form-control" type="number" value="1" id="partida" name="partida">
			    </div>
			</div>

			 <div class="form-row">
			 	<div class="form-group col-md-6">
			      <label for="monto">Monto</label>
			      <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $presupuesto->utilizar?>">
			    </div>
			 	<div class="form-group col-md-4">
			      <label for="utilizado">Utilizado</label>
			      <input type="number" class="form-control" id="utilizado" name="utilizado">
			    </div>
			    <div class="form-group col-md-4" style="display: none;">
			      <label for="utilizar">Por Utilizar</label>
		 		  <input type="number" class="form-control" id="utilizar" name="utilizar">
			    </div>
		     </div>

		 	<div class="row">
			 	<div class="col-md-12">
					<button type="submit" id="guardar_datos_gasto" name="guardar_datos_gasto" class="btn btn-success">Agregar</button>
			    </div>
		    </div>
</form>

		<table class="table table-bordered table-striped" id="mytable">
	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	                <th>#ID</th>
	                <th>Monto</th>
	                <th>Utilizado</th>
	                <th>Por Utilizar</th>
	                <th>Acciones</th>
	            </tr>
	        </thead>
<?php
      		$rspta = mysqli_query($con, "SELECT * FROM presupuesto ORDER BY  id DESC");
	   		$marcados = mysqli_query($con, "SELECT * FROM nombre_presupuesto WHERE presupuesto=$id ");
            $valores=array();

            while ($presupuesto = $rspta->fetch_object()){
                $sw=in_array($presupuesto->id,$valores);
	            if ($id == $presupuesto->gasto_code) {
	            	if ($presupuesto->partida ==  1) {

?>
	        <tbody>
	            <tr>
	            <td><?php echo $presupuesto->id?></td>
                <td><?php echo $presupuesto->monto ?></td>
                <td><?php echo $presupuesto->utilizado ?></td>
                <td><?php echo $presupuesto->utilizar ?></td>
		        <td class="text-right">

                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $presupuesto->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $presupuesto->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del presupuesto"></i></button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $presupuesto->id;?>')">
                    	<i class="fa fas fa-trash"></i>
                    </button>

		        </td>
	        </tbody>

<?php
				}else{

					 }
					}
			}
		}

    	}else{
     		 }
    }

?>


	    </table>
	    <!--===================================================================================================================================================================================================================
 		====================================================================================================RESTRINGIDA====================================================================================================
 		===================================================================================================================================================================================================================-->

<?php
  		$rspta = mysqli_query($con, "SELECT * FROM presupuesto ORDER BY  id DESC");
   		$marcados = mysqli_query($con, "SELECT * FROM nombre_presupuesto WHERE presupuesto=$id ");
        $valores=array();

        while ($presupuesto = $rspta->fetch_object()){
            $sw=in_array($presupuesto->id,$valores);
            if ($id == $presupuesto->gasto_code) {


?>

<form  role="form" method="post" action="view/ajax/agregar/agregar_presupuesto.php">

	<h1>Restringida</h1>

		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="gasto_code">Id Nombre <?php echo $id ?></label>
			      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_code" name="gasto_code">
			    </div>
			</div>
		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="mes_id">Id MES </label>
			      <input class="form-control" type="number" value="1" id="mes_id" name="mes_id">
			    </div>
			</div>
			<div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="partida">Partida</label>
			      <input class="form-control" type="number" value="2" id="partida" name="partida">
			    </div>
			</div>

			 <div class="form-row">
			 	<div class="form-group col-md-6">
			      <label for="monto">Monto</label>
			      <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $presupuesto->utilizar2?>">
			    </div>
			 	<div class="form-group col-md-4">
			      <label for="utilizado">Utilizado</label>
			      <input type="number" class="form-control" id="utilizado" name="utilizado">
			    </div>
			    <div class="form-group col-md-4" style="display: none;">
			      <label for="utilizar">Por Utilizar</label>
		 		  <input type="number" class="form-control" id="utilizar" name="utilizar">
			    </div>
		     </div>

		 	<div class="row">
		 	  <div class="col-md-12">
					<button type="submit" id="guardar_datos_gasto" name="guardar_datos_gasto" class="btn btn-success">Agregar</button>
		      </div>
		    </div>
</form>
	<table class="table table-bordered table-striped" id="mytable">

        <thead>
        	<div id="adicionados"></div>
            <tr>
                <th>#ID</th>
                <th>Monto</th>
                <th>Utilizado</th>
                <th>Por Utilizar</th>
                <th>Acciones</th>
            </tr>
        </thead>

<?php
  		$rspta = mysqli_query($con, "SELECT * FROM presupuesto ORDER BY  id DESC");
   		$marcados = mysqli_query($con, "SELECT * FROM nombre_presupuesto WHERE presupuesto=$id ");
        $valores=array();

        while ($presupuesto = $rspta->fetch_object()){
            $sw=in_array($presupuesto->id,$valores);
            if ($id == $presupuesto->gasto_code) {
            	if ($presupuesto->partida ==  2) {
?>
        <tbody>
            <tr>
            <td><?php echo $presupuesto->id ?></td>
            <td><?php echo $presupuesto->monto ?></td>
            <td><?php echo $presupuesto->utilizado ?></td>
            <td><?php echo $presupuesto->utilizar2 ?></td>
	        <td class="text-right">

                <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $presupuesto->id;?>');">
                	<i class="fa fa-edit"></i>
                </button>

                <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $presupuesto->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del presupuesto"></i></button>

                <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $presupuesto->id;?>')">
                	<i class="fa fas fa-trash"></i>
                </button>

	        </td>
        </tbody>
<?php
			}
		}
	}

?>
    </table>
<?php
     	}
    }

?>


	    <!--===================================================================================================================================================================================================================
 		====================================================================================================CONSOLIDADA====================================================================================================
 		===================================================================================================================================================================================================================-->

<?php
  		$rspta = mysqli_query($con, "SELECT * FROM presupuesto ORDER BY  id DESC");
   		$marcados = mysqli_query($con, "SELECT * FROM nombre_presupuesto WHERE presupuesto=$id ");
        $valores=array();

        while ($presupuesto = $rspta->fetch_object()){
            $sw=in_array($presupuesto->id,$valores);
            if ($id == $presupuesto->gasto_code) {

?>

	    <form  role="form" method="post" action="view/ajax/agregar/agregar_presupuesto.php">

			<h1>Consolidada</h1>

				    <div class="form-row" style="display: none;">
					    <div class="form-group col-md-6">
					      <label for="gasto_code">Id Nombre <?php echo $id ?></label>
					      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_code" name="gasto_code">
					    </div>
					</div>
				    <div class="form-row" style="display: none;">
					    <div class="form-group col-md-6">
					      <label for="mes_id">Id MES </label>
					      <input class="form-control" type="number" value="3" id="mes_id" name="mes_id">
					    </div>
					</div>
					<div class="form-row" style="display: none;">
					    <div class="form-group col-md-6">
					      <label for="partida">Partida</label>
					      <input class="form-control" type="number" value="3" id="partida" name="partida">
					    </div>
					</div>

					 <div class="form-row">
					 	<div class="form-group col-md-6">
					      <label for="monto">Monto</label>
					      <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $presupuesto->utilizar3?>">
					    </div>
					 	<div class="form-group col-md-4">
					      <label for="utilizado">Utilizado</label>
					      <input type="number" class="form-control" id="utilizado" name="utilizado">
					    </div>
					    <div class="form-group col-md-4" style="display: none;">
					      <label for="utilizar">Por Utilizar</label>
				 		  <input type="number" class="form-control" id="utilizar" name="utilizar">
					    </div>
				     </div>

				 	<div class="row">
				 	  	<div class="col-md-12">
							<button type="submit" id="guardar_datos_gasto" name="guardar_datos_gasto" class="btn btn-success">Agregar</button>
				      	</div>
				    </div>
		</form>
		<table class="table table-bordered table-striped" id="mytable">

	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	                <th>#ID</th>
	                <th>Monto</th>
	                <th>Utilizado</th>
	                <th>Por Utilizar</th>
	                <th>Acciones</th>
	            </tr>
	        </thead>

		<?php
      		$rspta = mysqli_query($con, "SELECT * FROM presupuesto ORDER BY  id DESC");
	   		$marcados = mysqli_query($con, "SELECT * FROM nombre_presupuesto WHERE presupuesto=$id ");
            $valores=array();

            while ($presupuesto = $rspta->fetch_object()){
                $sw=in_array($presupuesto->id,$valores);
	            if ($id == $presupuesto->gasto_code) {
	            	if ($presupuesto->partida ==  3) {
        ?>

	        <tbody>

	            <tr>
	            <td><?php echo $presupuesto->id?></td>
                <td><?php echo $presupuesto->monto ?></td>
                <td><?php echo $presupuesto->utilizado ?></td>
                <td><?php echo $presupuesto->utilizar3 ?></td>
		        <td class="text-right">

                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $presupuesto->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $presupuesto->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del presupuesto"></i></button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $presupuesto->id;?>')">
                    	<i class="fa fas fa-trash"></i>
                    </button>

		        </td>

	        </tbody>
<?php
	     		}else{

	     		}
	     		}
        	}

?>
	    </table>
<?php
     	}else{

     		 }
    }

    }

?>
