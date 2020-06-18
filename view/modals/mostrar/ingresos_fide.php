<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from fideicomiso_ingresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $gasto_fide=$rw['gasto_fide'];
            $ingresos=$rw['ingresos'];
            $servicio=$rw['servicio'];
            $total=$rw['total'];
            $pagodoc=$rw['pagodoc'];
            $foto1=$rw['foto1'];
            $foto2=$rw['foto2'];

                if($servicio == '1'){
                  $servicio = 'Analisis';
                }

                if($servicio == '2'){
                  $servicio= 'Seminario';
                }

                if($servicio == '3'){
                  $servicio= 'Odontologia';
                }
		}
	}
	else{exit;}

$rutaServ = "http://localhost/ingresos-egresos/";
?>


      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="ingresos">Ingresos</label>
              <input disabled type="text" class="form-control" id="ingresos" name="ingresos" value="<?php echo $ingresos;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Servicio</label>
              <input disabled type="text" class="form-control" value="<?php echo $servicio;?>" id="servicio" name="servicio">
            </div>
            <div class="form-group col-md-6">
              <label for="total">Total</label>
              <input disabled type="text" class="form-control" placeholder="<?php echo $total;?>" value="<?php echo $total;?>" id="total" name="total">
            </div>
            <div class="form-group col-md-6">
              <label for="pagodoc">Pago Docente</label>
              <input disabled type="text" class="form-control" value="<?php echo $pagodoc;?>" id="pagodoc" name="pagodoc">
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


