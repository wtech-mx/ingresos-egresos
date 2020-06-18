<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from excedentes_ingresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $gasto_code=$rw['gasto_code'];
            $partida=$rw['partida'];
            $concepto=$rw['concepto'];
            $area=$rw['area'];
            $monto=$rw['monto'];
		}
	}
	else{exit;}

$rutaServ = "http://localhost/ingresos-egresos/";
?>


      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="partida">Partida</label>
              <input disabled type="text" class="form-control" id="partida" name="partida" value="<?php echo $partida;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Concepto</label>
              <input disabled type="text" class="form-control" value="<?php echo $concepto;?>" id="concepto" name="concepto">
            </div>

            <div class="form-group col-md-6">
              <label for="area">Area</label>
              <input disabled type="text" class="form-control" value="<?php echo $area;?>" id="area" name="area">
            </div>

            <div class="form-group col-md-6">
              <label for="monto">Monto</label>
              <input disabled type="text" class="form-control" value="<?php echo $monto;?>" id="monto" name="monto">
            </div>

      </div>


