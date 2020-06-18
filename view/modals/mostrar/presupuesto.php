<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from presupuesto where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $gasto_code=$rw['gasto_code'];
            $monto=$rw['monto'];
            $partida=$rw['partida'];
            $utilizado=$rw['utilizado'];
            $utilizar=$rw['utilizar'];
            $utilizar2=$rw['utilizar2'];
            $utilizar3=$rw['utilizar3'];
            $mes=$rw['mes'];

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


                  if($partida == '1'){
                  $partida = 'Adquisición Directa';
                  }
                  if($partida == '2'){
                    $partida= 'Restringida';
                  }
                  if($partida == '3'){
                    $partida= 'Consolidada';
                  }
		}
	}
	else{exit;}

$rutaServ = "http://localhost/ingresos-egresos/";
?>


      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="monto">Monto</label>
              <input disabled type="text" class="form-control" id="monto" name="monto" value="<?php echo $monto;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Partida</label>
              <input disabled type="text" class="form-control" value="<?php echo $partida;?>" id="partida" name="partida">
            </div>
            <div class="form-group col-md-6">
              <label for="utilizado">Utilizado</label>
              <input disabled type="text" class="form-control" placeholder="<?php echo $utilizado;?>" value="<?php echo $utilizado;?>" id="utilizado" name="cantidad">
            </div>

          <?php if($partida == 'Adquisición Directa'){ ?>
            <div class="form-group col-md-6">
              <label for="utilizar">Utilizar</label>
              <input disabled type="text" class="form-control" value="<?php echo $utilizar;?>" id="utilizar" name="utilizar">
            </div>
          <?php } ?>

          <?php if($partida == 'Restringida'){ ?>
            <div class="form-group col-md-6">
              <label for="utilizar2">Utilizar</label>
              <input disabled type="text" class="form-control" value="<?php echo $utilizar2;?>" id="utilizar2" name="utilizar2">
            </div>
          <?php } ?>

          <?php if($partida == 'Consolidada'){ ?>
            <div class="form-group col-md-6">
              <label for="utilizar3">Utilizar</label>
              <input disabled type="text" class="form-control" value="<?php echo $utilizar3;?>" id="utilizar3" name="utilizar3">
            </div>
          <?php } ?>

            <div class="form-group col-md-6">
              <label for="mes">Mes</label>
              <input disabled type="text" class="form-control" value="<?php echo $mes;?>" id="mes" name="mes">
            </div>

      </div>


