
		 <form  role="form" method="post" action="view/ajax/agregar/agregar_gasto.php"  enctype="multipart/form-data">
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
				    <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="fecha_carga">Fecha</label>
					      <input class="form-control" type="date" value="" id="fecha_carga" name="fecha_carga">
					    </div>
					 	<div class="form-group col-md-6">
					      <label for="concepto">Gasto/Concepto</label>
					      <input type="text" class="form-control" id="concepto" name="concepto">
					    </div>
					</div>
					 <div class="form-row">
					 	<div class="form-group col-md-4">
					      <label for="personal">Personal</label>
					      <input type="text" class="form-control" id="personal" name="personal">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="cantidad">Cantidad</label>
				 		  <input type="text" class="form-control" id="cantidad" name="cantidad">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="observaciones">Observacion</label>
					      <input type="text" class="form-control" id="observaciones" name="observaciones">
					    </div>
				     </div>

				     <div class="form-row">
					    <div class="form-group col-md-6">
							<div class="custom-file">
							<label class="custom-file-label" for="foto1">Foto 1</label>
							<input type="file" name="foto1" class="form-control" id="foto1">
							</div>
					    </div>

					    <div class="form-group col-md-6">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="foto2">
							  <label class="custom-file-label" for="foto2">foto2</label>
							</div>
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
	                <th>Personal/Gasto</th>
	                <th>Concepto</th>
	                <th>Cantidad</th>
	                <th>Observaciones</th>
	                <th>Fecha Carga</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM gasto ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_gasto WHERE gasto=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($gasto = $rspta->fetch_object()){
                $sw=in_array($gasto->id,$valores);
	            if ($id == $gasto->gasto_code) {
                 ?>
	        <tbody>
	            <tr>
	            <td><?php echo $gasto->id?></td>
                <td><?php echo $gasto->personal ?></td>
                <td><?php echo $gasto->concepto ?></td>
                <td><?php echo $gasto->cantidad ?></td>
                <td><?php echo $gasto->observaciones ?></td>
                <td><?php echo $gasto->fecha_carga; ?></td>
		        <td class="text-right">

                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $gasto->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $gasto->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i></button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $gasto->id;?>')">
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
