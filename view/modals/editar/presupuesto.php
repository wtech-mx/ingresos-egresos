<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="SELECT * FROM presupuesto where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
        $id=$rw['id'];
        $monto=$rw['monto'];
        $utilizado=$rw['utilizado'];
        $partida=$rw['partida'];
        $utilizar=$rw['utilizar'];
		}
	}
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="partida">Partida</label>
              <input type="text" class="form-control" value="<?php echo $partida;?>" id="partida" name="partida">
            </div>
            <div class="form-group col-md-6">
              <label for="monto">Monto</label>
              <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $monto;?>">
            </div>
            <div class="form-group col-md-6">
              <label for="utilizado">Utilizado</label>
              <input type="text" class="form-control" value="<?php echo $utilizado;?>" id="utilizado" name="utilizado">
            </div>

            <?php $utilizar = $monto - $utilizado; ?>
            <div class="form-group col-md-6">
              <label for="utilizar">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar;?>" id="utilizar" name="utilizar">
            </div>


      </div>
