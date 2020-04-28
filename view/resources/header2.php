                <ul class="nano-content">
                    <?php if ($_SESSION['dashboard']==1) { ?>
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="./?view=dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>


                    <?php } ?>
                    <?php if ($_SESSION['empleados']==1) { ?>
                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="./?view=empleados"><i class="fa fa-users"></i><span>Empleados</span></a>
                    </li>
                    <?php } ?>
                    <!-- <li class="<?php if(isset($active3)){echo $active3;}?>">
                        <a href="./?view=kind"><i class="fa fa-tag"></i><span>Kind</span></a>
                    </li> -->
                    <?php if ($_SESSION['taller']==1) { ?>
                    <li class="<?php if(isset($active4)){echo $active4;}?>">
                        <a href="./?view=taller"><i class="fa fa-indent"></i><span>Taller</span></a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['seguro']==1) { ?>
                    <li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="./?view=seguros"><i class="fa fa-lock"></i><span>Seguro</span></a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['gasto']==1) { ?>
                    <li class="<?php if(isset($active11)){echo $active11;}?>">
                        <a href="./?view=gasto"><i class="fa fa-code-fork"></i><span>Gatos Corriente</span></a>
                    </li>
                    <?php } ?>
                    <?php if ($_SESSION['configuracion']==1) { ?>
                    <li class="<?php if(isset($active12)){echo $active12;}?>">
                        <a href="./?view=configuracion"><i class="fa fa-cog"></i><span>Configuración</span></a>
                    </li>

                    <?php } ?>
                </ul>