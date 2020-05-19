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
                  <input type="file" class="custom-file-input" id="foto1" name="foto1">
                  <label class="custom-file-label" for="foto1">Archivo 1</label>
                </div>
                <a href="" class="img-responsive" data-toggle="modal" data-target="#myModal1" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto1;?>" style="width: 100%"></iframe >
                </a>

            </div>

            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto2" name="foto2">
                  <label class="custom-file-label" for="foto2">Archivo 2</label>
                </div>
                <a href="" class="img-responsive" data-toggle="modal" data-target="#myModal2" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe  class="img-responsive" type="application/pdf" src="<?php echo  $foto2;?>" style="width: 100%"></iframe >
                </a>
            </div>


      </div>

      <div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">

            <a href="" class="img-responsive" alt="Archivo 1" data-toggle="modal" data-target="#myModal1" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe type="application/pdf"  src="<?php echo  $foto1;?>" style="width: 150%;height: 750px"></iframe>
            </a>
                    </div>
                </div>
            </div>
        </div>

      <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">

            <a href="" class="img-responsive" alt="Archivo 2" data-toggle="modal" data-target="#myModal2" style="cursor:pointer;padding: 10px;background: #337AB7;overflow-y: hidden;overflow-x: hidden;">
                    <iframe type="application/pdf"  src="<?php echo  $foto2;?>" style="width: 150%;height: 750px"></iframe>
            </a>
                    </div>
                </div>
            </div>
        </div>