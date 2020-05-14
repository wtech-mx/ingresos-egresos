<?php

    $url = $_SERVER["REQUEST_URI"];
 ?>
<!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="myModalLabel">Agregar Nombre Ingereso Fideicomiso</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <!-- form  -->
                <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
                            <div class="col-sm-12">
                                <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre: ">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" style="display: none;">
                        <div class="form-group">
                            <label for="id_mes_nomfide" class="col-sm-2 control-label">id_mes_nomfide:</label>
                            <div class="col-sm-12">
                                <input type="text" required class="form-control" value="<?php echo $mes ?>" id="id_mes_nomfide" name="id_mes_nomfide" placeholder="id_mes_nomfide: ">
                            </div>
                        </div>
                    </div>



                    <div class="modal-body" style="display: none;">
                        <div class="form-group">
                            <label for="id_ingresos" class="col-sm-2 control-label">id_ingresos:</label>
                            <div class="col-sm-12">
                                <input type="text" required class="form-control" value="1" id="id_ingresos" name="id_ingresos" placeholder="id_ingresos: ">
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close</button>
                         <button type="submit" id="guardar_datos" class="btn btn-success">Agregar</button>
                    </div>
                </form>
                <!-- /end form  -->
            </div>
        </div>

    </div>
    <!-- End Form Modal -->