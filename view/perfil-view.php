<?php
    include "resources/header.php";

    $id_user=$_SESSION['user_id'];
    $empleado=mysqli_query($con, "select * from empleado where id=$id_user");
    $rw=mysqli_fetch_object($empleado);
   // $id=$rw->id;
    $imagen=$rw->imagen;
    $nombre=$rw->nombre;
    $apellido=$rw->apellido;
    $email=$rw->email;
    $telefono=$rw->telefono;
    $celular=$rw->celular;
    $status=$rw->status;
    $kind=$rw->kind;
    $created_at=$rw->created_at;
?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class="active">Perfil</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Perfil</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="panel panel-primary">
                        <div class="panel-body panel-profile">
                            <div id="load_img">
                                <img class="img-responsive" src="<?php echo $imagen;?>" alt="Logotipo">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $nombre." ".$apellido ;?></h3>
                            <p class="text-muted text-center mail-text"><?php echo $email;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="resultados_ajax"></div><!-- resultados ajax -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos del Perfil</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" name="update_register" id="update_register" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id_user ?>">
                                <div class="form-group">

                                    <label for="imagefile" class="col-sm-2 control-label">Imagen: </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="imagefile" class="form-control" id="imagefile" onchange="upload_image(<?php echo $id_user; ?>);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre: " value="<?php echo $nombre ?>">
                                    </div>
                                    <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido: " value="<?php echo $apellido ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="email" class="col-sm-2 control-label">E-Mail: </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="E-Mail: " value="<?php echo $email ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="telefono" class="col-sm-2 control-label">Telefóno: </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefóno: " value="<?php echo $telefono ?>">
                                    </div>
                                    <label for="celular" class="col-sm-2 control-label">Celular: </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="celular" class="form-control" id="celular" placeholder="Celular: " value="<?php echo $celular ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="password" class="col-sm-2 control-label">Contraseña: </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="password" class="form-control" id="password" placeholder="Contraseña: " >
                                        <span class="text-muted text-right">Solo se modifica si escribes algo!</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary actualizar_datos">Guardar datos</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section><!--main content end-->
<?php  include "resources/footer.php" ?>
<script>
    function upload_image(id_user){
        $("#load_img").text('Cargando...');
        var inputFileImage = document.getElementById("imagefile");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('imagefile',file);
        data.append('id',id_user);

        $.ajax({
            url: "view/ajax/images/image_perfil_ajax.php",        // Url to which the request is send
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
</script>
<script>
    $( "#update_register" ).submit(function( event ) {
        $('.actualizar_datos').attr("disabled", true);
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "view/ajax/agregar/actualizar_perfil.php",
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