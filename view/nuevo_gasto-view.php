<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
    $active11="active";
    include "resources/header.php";

    if ($_SESSION['gasto']==1){

        $gasto_code=time()."-".$_SESSION['user_id'];
        $created_at=date("Y-m-d H:i:s");
        $target_dir="view/resources/images/choques.png";
        $insert=mysqli_query($con,"INSERT INTO gasto (id, gasto_code, personal, concepto, cantidad, observaciones, fecha_carga, foto1, foto2, foto3, foto4, foto5) VALUES (NULL, '$gasto_code', '', '', '', '', '$created_at','$target_dir','$target_dir','$target_dir','$target_dir','$target_dir' ); ");
        $sql_gasto=mysqli_query($con,"select * from gasto where  gasto_code='$gasto_code'");
        $rw_gasto=mysqli_fetch_array($sql_gasto);
        $id_gasto=$rw_gasto['id'];

        $count=mysqli_query($con,"select count(*) as total from gasto where personal=''");
        $rw=mysqli_fetch_array($count);
        $gastos_codes=$rw['total']+1;

?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class=""><a href="./?view=gasto">Gastos Corriente</a></li>
                            <li class="active">Nuevo Gasto Corriente</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Nuevo Gasto Corriente</h1>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos de Gasto Corriente</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                       <div class="panel-body">
                   			<form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputEmail4">Email</label>
							      <input type="email" class="form-control" id="nombre" placeholder="Email">
							    </div>

							    <div class="form-group col-md-6">
							      <label for="inputPassword4">Password</label>
							      <input type="password" class="form-control" id="apellido" placeholder="Password">
							    </div>

							  <div class="form-group col-md-12">
							    <label for="inputAddress">Address</label>
							    <input type="text" class="form-control" id="cedula" placeholder="1234 Main St">
							  </div>
							 </div>

							 <button id="adicionar" class="btn btn-success" type="button">Adicionar</button>
								<p>Elementos en la Tabla:
								  <div id="adicionados"></div>
								</p>
								<table  id="mytable" class="table table-bordered table-hover ">
								  <tr>
								    <th>Nobmre</th>
								    <th>Apellidos</th>
								    <th>C&eacute;dula</th>
								    <th>Eliminar</th>
								  </tr>
								</table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section><!--main content end-->
<script type="text/javascript">
			  $(document).ready(function() {
		//obtenemos el valor de los input

		$('#adicionar').click(function() {
		  var nombre = document.getElementById("nombre").value;
		  var apellido = document.getElementById("apellido").value;
		  var cedula = document.getElementById("cedula").value;
		  var i = 1; //contador para asignar id al boton que borrara la fila
		  var fila = '<tr id="row' + i + '"><td>' + nombre + '</td><td>' + apellido + '</td><td>' + cedula + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

		  i++;

		  $('#mytable tr:first').after(fila);
		    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
		    var nFilas = $("#mytable tr").length;
		    $("#adicionados").append(nFilas - 1);
		    //le resto 1 para no contar la fila del header
		    document.getElementById("apellido").value ="";
		    document.getElementById("cedula").value = "";
		    document.getElementById("nombre").value = "";
		    document.getElementById("nombre").focus();
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
</script>
<?php  include "resources/footer.php" ?>
<script>
    function upload_foto1(id_gasto){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',id_choque);

        $.ajax({
            url: "view/ajax/images/foto1_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img").html(data);

            }
        });
    }
    function upload_foto2(id_vehiculo){
        $("#load_img2").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile2");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile2',file);
        data.append('id',id_vehiculo);

        $.ajax({
            url: "view/ajax/images/foto2_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img2").html(data);

            }
        });
    }
    function upload_foto3(id_vehiculo){
        $("#load_img3").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile3");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile3',file);
        data.append('id',id_vehiculo);

        $.ajax({
            url: "view/ajax/images/foto3_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img3").html(data);

            }
        });
    }
    function upload_foto4(id_vehiculo){
        $("#load_img4").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile4");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile4',file);
        data.append('id',id_vehiculo);

        $.ajax({
            url: "view/ajax/images/foto4_choque_ajax.php",        // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $("#load_img4").html(data);

            }
        });
    }
</script>
<script>
    $( "#update_register" ).submit(function( event ) {
      $('.actualizar_datos').attr("disabled", true);
      var parametros = $(this).serialize();
      $.ajax({
            type: "POST",
            url: "view/ajax/agregar/actualizar_choque.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados_ajax").html("Mensaje: Cargando...");
              },
            success: function(datos){
            $("#resultados_ajax").html(datos);
            $('.actualizar_datos').attr("disabled", false);
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();});}, 5000);

          }
    });
      event.preventDefault();
    });
</script>
<?php
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush();
?>