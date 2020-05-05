<?php
    $active4="active";
    include "resources/header.php";
    if ($_SESSION['gasto']==1){
    $mes = 5;
?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-3 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Gasto</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="./?view=gasto" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">gasto</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar por nombre" id='q' onkeyup="load(1);">
                        </div><!-- /input-group -->
                    </div>

                    <div class="col-auto">
                       <button class="btn btn-success " data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>
                    </div>

                   <div class="col-auto align-self-end">
                        <div class="customize-input float-right">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                            <option class='active' selected onclick='per_page(15);' id='15'><a href="#">15</a></option>
                            <option  onclick='per_page(25);' id='25'><a href="#">25</a></option>
                            <option onclick='per_page(50);' id='50'><a href="#">50</a></option>
                            <option onclick='per_page(100);' id='100'><a href="#">100</a></option>
                            <option onclick='per_page(1000000);' id='1000000'><a href="#">Todos</a></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-1">
                    <div id="loader" class="text-center"></div>
                </div>

                <div class="col-md-offset-10">
                    <!-- modals -->
                        <?php
                            include "modals/agregar/agregar_gasto.php";
                            include "modals/editar/editar_gasto.php";
                        ?>
                    <!-- /end modals -->
                    <input type='hidden' id='per_page' value='15'>
                </div>
            </div>

            <div id="resultados_ajax"></div>
            <div class="row">
                <div class="col-12 p-3">
                    <div class="card panel panel-default p-2">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos de los gastos</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="outer_div"></div><!-- Datos ajax Final -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section><!--main content end-->
<?php
    include "resources/footer.php";
?>

<script>
    $(function() {
        load(1);
    });

    function load(page){
        var query=$("#q").val();
        var per_page=$("#per_page").val();
        var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
        $("#loader").fadeIn('slow');
        $.ajax({
            url:'view/ajax/mayo_gasto_ajax.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loader").html("<img src='./assets/img/ajax-loader.gif'>");
          },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $("#loader").html("");
            }
        })
    }

    function per_page(valor){
        $("#per_page").val(valor);
        load(1);
        $('.dropdown-menu li' ).removeClass( "active" );
        $("#"+valor).addClass( "active" );
    }
</script>

<script>
    function eliminar(id){
        if(confirm('Esta acción  eliminará la informacion de gasto forma permanente al gasto \n\n Desea continuar?')){
            var page=1;
            var query=$("#q").val();
            var per_page=$("#per_page").val();
            var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};

            $.ajax({
                url:'view/ajax/gasto_ajax.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");
                    window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();});}, 5000);
                }
            })
        }
    }
</script>

<script>
    $( "#new_register" ).submit(function( event ) {
      $('#guardar_datos').attr("disabled", true);
     var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "view/ajax/agregar/agregar_nomgasto.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#resultados_ajax").html("Enviando...");
                  },
                success: function(datos){
                $("#resultados_ajax").html(datos);
                $('#guardar_datos').attr("disabled", false);
                load(1);
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});}, 5000);
                $('#formModal').modal('hide');
              }
        });
      event.preventDefault();
    })
</script>

<script>
    $( "#update_register" ).submit(function( event ) {
      $('#actualizar_datos').attr("disabled", true);
     var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "view/ajax/editar/editar_gasto.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#resultados_ajax").html("Enviando...");
                  },
                success: function(datos){
                $("#resultados_ajax").html(datos);
                $('#actualizar_datos').attr("disabled", false);
                load(1);
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});}, 5000);
                $('#modal_update').modal('hide');
              }
        });
      event.preventDefault();
    });
</script>
<script>
    function editar(id){
        var parametros = {"action":"ajax","id":id};
        $.ajax({
                url:'view/modals/editar/gasto.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader2").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div2").html(data).fadeIn('slow');
                    $("#loader2").html("");
                }
            })
    }
</script>

<?php
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush();
?>