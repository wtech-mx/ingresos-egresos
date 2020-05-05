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
		}
	}
	else{exit;}

$rutaServ = "http://localhost/ingresos-egresos/";
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="personal" class="col-sm-4 control-label">Personal: </label>
    <div class="col-sm-8">
        <?php echo $personal;?>
    </div>
</div>
<div class="form-group">
    <label for="concepto" class="col-sm-4 control-label">Concepto: </label>
    <div class="col-sm-8">
        <?php echo $concepto;?>
    </div>
</div>

<div class="form-group">
    <label for="cantidad" class="col-sm-4 control-label">Cantidad: </label>
    <div class="col-sm-8">
        <?php echo $cantidad;?>
    </div>
</div>

<div class="form-group">
    <label for="observaciones" class="col-sm-4 control-label">Observaciones: </label>
    <div class="col-sm-8">
        <?php echo $observaciones;?>
    </div>
</div>

<div class="col-md-3">
        <div class="box box-primary"><!-- Profile Image -->
            <div class="box-body box-profile">
                <div id="load_img">
                    <img class=" img-responsive" src="<?php echo  $foto1;?>" alt="Foto del servicio" data-toggle="modal" data-target="#myModalq" style='cursor:pointer' width="50%" height="50%">
                </div>
               <br>
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