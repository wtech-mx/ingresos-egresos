<form  role="form" method="post" action="view/ajax/agregar/agregar_presupuesto.php">
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
				    	<div class="col-sm-6">
							<label class="mr-sm-2" for="partida">Seleccionar</label>
							<select class="custom-select mr-sm-2" id="partida" name="partida">
			                <option selected>Selecciona Partida</option>
			                    <option value="1">Adquisición Directa</option>
			                    <option value="2">Restringida</option>
			                    <option value="3">Consolidada</option>
			                </select>
			            </div>
					 	<div class="form-group col-md-6">
					      <label for="monto">Monto</label>
					      <input type="text" class="form-control" id="monto" name="monto">
					    </div>
					</div>

					 <div class="form-row">
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
	                <th>Partida</th>
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
            //while($row = mysqli_fetch_array($query)){
            while ($presupuesto = $rspta->fetch_object()){
                $sw=in_array($presupuesto->id,$valores);
	            if ($id == $presupuesto->gasto_code) {
	            	if($presupuesto->partida == '1'){
	            		$presupuesto->partida = 'Adquisición Directa';
	            	}

	            	if($presupuesto->partida == '2'){
	            		$presupuesto->partida= 'Restringida';
	            	}

	            	if($presupuesto->partida == '3'){
	            		$presupuesto->partida= 'Consolidada';
	            	}
                ?>
	        <tbody>
	            <tr>
	            <td><?php echo $presupuesto->id?></td>
	            <td><?php echo $presupuesto->partida ?></td>
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

			        ?>
	    </table>

<script>
    function upload_foto1(id_gasto){
            $("#load_img1").text('Cargando...');
            var inputFileImage = document.getElementById("imagefile1");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('imagefile1',file);
            data.append('id',id_gasto);


            $.ajax({
                url: "view/ajax/images/foto1_gasto_ajax.php", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $("#load_img1").html(data);

                }
            });

        }
</script>