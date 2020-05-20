<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from gasto where id='$id'";
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

$rutaServ = "http://localhost/ingresos-egresos/";
?>


      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="personal">Personal</label>
              <input disabled type="text" class="form-control" id="personal" name="personal" value="<?php echo $personal;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Gasto/Concepto</label>
              <input disabled type="text" class="form-control" value="<?php echo $concepto;?>" id="concepto" name="concepto">
            </div>
            <div class="form-group col-md-6">
              <label for="cantidad">Cantidad</label>
              <input disabled type="text" class="form-control" placeholder="<?php echo $cantidad;?>" value="<?php echo $cantidad;?>" id="cantidad" name="cantidad">
            </div>
            <div class="form-group col-md-6">
              <label for="observaciones">Observacion</label>
              <input disabled type="text" class="form-control" value="<?php echo $observaciones;?>" id="observaciones" name="observaciones">
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


