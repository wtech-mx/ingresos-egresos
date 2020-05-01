		<form  role="form" method="post" id="new_register_datos" name="new_register_datos">
				    <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="fecha_carga">Fecha</label>
					      <input class="form-control" type="date" value="" id="fecha_carga">
					    </div>

					    <div class="form-group col-md-4">
					      <label for="nombre">nombre</label>
				 		  <input type="text" class="form-control" id="nombre">
					    </div>
					 	<div class="form-group col-md-4">
					      <label for="concepto">Gasto/Concepto</label>
					      <input type="text" class="form-control" id="concepto">
					    </div>
					</div>
					 <div class="form-row">
					 	<div class="form-group col-md-4">
					      <label for="personal">Personal</label>
					      <input type="text" class="form-control" id="personal">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="cantidad">Cantidad</label>
				 		  <input type="text" class="form-control" id="cantidad">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="observaciones">Observacion</label>
					      <input type="text" class="form-control" id="observaciones">
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
				     </div>
					 	<div class="row">
					 	  <div class="col-md-12">
								<button type="submit" id="guardar_datos_gasto" class="btn btn-success">Agregar</button>
					      </div>
					    </div>
			</form>
			<table class="table table-bordered table-striped" id="mytable">
		        <thead>
		        	<div id="adicionados"></div>
		            <tr>
		                <th>#ID</th>
		                 <th>Nombre</th>
		                <th>Personal/Gasto</th>
		                <th>Concepto</th>
		                <th>Cantidad</th>
		                <th>Observaciones</th>
		                <th>Fecha Carga</th>
		                <th>Acciones</th>
		            </tr>
		         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM gasto");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_gasto WHERE gasto=$id");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($gasto = $rspta->fetch_object()){
                $sw=in_array($gasto->id,$valores);
	            if ($id == $gasto->gasto_code) {
                 ?>
		        <tbody>
		            <tr>
		            <td><?php echo $gasto->id?></td>
	            	<td><?php echo $gasto->nombre ?></td>
	                <td><?php echo $gasto->personal ?></td>
	                <td><?php echo $gasto->concepto ?></td>
	                <td><?php echo $gasto->cantidad ?></td>
	                <td><?php echo $gasto->observaciones ?></td>
	                <td><?php echo $gasto->fecha_carga; ?></td>
			        <td class="text-right">
	                    <button type="button" class="btn btn-warning  btn-circle btn-square btn-xs" data-toggle="modal" data-target="#modal_update" onclick="editar('<?php echo $gasto->id;?>');">
	                    	<i class="fa fa-edit"></i>
	                    </button>
		                    <button type="button" class="btn btn-danger btn-circle btn-square btn-xs" onclick="eliminar('<?php echo $gasto->id;?>')">
		                    	<i class="fa fas fa-trash"></i>
		                    </button>
			        </td>
		        </tbody>

	<?php
		     }
            }
        ?>
		    </table>
<script>
    $( "#new_register_datos" ).submit(function( event ) {
      $('#guardar_datos_datos').attr("disabled", true);
     var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "view/ajax/agregar/agregar_gasto.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#resultados_ajax").html("Enviando...");
                  },
                success: function(datos){
                $("#resultados_ajax").html(datos);
                $('#guardar_datos').attr("disabled", false);
                load(1);
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});}, 5000);
                $('#formModal').modal('hide');
              }
        });
      event.preventDefault();
    })
</script>

<!-- <script type="text/javascript">
				$(document).ready(function() {
				$('#adicionar').click(function() {
				  var personal = document.getElementById("personal").value;
				  var concepto = document.getElementById("concepto").value;
				  var cantidad = document.getElementById("cantidad").value;
				  var observaciones = document.getElementById("observaciones").value;
				  var fecha_carga = document.getElementById("fecha_carga").value;
				  var i = 1; //contador para asignar id al boton que borrara la fila
				  var fila = '<tr id="row' + i + '"><td>' + personal + '</td><td>' + concepto + '</td><td>' + cantidad + '</td><td>' + observaciones +'</td><td>' + fecha_carga +'</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

				  i++;

				  $('#mytable tr:first').after(fila);
				    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
				    var nFilas = $("#mytable tr").length;
				    $("#adicionados").append(nFilas - 1);
				    //le resto 1 para no contar la fila del header
				    document.getElementById("fecha_carga").value = "";
				    document.getElementById("personal").value ="";
				    document.getElementById("concepto").value = "";
				    document.getElementById("cantidad").focus();
				    document.getElementById("observaciones").focus();
				  });
				$(document).on('click', '.btn_remove', function() {
				  var button_id = $(this).attr("id");
				    //cuando da click obtenemos el id del boton
				    $('#row' + button_id + '').remove(); //borra la fila
				    //limpia el para que vuelva a contar las filas de la tabla
				    $("#adicionados").text("");
				    var nFilas = $("#mytable tr").length;
				    $("#adicionados").append(nFilas - 1);
				  });
				});
</script> -->