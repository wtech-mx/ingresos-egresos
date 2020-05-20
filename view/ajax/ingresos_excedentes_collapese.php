
<form  role="form" method="post" action="view/ajax/agregar/agregar_ingreso_excedente.php">
		<h1>Productos</h1>
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
		      <label for="servicios">servicios</label>
		      <input class="form-control" type="number" value="1" id="servicios" name="servicios">
		    </div>
		</div>

	    <div class="form-row">
            <div class="form-group col-md-6">
		      <label for="partida">Partida</label>
		      <input type="text" class="form-control" id="partida" name="partida">
		    </div>

			<div class="form-group col-md-6">
		      <label for="concepto">Concepto</label>
		      <input type="text" class="form-control" id="concepto" name="concepto">
		    </div>
		</div>

		<div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="area">Departamento/Area</label>
		      <input type="text" class="form-control" id="area" name="area">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="monto">Monto</label>
		      <input type="number" class="form-control" id="monto" name="monto">
		    </div>
		    <div class="form-group col-md-4">
		    <label class="mr-sm-2" for="porcentaje">Seleccionar porcentaje</label>
				<select class="custom-select mr-sm-2" id="porcentaje" name="porcentaje">
                    <option value="1">70%</option>
                    <option value="2">30%</option>
                </select>
            </div>
            <div class="form-group col-md-4">
             <label class="mr-sm-2" for="estado">Seleccionar Estado</label>
				<select class="custom-select mr-sm-2" id="estado" name="estado">
                    <option value="2" selected>No sumar</option>
                    <option value="1">Sumar</option>
                </select>
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
	                <th>Partida</th>
	                <th>Concepto</th>
	                <th>Departamento/Area</th>
	                <th>Monto</th>
	                <th>Porcentaje</th>
	                <th>Estado</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM excedentes_ingresos ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_excedentes WHERE excedentes_ingresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($excedentes_ingresos = $rspta->fetch_object()){
                $sw=in_array($excedentes_ingresos->id,$valores);
                if ($id == $excedentes_ingresos->gasto_code) {
	            	if ($excedentes_ingresos->servicios ==  1) {
	            	if($excedentes_ingresos->porcentaje == '1'){
	            		$excedentes_ingresos->porcentaje = '70%';
	            	}
	            	if($excedentes_ingresos->porcentaje == '2'){
	            		$excedentes_ingresos->porcentaje = '30%';
	            	}

	            	if ($excedentes_ingresos->estado==2){
						$excedentes_ingresos->lbl_status="No sumar";
						$excedentes_ingresos->lbl_class='label label-danger';
					}else {
						$excedentes_ingresos->lbl_status="Sumar";
						$excedentes_ingresos->lbl_class='label label-success';
					}
                 ?>
	        <tbody>
	            <td><?php echo $excedentes_ingresos->id?></td>
                <td><?php echo $excedentes_ingresos->partida ?></td>
                <td>$<?php echo $excedentes_ingresos->concepto ?></td>
                <td>$<?php echo $excedentes_ingresos->area ?></td>
                <td>$<?php echo $excedentes_ingresos->monto ?></td>
                <td><?php echo $excedentes_ingresos->porcentaje ?></td>
            <?php
            	if($excedentes_ingresos->porcentaje == '2'){
            ?>
	            <td>
	            	<form action="view/ajax/calulos_suma.php" method="post" role="form">
			            <div class="form-group col-md-4">
			            <label class="mr-sm-2" for="estado">Seleccionar Estado</label>
							<select class="custom-select mr-sm-2" id="estado" name="estado">
			                    <option value="2" selected>No sumar</option>
			                    <option value="1">Sumar</option>
			                </select>
			            </div>

	                	<input class="btn btn-success  btn-circle btn-square btn-xs" type="submit" value="<?php echo $excedentes_ingresos->id;?>" name="id">


	            	</form>
	        	</td>
        	<?php } ?>

	        <td class="text-right col-auto">

                <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $excedentes_ingresos->id;?>');">
                	<i class="fa fa-edit"></i>
                </button>


                <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $excedentes_ingresos->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i>
                </button>

                <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $excedentes_ingresos->id;?>')">
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

<form  role="form" method="post" action="view/ajax/agregar/agregar_ingreso_excedente.php">
		<h1>Derechos</h1>
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
		      <label for="servicios">servicios</label>
		      <input class="form-control" type="number" value="2" id="servicios" name="servicios">
		    </div>
		</div>

	    <div class="form-row">
            <div class="form-group col-md-6">
		      <label for="partida">Partida</label>
		      <input type="text" class="form-control" id="partida" name="partida">
		    </div>

			<div class="form-group col-md-6">
		      <label for="concepto">Concepto</label>
		      <input type="text" class="form-control" id="concepto" name="concepto">
		    </div>
		</div>

		<div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="area">Departamento/Area</label>
		      <input type="text" class="form-control" id="area" name="area">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="monto">Monto</label>
		      <input type="number" class="form-control" id="monto" name="monto">
		    </div>
		    <div class="form-group col-md-4">
		    <label class="mr-sm-2" for="porcentaje">Seleccionar porcentaje</label>
				<select class="custom-select mr-sm-2" id="porcentaje" name="porcentaje">
                    <option value="1">70%</option>
                    <option value="2">30%</option>
                </select>
            </div>
		</div>

		 	<div class="row">
		 	  <div class="col-md-12">
					<button type="submit" id="guardar_datos_gasto" name="guardar_datos_gasto" class="btn btn-info">Agregar</button>
		      </div>
		    </div>
</form>
		<table class="table table-bordered table-striped" id="mytable">

	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	                <th>#ID</th>
	                <th>Partida</th>
	                <th>Concepto</th>
	                <th>Departamento/Area</th>
	                <th>Monto</th>
	                <th>Porcentaje</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM excedentes_ingresos ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_excedentes WHERE excedentes_ingresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($excedentes_ingresos = $rspta->fetch_object()){
                $sw=in_array($excedentes_ingresos->id,$valores);
	            if ($id == $excedentes_ingresos->gasto_code) {
	            	if ($excedentes_ingresos->servicios ==  2) {
	            	if($excedentes_ingresos->porcentaje == '1'){
	            		$excedentes_ingresos->porcentaje = '70%';
	            	}
	            	if($excedentes_ingresos->porcentaje == '2'){
	            		$excedentes_ingresos->porcentaje = '30%';
	            	}
                 ?>
	        <tbody>
	            <tr>
	            <td><?php echo $excedentes_ingresos->id?></td>
                <td><?php echo $excedentes_ingresos->partida ?></td>
                <td>$<?php echo $excedentes_ingresos->concepto ?></td>
                <td>$<?php echo $excedentes_ingresos->area ?></td>
                <td>$<?php echo $excedentes_ingresos->monto ?></td>
                <td><?php echo $excedentes_ingresos->porcentaje ?></td>

		        <td class="text-right col-auto">
                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $excedentes_ingresos->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $excedentes_ingresos->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $excedentes_ingresos->id;?>')">
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
<form  role="form" method="post" action="view/ajax/agregar/agregar_ingreso_excedente.php">
		<h1>Aprovechamiento</h1>
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
		      <label for="servicios">servicios</label>
		      <input class="form-control" type="number" value="3" id="servicios" name="servicios">
		    </div>
		</div>

	    <div class="form-row">
            <div class="form-group col-md-6">
		      <label for="partida">Partida</label>
		      <input type="text" class="form-control" id="partida" name="partida">
		    </div>

			<div class="form-group col-md-6">
		      <label for="concepto">Concepto</label>
		      <input type="text" class="form-control" id="concepto" name="concepto">
		    </div>
		</div>

		<div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="area">Departamento/Area</label>
		      <input type="text" class="form-control" id="area" name="area">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="monto">Monto</label>
		      <input type="number" class="form-control" id="monto" name="monto">
		    </div>
		    <div class="form-group col-md-4">
		    <label class="mr-sm-2" for="porcentaje">Seleccionar porcentaje</label>
				<select class="custom-select mr-sm-2" id="porcentaje" name="porcentaje">
                    <option value="1">70%</option>
                    <option value="2">30%</option>
                </select>
            </div>
		</div>

		 	<div class="row">
		 	  <div class="col-md-12">
					<button type="submit" id="guardar_datos_gasto" name="guardar_datos_gasto" class="btn btn-secondary">Agregar</button>
		      </div>
		    </div>
</form>

		<table class="table table-bordered table-striped" id="mytable">

	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	                <th>#ID</th>
	                <th>Partida</th>
	                <th>Concepto</th>
	                <th>Departamento/Area</th>
	                <th>Monto</th>
	                <th>Porcentaje</th>
	                <th>Acciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM excedentes_ingresos ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_excedentes WHERE excedentes_ingresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($excedentes_ingresos = $rspta->fetch_object()){
                $sw=in_array($excedentes_ingresos->id,$valores);
	            if ($id == $excedentes_ingresos->gasto_code) {
	            	if ($excedentes_ingresos->servicios ==  3) {
	            	if($excedentes_ingresos->porcentaje == '1'){
	            		$excedentes_ingresos->porcentaje = '70%';
	            	}
	            	if($excedentes_ingresos->porcentaje == '2'){
	            		$excedentes_ingresos->porcentaje = '30%';
	            	}
                 ?>
	        <tbody>
	            <tr>
	            <td><?php echo $excedentes_ingresos->id?></td>
                <td><?php echo $excedentes_ingresos->partida ?></td>
                <td>$<?php echo $excedentes_ingresos->concepto ?></td>
                <td>$<?php echo $excedentes_ingresos->area ?></td>
                <td>$<?php echo $excedentes_ingresos->monto ?></td>
                <td><?php echo $excedentes_ingresos->porcentaje ?></td>

		        <td class="text-right col-auto">
                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $excedentes_ingresos->id;?>');">
                    	<i class="fa fa-edit"></i>
                    </button>

                    <button type="button" class="btn btn-info btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_show" onclick="mostrar('<?php echo $excedentes_ingresos->id;?>')"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Selecciona para ver los datos del gasto"></i>
                    </button>

                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $excedentes_ingresos->id;?>')">
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
