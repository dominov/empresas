<?php
include_once ("seguridad.php");
include_once ("/controlador/Control_Comceptos.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Typography | BlueWhale Admin</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />

        <!-- BEGIN: load jquery -->
        <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
        <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
        <!-- END: load jquery -->
        <script type="text/javascript" src="js/table/table.js"></script>
        <script src="js/setup.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                setupLeftMenu();
                $('.datatable').dataTable();
                setSidebarHeight();
            });
        </script>
    </head>
    <body>
        <div class="container_12">
            <?php include_once("includes/cabecera.php"); ?>
            <?php include_once("includes/navegacion.php"); ?>
            <?php include_once("includes/menu_lateral.php"); ?>

            <div class="grid_10">
                <div class="box round first grid">
                    <h2>
                        Lista de Empleados </h2>
                    <div class="block">

                        <form action="/controlador/Control_Comceptos.php" method="post" id="fomulario_c">

                            <table class="data display datatable" id="example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Cedula</th>
                                        <th>Cargo</th>
                                        <th>ID</th>
                                    </tr>
                                </thead>
                                <?php mostrar_tabla_comceptos($empresa->getNIT()); ?>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
        <?php include("includes/pie.php"); ?>
    </body>
</html>
