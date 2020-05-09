<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="SELECT * FROM fideicomiso_ingresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
        $id=$rw['id'];
        $ingresos=$rw['ingresos'];

		}
	}
	else{exit;}
?>

      <div class="form-row">
            <div class="form-group col-md-12">
              <label for="ingresos">Ingreso</label>
              <input type="text" class="form-control" id="ingresos" name="ingresos" value="<?php echo $ingresos;?>">
            </div>
      </div>

      <div class="form-row">
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
      </div>

