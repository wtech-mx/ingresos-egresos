<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="SELECT * FROM fideicomisos_egresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
        $id=$rw['id'];
        $gasto_fide_egresos=$rw['gasto_fide_egresos'];
        $numfact=$rw['numfact'];
        $egreso=$rw['egreso'];
        $bien=$rw['bien'];
        $proveedor=$rw['proveedor'];
        $numfact=$rw['numfact'];
      }
	}
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gasto">Egreso</label>
              <input type="text" class="form-control" value="<?php echo $egreso;?>" id="egreso" name="egreso">
            </div>
            <div class="form-group col-md-4">
              <label for="bien">Bien/Servicio</label>
              <input type="text" class="form-control" value="<?php echo $bien;?>" id="bien" name="bien">
            </div>
            <div class="form-group col-md-6">
              <label for="proveedor">proveedor</label>
              <input type="text" class="form-control" value="<?php echo $proveedor;?>" id="proveedor" name="proveedor">
            </div>
            <div class="form-group col-md-4">
              <label for="numfact">Num factura</label>
              <input type="number" class="form-control" value="<?php echo $numfact;?>" id="numfact" name="numfact">
            </div>
      </div>

      <div class="form-row">
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <label class="custom-file-label" for="imagefile1">foto 1</label>
                  <input type="file" name="imagefile1" class="form-control" id="imagefile1" onchange="">
                </div>
            </div>

            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen2">
                  <label class="custom-file-label" for="Imagen2">Imagen2</label>
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