<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="SELECT * FROM fideicomiso_ingresos where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
        $id=$rw['id'];
        $ingresos=$rw['ingresos'];
        $servicio=$rw['servicio'];
         $pagodoc=$rw['pagodoc'];
         $total=$rw['total'];

		}
	}
	else{exit;}

?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">

            <div class="form-group col-md-12" style="display: none;">
              <label for="servicio">servicio</label>
              <input type="number" class="form-control" id="servicio" name="servicio" value="<?php echo $servicio;?>">
            </div>

            <div class="form-group col-md-12">
              <label for="ingresos">Ingreso</label>
              <input type="number" class="form-control" id="ingresos" name="ingresos" value="<?php echo $ingresos;?>">
            </div>

 <?php
                if($servicio == 1 || $servicio == 3){
                  $Porcentaje = $servicio * 0.15;
                  $Total = $servicio - $Porcentaje;
                  echo "";
                }else if($servicio == 2){
                  $Porcentaje = $servicio * 0.15;
                  $Total = $servicio - $Porcentaje;
                  $Divison = $Total /3;
                  ?>

            <div class="form-group col-md-6">
              <label for="pagodoc">Pago Docente</label>
              <input type="number" class="form-control" id="pagodoc" name="pagodoc" value="<?php echo $Divison;?>">
          </div>
          <?php
          }

        if($servicio == 1 || $servicio == 3){ ?>

        <div class="form-group col-md-6">
          <label for="total">Total</label>
          <input type="number" class="form-control" id="total" name="total" value="<?php echo $Total; ?>">
        </div>
<?php
                 }else if($servicio == 2){
                  $Porcentaje = $servicio * 0.15;
                  $Total = $servicio - $Porcentaje;
                  $Divison = $Total /3;
                  $RestanteTotal = $Divison *2;
                  ?>
        <div class="form-group col-md-6">
          <label for="total">Total</label>
          <input type="number" class="form-control" id="total" name="total" value="<?php echo $RestanteTotal; ?>">
        </div>
          <?php
          }
           ?>

      </div>

      <div class="form-row">
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen2">
                  <label class="custom-file-label" for="Imagen2">Imagen2</label>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Imagen3">
                  <label class="custom-file-label" for="Imagen3">Imagen3</label>
                </div>
            </div>
      </div>

