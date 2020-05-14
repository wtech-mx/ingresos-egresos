<form  role="form" method="post" action="view/ajax/agregar/agregar_egreso_excedente.php">
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
		      <input type="date" class="form-control" id="fecha_carga" name="fecha_carga">
		    </div>
		     <div class="form-group col-md-6">
		      <label for="egreso">Egresos</label>
		      <input type="text" class="form-control" id="egreso" name="egreso">
		    </div>
		</div>
		<div class="form-row">
            <div class="form-group col-md-4">
		      <label for="bien">Bien o Servicio</label>
		      <input type="text" class="form-control" id="bien" name="bien">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="proveedor">Proveedor</label>
		      <input type="text" class="form-control" id="proveedor" name="proveedor">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="factura">Factura</label>
		      <input type="number" class="form-control" id="factura" name="factura">
		    </div>
		</div>

		<div class="form-row">
		    <div class="form-group col-md-6">
				<div class="custom-file">
			    <input type="file" name="imagefile1" class="form-control" id="imagefile1">
				<label class="custom-file-label" for="imagefile1">Archivo 1</label>
				</div>
		    </div>
		    <div class="form-group col-md-6">
				<div class="custom-file">
				  <input type="file" class="custom-file-input" id="imagefile2">
				  <label class="custom-file-label" for="imagefile2">Archivo 2</label>
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
	                <th>Fecha</th>
	                <th>Egreso</th>
	                <th>Bien o Servicio</th>
	                <th>Proveedor</th>
	                <th>Factura</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM excedentes_egresos ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_excedentes WHERE excedentes_egresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($excedentes_egresos = $rspta->fetch_object()){
                $sw=in_array($excedentes_egresos->id,$valores);
	            if ($id == $excedentes_egresos->gasto_code) {
                 ?>
	        <tbody>
	            <tr>
	            <td><?php echo $excedentes_egresos->id?></td>
                <td><?php echo $excedentes_egresos->fecha_carga ?></td>
                <td>$<?php echo $excedentes_egresos->egreso ?></td>
                <td>$<?php echo $excedentes_egresos->bien ?></td>
                <td>$<?php echo $excedentes_egresos->proveedor ?></td>
                <td>$<?php echo $excedentes_egresos->factura ?></td>

		        <td class="text-right col-auto">
                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $excedentes_egresos->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $excedentes_egresos->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $excedentes_egresos->id;?>')">
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
</form>
