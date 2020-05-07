		<form  role="form" method="post" action="view/ajax/agregar/agregar_general_gasto.php">
		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="gasto_fide_egresos">Id Nombre <?php echo $id ?></label>
			      <input class="form-control" type="number" value="<?php echo $id ?>" id="gasto_fide_egresos" name="gasto_fide_egresos">
			    </div>
			</div>
		    <div class="form-row" style="display: none;">
			    <div class="form-group col-md-6">
			      <label for="mes_id">Id MES </label>
			      <input class="form-control" type="number" value="1" id="mes_id" name="mes_id">
			    </div>
			</div>
		</form>
		<table class="table table-bordered table-striped" id="mytable">
	        <thead>
	        	<div id="adicionados"></div>
	            <tr>
	                <th>Acumulado</th>
	                <th>Cantidad</th>
	                <th>Observaciones</th>
	            </tr>
	         </thead>
			<?php
      		$rspta = mysqli_query($con, "SELECT * FROM gasto ORDER BY  id DESC");
	        $marcados = mysqli_query($con, "SELECT * FROM nombre_gasto WHERE fideicomisos_egresos=$id ");
            $valores=array();
            //while($row = mysqli_fetch_array($query)){
            while ($fideicomisos_egresos = $rspta->fetch_object()){
                $sw=in_array($fideicomisos_egresos->id,$valores);
	            if ($id == $fideicomisos_egresos->gasto_fide_egresos) {
                 ?>
	        <tbody>
	            <tr>
                <td><?php echo $fideicomisos_egresos->acumulado ?></td>
	            <td><?php echo $fideicomisos_egresos->cantidad ?></td>
                <td><?php echo $fideicomisos_egresos->observaciones ?></td>
	        </tbody>
				<?php
					     }else{

					     }
			            }

			        ?>
	    </table>