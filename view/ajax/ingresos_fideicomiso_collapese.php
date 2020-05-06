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
				    <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="fecha_carga">Fecha</label>
					      <input class="form-control" type="date" value="" id="fecha_carga" name="fecha_carga">
					    </div>
					 	<div class="form-group col-md-6">
					      <label for="servicio">Servicio</label>
					      <input type="text" class="form-control" id="servicio" name="servicio">
					    </div>
					</div>
					 <div class="form-row">
					 	<div class="form-group col-md-4">
					      <label for="ingresos">Ingresos</label>
					      <input type="text" class="form-control" id="ingresos" name="ingresos">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="apartado">Apartado</label>
				 		  <input type="text" class="form-control" id="apartado" name="apartado">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="pagodoc">Pago Docente</label>
					      <input type="NUMBER" class="form-control" id="pagodoc" name="pagodoc">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="subtotal">Subtotal</label>
					      <input type="text" class="form-control" id="subtotal" name="subtotal">
					    </div>
					    <div class="form-group col-md-2">
					      <label for="total">Total</label>
					      <input type="text" class="form-control" id="total" name="total">
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
	                <th>Aportacion 15%</th>
	                <th>Pago Docente</th>
	                <th>Total</th>
	                <th>Fecha Carga</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM fideicomisos_egresos ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_fideicomisos WHERE fideicomisos_egresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($fideicomisos_egresos = $rspta->fetch_object()){
                $sw=in_array($fideicomisos_egresos->id,$valores);
	            if ($id == $fideicomisos_egresos->gasto_fide_egresos) {
                 ?>
	        <tbody>
	            <tr>

	            <td><?php echo $fideicomisos_egresos->id?></td>
                <td><?php echo $fideicomisos_egresos->Servicio ?></td>
                <td><?php echo $fideicomisos_egresos->egreso ?></td>
                <td><?php echo $fideicomisos_egresos->bien ?></td>
                <td><?php echo $fideicomisos_egresos->proveedor ?></td>
                <td><?php echo $fideicomisos_egresos->numfact ?></td>
                <td><?php echo $fideicomisos_egresos->fecha_carga; ?></td>
		        <td class="text-right">

                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $fideicomisos_egresos->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $fideicomisos_egresos->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i></button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $fideicomisos_egresos->id;?>')">
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