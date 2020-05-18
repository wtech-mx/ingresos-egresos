<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="SELECT * FROM excedentes_ingresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
        $id=$rw['id'];
        $gasto_code=$rw['gasto_code'];
        $partida=$rw['partida'];
        $concepto=$rw['concepto'];
        $monto=$rw['monto'];
        $area=$rw['area'];
        $porcentaje=$rw['porcentaje'];

		}
	}
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">
            <div class="form-group col-md-6">
              <label for="partida">partida</label>
              <input type="text" class="form-control" id="partida" name="partida" value="<?php echo $partida;?>">
            </div>

            <div class="form-group col-md-6">
              <label for="gasto">Concepto</label>
              <input type="text" class="form-control" value="<?php echo $concepto;?>" id="concepto" name="concepto">
            </div>

            <div class="form-group col-md-6">
              <label for="area">area</label>
              <input type="text" class="form-control" value="<?php echo $area;?>" id="area" name="area">
            </div>

            <div class="form-group col-md-6">
              <label for="monto">monto</label>
              <input type="text" class="form-control" placeholder="<?php echo $monto;?>" value="<?php echo $monto;?>" id="monto" name="monto">
            </div>

            <div class="form-group col-md-12">
              <label class="mr-sm-2" for="porcentaje"></label>
              <select class="custom-select mr-sm-2" id="porcentaje" name="porcentaje">
                            <?php if ($porcentaje == 1){ ?>
                            <?php $porcentaje = '70%'?>
                            <option value=" <?php $porcentaje ?> "> <?php echo $porcentaje ?> </option>
                            <option value="2">30%</option>
                          <?php }else{  ?>
                            <?php $porcentaje = '30%'?>
                            <option value=" <?php $porcentaje ?> "> <?php echo $porcentaje ?> </option>
                            <option value="1">70%</option>
                          <?php
                          }
                          ?>


                      </select>
                  </div>
            </div>

