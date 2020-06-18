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

        $foto1=$rw['foto1'];
        $foto2=$rw['foto2'];
      }
	}
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gasto">Egresos</label>
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
