		 <form  role="form" method="post" action="view/ajax/agregar/agregar_egresos_fideicomiso.php" enctype="multipart/form-data">
				    <div class="form-row" style="display: none;">
					    <div class="form-group col-md-6">
					      <label for="gasto_fide_egresos">Id Nombre <?php echo $id ?></label>
					      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_fide_egresos" name="gasto_fide_egresos">
					    </div>
					</div>
				    <div class="form-row" style="display: none;">
					    <div class="form-group col-md-6">
					      <label for="mes_id">Id MES </label>
					      <input class="form-control" type="number" value="1" id="mes_id" name="mes_id">
					    </div>
					</div>
				    <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="fecha_carga">Fecha</label>
					      <input class="form-control" type="date" value="" id="fecha_carga" name="fecha_carga">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="egreso">Egreso</label>
					      <input type="text" class="form-control" id="egreso" name="egreso">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="bien">Bien/Servicio</label>
				 		  <input type="text" class="form-control" id="bien" name="bien">
					    </div>
					</div>

					 <div class="form-row">
					    <div class="form-group col-md-2">
					      <label for="numfact">Numfac</label>
					      <input type="NUMBER" class="form-control" id="numfact" name="numfact">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="proveedor">Proveedor</label>
					      <input type="text" class="form-control" id="proveedor" name="proveedor">
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
							  <label class="custom-file-label" for="foto2">foto2</label>
							  <input type="file" class="custom-file-input" id="foto2" name="foto2">
							</div>
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
	                <th>Egreso</th>
	                <th>Bien/Servicio</th>
	                <th>Numfact</th>
	                <th>Proveedor</th>
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
                <td><?php echo $fideicomisos_egresos->egreso ?></td>
                <td><?php echo $fideicomisos_egresos->bien ?></td>
                <td><?php echo $fideicomisos_egresos->numfact ?></td>
                <td><?php echo $fideicomisos_egresos->proveedor ?></td>
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