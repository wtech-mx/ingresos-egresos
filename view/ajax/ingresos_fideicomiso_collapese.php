<form  role="form" method="post" action="view/ajax/agregar/agregar_ingresos_fideicomiso.php">
	    <div class="form-row" style="display: none;">
		    <div class="form-group col-md-6">
		      <label for="gasto_fide">Id Nombre <?php echo $id ?></label>
		      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_fide" name="gasto_fide">
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
		      <label for="ingreso_id">Id MES </label>
		      <input class="form-control" type="number" value="1" id="ingreso_id" name="ingreso_id">
		    </div>
		</div>
	    <div class="form-row">
            <div class="col-sm-4">
                <select class="form-control" name="servicio" id="servicio">
                <option value="0">Seleccionar Servicio</option>
                    <option value="1">Analisis</option>
                    <option value="2">Seminario</option>
                    <option value="3">Odontologia</option>
                </select>
            </div>

		    <div class="form-group col-md-4">
		      <label for="ingresos">Ingresos</label>
		      <input type="text" class="form-control" id="ingresos" name="ingresos">
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
	                <th>Servicio</th>
	                <th>Ingreso</th>
	                <th>Pago Docente</th>
	                <th>Total</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM fideicomiso_ingresos ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_fideicomisos WHERE fideicomiso_ingresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($fideicomiso_ingresos = $rspta->fetch_object()){
                $sw=in_array($fideicomiso_ingresos->id,$valores);
	            if ($id == $fideicomiso_ingresos->gasto_fide) {
                 ?>
	        <tbody>
	            <tr>

	            <td><?php echo $fideicomisos_ingresos->id?></td>
                <td><?php echo $fideicomisos_ingresos->servicio ?></td>
                <td><?php echo $fideicomisos_ingresos->ingreso ?></td>
		        <td class="text-right">

                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $fideicomisos_ingresos->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $fideicomisos_ingresos->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i></button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $fideicomisos_ingresos->id;?>')">
                    	<i class="fa fas fa-trash"></i>
                    </button>

		        </td>
	        </tbody>
				<?php
					     }else{

					     }
			            }

			        ?>
	    </table>