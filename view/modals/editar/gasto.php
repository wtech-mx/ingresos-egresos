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
                  <input type="file" class="custom-file-input" id="Imagen1">
                  <label class="custom-file-label" for="Imagen1">Imagen1</label>
                </div>
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