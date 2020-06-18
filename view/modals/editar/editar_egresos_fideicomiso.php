<!-- Form Modal -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

   <!--  <form class="form-horizontal" role="form" method="post" id="update_register" name="update_register" enctype="multipart/form-data"> -->
    <form  role="form" method="post" action="view/ajax/editar/editar_fideicomiso_egreso.php" enctype="multipart/form-data">

        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="myModalLabel">Editar Fideicomisos</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div id="loader2" class="text-center"></div>
                <div class="outer_div2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="actualizar_datos" class="btn btn-success">Actualizar</button>
            </div>
        </div>
    </form>
    </div>
</div>
<!-- End Form Modal -->