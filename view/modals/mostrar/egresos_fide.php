<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from fideicomisos_egresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $gasto_fide=$rw['gasto_fide'];
            $egreso=$rw['egreso'];
            $bien=$rw['bien'];
            $proveedor=$rw['proveedor'];
            $numfact=$rw['numfact'];
            $foto1=$rw['foto1'];
            $foto2=$rw['foto2'];
		}
	}
	else{exit;}

$rutaServ = "http://localhost/egreso-egresos/";
?>


      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="egreso">Egreso</label>
              <input disabled type="text" class="form-control" id="egreso" name="egreso" value="<?php echo $egreso;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Bien/Servicio</label>
              <input disabled type="text" class="form-control" value="<?php echo $bien;?>" id="bien" name="bien">
            </div>
            <div class="form-group col-md-6">
              <label for="proveedor">Proveedor</label>
              <input disabled type="text" class="form-control" value="<?php echo $proveedor;?>" id="proveedor" name="proveedor">
            </div>
            <div class="form-group col-md-6">
              <label for="numfact">Num. Factura</label>
              <input disabled type="text" class="form-control" value="<?php echo $numfact;?>" id="numfact" name="numfact">
            </div>

            <div class="form-group col-md-6">
              <label for="personal">Documento 1</label>
                 <a href="<?php echo  $foto1;?>" class="img-responsive" alt="Archivo 1" target="_blank" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                        <iframe type="application/pdf"  src="<?php echo  $foto1;?>" style="width: 100%;height: auto"></iframe>
                </a>
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Documento 2</label>
                <a href="<?php echo  $foto2;?>" class="img-responsive" alt="Archivo 1" target="_blank" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                        <iframe type="application/pdf"  src="<?php echo  $foto2;?>" style="width: 100%;height: auto"></iframe>
                </a>
            </div>

      </div>


