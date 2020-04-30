<!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="myModalLabel">Nombre</h4>
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