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
		}
	}
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">

        <div class="form-group col-md-6">
          <label class="mr-sm-2" for="partida">Selecciona Concepto</label>
          <select style="background-color: #fff" class="custom-select mr-sm-2" id="partida" name="partida">
            <option value="<?php echo $partida;?>"><?php echo $partida;?></option>
                <option value="1">Adquisición Directa</option>
                <option value="2">Restringida</option>
                <option value="3">Consolidada</option>
          </select>
        </div>

            <div class="form-group col-md-4">
          <label class="mr-sm-2" for="mes">Selecciona Mes</label>
          <select style="background-color: #fff" class="custom-select mr-sm-2" id="mes" name="mes">
            <option value="<?php echo $mes;?>"><?php echo $mes;?></option>
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
            if($partida == 1){
            $utilizar = $monto - $utilizado;
            ?>
            <div class="form-group col-md-6">
              <label for="utilizar">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar;?>" id="utilizar" name="utilizar">
            </div>
            <?php } ?>

            <?php
            if($partida == 2){
            $utilizar2 = $monto - $utilizado;
            ?>
            <div class="form-group col-md-6">
              <label for="utilizar2">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar2;?>" id="utilizar2" name="utilizar2">
            </div>
            <?php } ?>

            <?php
            if($partida == 3){
            $utilizar3 = $monto - $utilizado;
            ?>
            <div class="form-group col-md-6">
              <label for="utilizar3">Por utilizar</label>
              <input type="text" class="form-control" value="<?php echo $utilizar3;?>" id="utilizar3" name="utilizar3">
            </div>
            <?php } ?>
      </div>
