<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="SELECT * FROM gasto where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
        $id=$rw['id'];
        $gasto_code=$rw['gasto_code'];
        $personal=$rw['personal'];
        $concepto=$rw['concepto'];
        $cantidad=$rw['cantidad'];
        $observaciones=$rw['observaciones'];
        $foto1=$rw['foto1'];
		}
	}
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="personal">Personal</label>
              <input type="text" class="form-control" id="personal" name="personal" value="<?php echo $personal;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Gasto/Concepto</label>
              <input type="text" class="form-control" value="<?php echo $concepto;?>" id="concepto" name="concepto">
            </div>
            <div class="form-group col-md-6">
              <label for="cantidad">Cantidad</label>
              <input type="text" class="form-control" placeholder="<?php echo $cantidad;?>" value="<?php echo $cantidad;?>" id="cantidad" name="cantidad">
            </div>
            <div class="form-group col-md-6">
              <label for="observaciones">Observacion</label>
              <input type="text" class="form-control" value="<?php echo $observaciones;?>" id="observaciones" name="observaciones">
            </div>
      </div>

      <div class="form-row">
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <label class="custom-file-label" for="imagefile1">foto 1</label>
                  <input type="file" name="imagefile1" class="form-control" id="imagefile1" onchange="upload_image(<?php echo $id_gasto; ?>);">
                </div>

                <div class="box box-primary"><!-- Profile Image 1-->
                    <div class="box-body box-profile">
                        <div id="load_img">
                            <img class=" img-responsive" src="<?php echo  $foto1;?>" data-toggle="modal" data-target="#myModal1" style='cursor:pointer' width="50%" height="50%">
                            </div>
                      <br>
                        <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">&nbsp;</h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo $foto1;?>" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- END Profile Image 1-->
            </div>

            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen2">
                  <label class="custom-file-label" for="Imagen2">Imagen2</label>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen3">
                  <label class="custom-file-label" for="Imagen3">Imagen3</label>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen4">
                  <label class="custom-file-label" for="Imagen4">Imagen4</label>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen5">
                  <label class="custom-file-label" for="Imagen5">Imagen5</label>
                </div>
            </div>

      </div>

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