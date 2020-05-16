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
      </div>

<div class="col-md-12">
        <div class="box box-primary"><!-- Profile Image -->
            <div class="box-body box-profile">
                <div id="load_img">
                    <img class=" img-responsive" src="<?php echo  $foto1;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModalq" style='cursor:pointer' width="50%" height="50%">
                </div>

                <div id="myModalq" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="<?php echo $foto1;?>" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>