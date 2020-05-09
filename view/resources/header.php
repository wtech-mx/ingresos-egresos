<?php
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: ./?view=index");
    }

    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from empleado where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        $dni_empleado=$row['dni'];
        $imagen_empleado=$row['imagen'];
        $nombre_empleado=$row['nombre'];
        $apellido_empleado=$row['apellido'];
        $username_empleado=$row['username'];
        $email_empleado=$row['email'];
        $domicilio_empleado=$row['domicilio'];
        $localidad_empleado=$row['localidad'];
        $telefono_empleado=$row['telefono'];
        $celular_empleado=$row['celular'];
        $registro_empleado=$row['registro'];
        $status_empleado=$row['status'];
        $created_at_empleado=$row['created_at'];
    }

    $configuracion=mysqli_query($con, "select * from configuracion");
    $rw=mysqli_fetch_array($configuracion);
    $nombre_empresa=$rw['nombre'];
?><!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title><?php echo $nombre_empresa; ?></title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
      <link href="assets/css/style.min.css" rel="stylesheet">

</head>

<body>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>

                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                        data-feather="calendar" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                        a reminder that you have event</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="settings" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                        can customize this template
                                                        as you want</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>

                        <li class="nav-item d-actio d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $imagen_empleado ?>" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span
                                        class="text-dark"> <?php echo $nombre_empleado." ".$apellido_empleado; ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="./?view=perfil"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Mi Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./?view=logout"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Salir</a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php if ($_SESSION['dashboard']==1) { ?>
                        <li class="sidebar-item <?php if(isset($active1)){echo $active1;}?>">
                            <a class="sidebar-link sidebar-link" href="./?view=dashboard"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">MODULOS</span></li>


                        <?php if ($_SESSION['gasto']==1) { ?>
                       <li class="sidebar-item <?php if(isset($active11)){echo $active11;}?>">
                        <a class="sidebar-link has-arrow" href="./?view=gasto"
                                aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span
                                    class="hide-menu">Gastos Corriente
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">

                            <?php
                                $query=mysqli_query($con,"SELECT * from meses");
                                while ($row=mysqli_fetch_array($query)) {
                                    $mes=$row['mes'];
                                    $src_gasto=$row['src_gasto'];
                             ?>
                                <li class="sidebar-item">
                                    <a href="<?php echo $src_gasto ?>" class="sidebar-link">
                                        <span class="hide-menu"><?php echo $mes ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php  } ?>

                        <?php if ($_SESSION['Fideicomiso']==1) { ?>
                       <li class="sidebar-item <?php if(isset($active11)){echo $active11;}?>">
                        <a class="sidebar-link has-arrow" href="./?view=gasto"
                                aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span
                                    class="hide-menu">Fideicomiso
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">

                            <?php
                                $query=mysqli_query($con,"SELECT * from meses");
                                while ($row=mysqli_fetch_array($query)) {
                                    $mes=$row['mes'];
                                    $src_ingresos=$row['src_ingresos'];
                                    $src_egresos=$row['src_egresos'];
                             ?>
                                <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                                        aria-expanded="false"><span class="hide-menu"><?php echo $mes ?></span></a>
                                    <ul aria-expanded="false" class="collapse second-level base-level-line">
                                        <?php
                                        if ($mes=$row['mes'] != 'General') {
                                            ?>
                                        <li class="sidebar-item">
                                            <a href="<?php echo $src_ingresos ?>" class="sidebar-link">
                                                <span class="hide-menu"> Ingresos</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-item">
                                            <a href="<?php echo $src_egresos ?>" class="sidebar-link">
                                                <span class="hide-menu"> Egresos</span>
                                            </a>
                                        </li>
                                        <?php
                                        }else{
                                            ?>
                                        <li class="sidebar-item">
                                            <a href="?view=general_fideicomiso" class="sidebar-link">
                                                <span class="hide-menu"> Click aqui</span>
                                            </a>
                                        </li>    <?php
                                             }
                                         ?>

                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php  } ?>

                        <?php if ($_SESSION['Exedentes']==1) { ?>
                       <li class="sidebar-item <?php if(isset($active13)){echo $active13;}?>">
                        <a class="sidebar-link has-arrow" href="./?view=Exedentes"
                                aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span
                                    class="hide-menu">Exedentes
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item"><a href="./?view=Exedentes" class="sidebar-link"><span
                                            class="hide-menu"></span></a></li>

                                <li class="sidebar-item"><a href="./?view=Exedentes" class="sidebar-link"><span
                                            class="hide-menu"></span></a></li>
                            </ul>
                        </li>
                         <?php } ?>

                        <?php if ($_SESSION['Presupuesto-general']==1) { ?>
                       <li class="sidebar-item <?php if(isset($active14)){echo $active14;}?>">
                        <a class="sidebar-link has-arrow" href="./?view=Presupuesto-general"
                                aria-expanded="false"><i data-feather="feather" class="feather-icon"></i><span
                                    class="hide-menu">Presupuesto-general
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">
                                <li class="sidebar-item"><a href="./?view=Presupuesto-general" class="sidebar-link"><span
                                            class="hide-menu"></span></a></li>

                                <li class="sidebar-item"><a href="./?view=Presupuesto-general" class="sidebar-link"><span
                                            class="hide-menu"></span></a></li>
                            </ul>
                        </li>
                         <?php } ?>


                        <?php if ($_SESSION['empleados']==1) { ?>
                        <li class="sidebar-item <?php if(isset($active2)){echo $active2;}?>">
                            <a class="sidebar-link sidebar-link" href="./?view=empleados"aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i>
                                <span class="hide-menu">empleados</span></a>
                         </li>
                          <?php } ?>

                        <?php if ($_SESSION['taller']==1) { ?>
                        <li class="sidebar-item <?php if(isset($active4)){echo $active4;}?>">
                            <a class="sidebar-link sidebar-link" href="./?view=taller" aria-expanded="false">
                                <i data-feather="message-square" class="feather-icon"></i><span class="hide-menu">taller</span>
                            </a>
                         </li>
                          <?php } ?>

                        <?php if ($_SESSION['configuracion']==1) { ?>
                        <li class="sidebar-item <?php if(isset($active12)){echo $active12;}?>">
                            <a class="sidebar-link sidebar-link" href="./?view=configuracion"aria-expanded="false">
                                <i data-feather="message-square" class="feather-icon"></i><span class="hide-menu">configuracion</span>
                            </a>
                         </li>
                          <?php } ?>

                        <li class="list-divider"></li>
                    </ul>
                </nav>

            </div>
        </aside>

        <div class="page-wrapper">




