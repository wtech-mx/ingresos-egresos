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
        $mes=$rw['mes'];
        $utilizar=$rw['utilizar'];
        $utilizar2=$rw['utilizar2'];
        $utilizar3=$rw['utilizar3'];

                  if($partida == '1'){
                  $partida = 'Adquisición Directa';
                  }
                  if($partida == '2'){
                    $partida= 'Restringida';
                  }
                  if($partida == '3'){
                    $partida= 'Consolidada';
                  }
                  if($mes == '1'){
                  $mes = 'Enero';
                  }
                  if($mes == '2'){
                    $mes= 'Febrero';
                  }
                  if($mes == '3'){
                    $mes= 'Marzo';
                  }
                  if($mes == '4'){
                    $mes= 'Abril';
                  }
                  if($mes == '5'){
                    $mes= 'Mayo';
                  }
                  if($mes == '6'){
                    $mes= 'Junio';
                  }
                  if($mes == '7'){
                    $mes= 'Julio';
                  }
                  if($mes == '8'){
                    $mes= 'Agosto';
                  }
                  if($mes == '9'){
                    $mes= 'Septiembre';
                  }
                  if($mes == '10'){
                    $mes= 'Octubre';
                  }
                  if($mes == '11'){
                    $mes= 'Noviembre';
                  }
                  if($mes == '12'){
                    $mes= 'Diciembre';
                  }
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

            <div class="form-group col-md-4">
          <label class="mr-sm-2" for="mes">Selecciona Mes</label>
          <select style="background-color: #fff" class="custom-select mr-sm-2" id="mes" name="mes" value="<?php echo $mes;?>">
                  <option style="background-color: #fff" selected><?php echo $mes;?></option>
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                  </select>
              </div>

            <div class="form-group col-md-6">
              <label for="monto">Monto</label>
              <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $monto;?>">
            </div>
            <div class="form-group col-md-6">
              <label for="utilizado">Utilizado</label>
              <input type="text" class="form-control" value="<?php echo $utilizado;?>" id="utilizado" name="utilizado">
            </div>

            <?php
            if($partida == 'Adquisición Directa'){
            $utilizar = $monto - $utilizado;
            ?>
            <div class="form-group col-md-6">
              <label for="utilizar">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar;?>" id="utilizar" name="utilizar">
            </div>
            <?php } ?>

            <?php
            if($partida == 'Restringida'){
            $utilizar2 = $monto - $utilizado;
            ?>
            <div class="form-group col-md-6">
              <label for="utilizar2">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar2;?>" id="utilizar2" name="utilizar2">
            </div>
            <?php } ?>

            <?php
            if($partida == 'Consolidada'){
            $utilizar3 = $monto - $utilizado;
            ?>
            <div class="form-group col-md-6">
              <label for="utilizar3">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar3;?>" id="utilizar3" name="utilizar3">
            </div>
            <?php } ?>
      </div>
