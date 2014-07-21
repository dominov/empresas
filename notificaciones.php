<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Cimpre | Empresas</title>
   <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />

    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.donutRenderer.min.js"></script>
    <script type="text/javascript" src="js/jqPlot/plugins/jqplot.bubbleRenderer.min.js"></script>
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
  <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

          			setSidebarHeight();


        });
    </script>

</head>
<body>
    <div class="container_12">
<?php include_once("includes/cabecera.php"); ?>
<?php include_once("includes/navegacion.php"); ?>
<?php include_once("includes/menu_lateral.php");?>

        <div class="grid_10">
            <div class="box round first">
                <h2>Notifications</h2>
                
                <div class="block">
            
                                        <div class="message success">
                                <h5>Exito!</h5>
                                <p>
                                    Gracias por preferirnos, para nosotros es importante su satisfacci&oacute;n
                                </p>
                            </div>
                            <div class="message info">
                                <h5>Descargue los Conceptos</h5>
                                <p>
                                    Ahora ya puede descaragar los conceptos de sus trabajadores <a href="conceptos.php">Aqu&iacute;</a>
                                </p>
                            </div>

                            <div class="message warning">
                                <h5>Atenci&oacute;n!</h5>
                                <p>
Esta p&aacute;gina aun esta en Construcci&oacute;n, estamos trabajando lo m&aacute;s r&aacute;pido posible para brindarle todas las funcionalidades, Gracias por su paciencia
                                </p>
                            </div>
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
