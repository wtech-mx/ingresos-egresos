			<form  role="form" method="post" id="update_register" name="update_register">
				  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="fecha">Fecha</label>
					      <input class="form-control" type="date" value="" id="fecha">
					    </div>

					    <div class="form-group col-md-4">
					      <label for="personal">Personal</label>
					      <input type="text" class="form-control" id="personal">
					    </div>

					    <div class="form-group col-md-4">
					      <label for="gasto">Gasto/Concepto</label>
					      <input type="text" class="form-control" id="gasto">
					    </div>

				  </div>

				  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="cantidad">Cantidad</label>
				 		  <input type="text" class="form-control" id="cantidad">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="observacion">Observacion</label>
					      <input type="text" class="form-control" id="observacion">
					    </div>
				  </div>

				  <div class="form-row">
					    <div class="form-group col-md-3">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen1">
							  <label class="custom-file-label" for="Imagen1">Imagen1</label>
							</div>
					    </div>
					    <div class="form-group col-md-2">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen2">
							  <label class="custom-file-label" for="Imagen2">Imagen2</label>
							</div>
					    </div>
					    <div class="form-group col-md-2">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen3">
							  <label class="custom-file-label" for="Imagen3">Imagen3</label>
							</div>
					    </div>
					    <div class="form-group col-md-2">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen4">
							  <label class="custom-file-label" for="Imagen4">Imagen4</label>
							</div>
					    </div>
					    <div class="form-group col-md-3">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="Imagen5">
							  <label class="custom-file-label" for="Imagen5">Imagen5</label>
							</div>
					    </div>
					    <button  id="actualizar_datos" class="btn btn-success" type="button">Adicionar a la tabla</button>
				  </div>
			</form>
			<table class="table table-bordered table-striped">
				<thead></thead>
		        <thead>
		            <tr>
		                <th>#ID</th>
		                <th>Personal/Gasto</th>
		                <th>Concepto</th>
		                <th>Cantidad</th>
		                <th>Observaciones</th>
		                <th>Fecha Carga</th>
		                <th></th>
		            </tr>

		        </thead>
		        <tbody>
		            <tr>
		            	<td><?php echo $id ?></td>
		                <td><?php echo $personal ?></td>
		                <td><?php echo $concepto ?></td>
		                <td><?php echo $cantidad ?></td>
		                <td><?php echo $observaciones ?></td>
		                <td><?php echo $fecha_cargas ?></td>

		                <td class="text-right">
		                    <button type="button" class="btn btn-warning btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $id;?>');"><i class="fa fa-edit"></i></button>
		        </tbody>
		        <tfoot>
		            <tr>
						<td colspan='10'>
							<?php
								$inicios=$offset+1;
								$finales+=$inicios -1;
								echo "Mostrando $inicios al $finales de $numrows registros";
								echo paginate($reload, $page, $total_pages, $adjacents);
							?>
						</td>
					</tr>
				</tfoot>
		    </table>