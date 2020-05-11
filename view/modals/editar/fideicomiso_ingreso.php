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
         $pagodoc=$rw['pagodoc'];
         $total=$rw['total'];

		}
	}
	else{exit;}

if($fideicomiso_ingresos->servicio == 'Analisis' || $fideicomiso_ingresos->servicio == 'Odontologia'){
                  $Porcentaje = $fideicomiso_ingresos->ingresos * 0.15;
                  $Total = $fideicomiso_ingresos->ingresos - $Porcentaje;
                  echo "";
                }else if($fideicomiso_ingresos->servicio == 'Seminario'){
                  $Porcentaje = $fideicomiso_ingresos->ingresos * 0.15;
                  $Total = $fideicomiso_ingresos->ingresos - $Porcentaje;
                  $Divison = $Total /3;
          }
          if($fideicomiso_ingresos->servicio == 'Analisis' || $fideicomiso_ingresos->servicio == 'Odontologia'){ ?>

          <input disabled value="<?php echo $Total; ?>" id="total" name="total" style="background-color: #F4F8FB;border: 0px #F4F8FB">
           <?php
                }else if($fideicomiso_ingresos->servicio == 'Seminario'){
                  $Porcentaje = $fideicomiso_ingresos->ingresos * 0.15;
                  $Total = $fideicomiso_ingresos->ingresos - $Porcentaje;
                  $Divison = $Total /3;
                  $RestanteTotal = $Divison *2;
                  ?>
          <input disabled value="<?php echo $RestanteTotal; ?>" id="total" name="RestanteTotal" style="background-color: #F4F8FB;border: 0px #F4F8FB">
          <?php
          }
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
      <div class="form-row">
            <div class="form-group col-md-12">
              <label for="ingresos">Ingreso</label>
              <input type="number" class="form-control" id="ingresos" name="ingresos" value="<?php echo $ingresos;?>">
            </div>
            <div class="form-group col-md-6">
          <label for="pagodoc">Pago Docente</label>
          <input type="number" class="form-control" id="pagodoc" name="pagodoc" value="<?php echo $pagodoc;?>">
        </div>

        <div class="form-group col-md-6">
          <label for="total">Total</label>
          <input type="number" class="form-control" id="total" name="total" value="<?php echo $total;?>">
        </div>
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

