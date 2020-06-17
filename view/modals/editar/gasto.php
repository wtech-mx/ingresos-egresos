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
        $foto2=$rw['foto2'];
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
                  <input type="file" class="custom-file-input" id="foto1" name="foto1" value="<?php echo  $foto1;?>">
                  <label class="custom-file-label" for="foto1"><?php echo  $foto1;?></label>
                </div>

                <hr>

                <a href="<?php echo  $foto1;?>" class="img-responsive" alt="Archivo 1" target="_blank" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                  <iframe type="application/pdf" value="<?php echo  $foto1;?>" src="<?php echo  $foto1;?>" style="width: 100%;height: auto"></iframe>
                </a>

            </div>

            <div class="form-group col-sm-6">

                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto2" name="foto2" value="<?php echo  $foto2;?>">
                  <label class="custom-file-label" for="foto2">Archivo 2</label>
                </div>

                <hr>

                <a href="<?php echo  $foto2;?>" class="img-responsive" alt="Archivo 2" target="_blank" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                  <iframe type="application/pdf" value="<?php echo  $foto2;?>" src="<?php echo  $foto2;?>" style="width: 100%;height: auto"></iframe>
                </a>

            </div>


      </div>

