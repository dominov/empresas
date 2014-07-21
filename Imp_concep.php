<?php
require_once('otros/signup.commonvision.php');
require_once './logica/Herramientas.php';
require_once './seguridad.php';
date_default_timezone_set('America/Bogota');
$fecha = date("Y-m-d");


if (isset($_REQUEST["c"])) {
$caso = Herramientas::desencriptar($_REQUEST["c"], $empresa->getNIT());
    $case = $objparams->obtenerCasopen2($caso);
    $paciente = $objparams->obtenerPacienteocu($caso);
    $apertura = $objparams->obtenerApertura($caso);
    $anteante = $objparams->obtenerAntecedentesante($caso);
    $anteactu = $objparams->obtenerAntecedentesdes($caso);
    $antefam = $objparams->obtenerAntecedentesfam($caso);
    $examen = $objparams->obtenerExamen($caso);
    $diagnostico = $objparams->obtenerDiagnostico($caso);
}
echo '<?xml version="1.0" encoding="UTF-8"';
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php $xajax->printJavascript(); ?>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <style type="text/css">
            @media print {
                #boton {display:none}
                #boton2 {display:none}

            }
        </style>

        <script src="jquery-1.7.1.js"></script>

        <link rel="stylesheet" href="CSS/demos.css">
            <title>Hoja de Conceptos-->Paciente-->  <?php echo $paciente[1] . " " . $paciente[2] . " " . $paciente[5]; ?></title>
            <script type="text/javascript">
                function submitSignup()
                {
                    xajax.$('boton').disabled = true;
                    xajax.$('boton').value = "please wait...";
                    xajax_processAccountData(xajax.getFormValues("historiaocupacional"));
                    return false;
                }

            </script>
            <script type="text/javascript">

                function usalentes2() {
                    if (document.getElementById("usalentes").value == 'SI') {
                        document.getElementById("tipolentes").style.visibility = 'visible';
                    } else {
                        document.getElementById("tipolentes").style.visibility = 'hidden';
                    }
                }
                function cerrar() {
                    if (confirm("Esta Seguro que desea cerrar la ventana, Si lo hace se perderan los datos que lleno temporalmente, ¿Desea cerrarla?")) {
                        window.close();
                    } else {

                    }
                }
                function cerrar2() {

                    window.close();

                }
                function myprint() {
                    window.print();

                }

                function redireccionar() {
                    window.location = "conceptos.php";
                }
            </script>
            <script type="text/javascript" src="combo.js"></script>
            <style type="text/css">
                .search-item{
                    border:1px solid #fff;
                    padding:3px;
                    background-position:right bottom; 
                    background-repeat:no-repeat;
                }
                .desc{	
                    padding-right:10px;
                }
                .name{	
                    font-size:16px !important;
                    color:#000022;	
                }

            </style>
            <script language="JavaScript" src="calendar_us.js"></script>
            <link rel="stylesheet" href="calendar.css">
                </head>

                <body>
                    <div id="accordion">

                        <?php if (isset($_REQUEST["c"])) {
                            if ($case[22] == "") {
                                ?>
                                <br />
                                <table border='5' cellspacing='0' bordercolor='#FFFF00' style='table-layout:auto' height='100px' width='200px' align='center' >
                                    <tr>
                                        <td width="900" bgcolor="#F4F0D5" bgcolor="#000033"><font color="#000000" size="+1"><center><?php echo "La Historia Clinica Ocupacionnal para el caso No." . $case[0] . " no fue realizada, Por lo cual no se puede imprimir la Hoja de Conceptos.<br />Comuniquese con el Administrador del Sistema."; ?></center></font></td>
                                    </tr>
                                </table>
                                <script>
                        setTimeout("redireccionar()", 8000);
                                </script>
                                <style>
                                    body{background:#FF0000}
                                </style><?php
                            } else {
                                ?>
                                <form action="javascript:void(null);" onsubmit="submitSignup();" id="historiaocupacional">
                                    <table style="border-top:0px;" id="cedula24"  border="0" cellspacing="0">
                                        <tr>
                                            <td width="400">
                                                <img src="img/cimpre.png" width="300" height="100" />
                                            </td>
                                            <td align="left">
                                                <font style="font:Comic Sans MS" color="#000000" size="+2"><b>CONCEPTO DE APTITUD LABORAL</b></font>
                                            </td>
                                        </tr>
                                    </table>
                                    <table style="border-top:0px;" id="cedula24"  border="2" cellspacing="0" >
                                        <tr>

                                            <td colspan="2" bgcolor="#FFFFFF" width="350">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Nombre(s):</b>
                                                    <?php echo strtoupper($paciente[1] . " " . $paciente[2]); ?>
                                                </font>
                                            </td>
                                            <td bgcolor="#FFFFFF" width="320">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Ciudad:</b>
                                                    <?php
                                                    $ciudad = $objparams->obtenerCiudadid($apertura[2]);
                                                    echo strtoupper($ciudad[1]);
                                                    ?>
                                                </font>
                                            </td>
                                            <td bgcolor="#FFFFFF" width="232">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Dpto:</b>
                                                    <?php
                                                    $dpto = $objparams->obtenerDptoid($apertura[3]);
                                                    echo strtoupper($dpto[1]);
                                                    ?>
                                                </font>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#FFFFFF">
                                            <td colspan="2">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>C.C. No:&nbsp;</b><?php echo $paciente[5]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Caso No.&nbsp;</b><?php echo $case[0]; ?></font>

                                            </td>

                                            <td>
                                                <?php
//fecha actual 

                                                $dia = date('j');
                                                $mes = date('n');
                                                $ano = date('Y');

//fecha de nacimiento 

                                                $dianaz = substr($paciente[14], 0, 2);
                                                $mesnaz = substr($paciente[14], 3, 2);
                                                $anonaz = substr($paciente[14], 6, 9);

                                                if (($mesnaz == $mes) && ($dianaz > $dia)) {
                                                    $ano = ($ano - 1);
                                                }

                                                if ($mesnaz > $mes) {
                                                    $ano = ($ano - 1);
                                                }

                                                $edad = ($ano - $anonaz);
                                                ?> 
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Edad:&nbsp;</b><?php echo $edad; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha Valoración:&nbsp;</b><?php echo $case[23]; ?></font>

                                            </td>
                                            <td>
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Fecha de impresión:&nbsp;</b><?php ?> <?php echo $fecha; ?></font>

                                            </td>
                                        </tr>
                                        <tr bgcolor="#FFFFFF">
                                            <td colspan="2">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Empresa:&nbsp;</b>
                                                    <?php
                                                    $em = $objparams->obtenerEmpresa($paciente[17]);
                                                    echo strtoupper($em[0]);
                                                    ?></font>
                                            </td>
                                            <td colspan="2">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b><?php echo "Actividad Economica: "; ?></b> </font>


                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><?php echo strtoupper($apertura[5]); ?></font>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#FFFFFF">
                                            <td>
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Cargo Actual:&nbsp;</b><?php if ($paciente[11] != "") {
                                                if (is_numeric($paciente[11])) {
                                                    $car = $objparams->obtenerCargo($paciente[11]);
                                                    echo strtoupper($car[1]);
                                                } else {
                                                    echo strtoupper($paciente[11]);
                                                }
                                            } else {
                                                echo strtoupper($paciente[18]);
                                            } ?></font>
                                            </td>
                                            <td colspan="2">
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Cargo a Desempeñar:&nbsp;</b><?php echo strtoupper($apertura[6]); ?></font>
                                            </td>
                                            <td>
                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Antiguedad:&nbsp;</b><?php echo strtoupper($apertura[7]); ?></font>
                                            </td>
                                        </tr>
                                    </table>
        <?php if ($apertura[10] == "periodo") { ?>
                                        <table id="tablepe"   border="2" cellspacing="0" >
                                            <tr>
                                                <td  width="456" bgcolor="#FFCC99" colspan="4">
                                                    <center><font style="font:Comic Sans MS" color="#000000" size="-1"><b>EXAMEN PERIODICO&nbsp;</b>
                                                        </font></center>
                                                </td>
                                            </tr>
        <?php } else { ?>
                                            <h3><a id="exname" style="display:none" href="#">EXAMEN PERIODICO</a></h3>
                                            <table id="tablepe" style="display:none"   border="2" cellspacing="0" >
        <?php } ?>
                                            <tr>
                                                <td>
                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Satisfactorio</b></font>
                                                </td>
                                                <td width="567">
                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[35] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[35]);
        } ?></font>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Se debe reasignar funciones, analizar puesto de trabajo</b></font>
                                                </td>
                                                <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[36] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[36]);
        } ?></font></td>
                                            </tr>
                                            <tr style="display:none">
                                                <td>
                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Secuela de accidentes de trabajo</b></font>
                                                </td>
                                                <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[37] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[37]);
        } ?></font></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Signos de enfermedad profesional que deben ser valorados por su EPS</b></font>
                                                </td>
                                                <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[38] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[38]);
        } ?><b> <?php echo "Cuál(es):"; ?>&nbsp;</b> <?php echo strtoupper($diagnostico[39]); ?></font></td>
                                            </tr>
                                        </table>

        <?php if (($apertura[10] == "ingreso") || ($apertura[10] == "examena")) { ?>

                                            <table id="tablepe2"    border="2" cellspacing="0" >
                                                <tr>
                                                    <td  width="456" bgcolor="#FFCC99" colspan="4">
                                                        <center><font style="font:Comic Sans MS" color="#000000" size="-1"><b>EXAMEN DE <?php if ($apertura[10] == "ingreso") {
                echo strtoupper($apertura[10]);
            } else {
                echo "ALTURA";
            } ?>&nbsp;</b>
                                                            </font></center>
                                                    </td>
                                                </tr>
        <?php } else { ?>
                                                <h3><a id="exname2" style="display:none" href="#">EXAMEN DE <?php if ($apertura[10] == "ingreso") {
                echo strtoupper($apertura[10]);
            } else {
                echo "ALTURA";
            } ?></a></h3>
                                                <table id="tablepe2" style="display:none"   border="2" cellspacing="0" >
        <?php } ?>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Apto</b></font>
                                                    </td>
                                                    <td width="567">	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[43] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[43]);
        } ?></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Apto para trabajo en altura</b></font>
                                                    </td>
                                                    <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[44] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[44]);
        } ?></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Apto para trabajos confinados</b></font>
                                                    </td>
                                                    <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[55] == "noaplica") {
                                            echo "NO APLICA";
                                        } else {
                                            echo strtoupper($diagnostico[55]);
                                        } ?></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Apto con limitaciones que no interfieren con el trabajo</b></font>
                                                    </td>
                                                    <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[45] == "noaplica") {
                                            echo "NO APLICA";
                                        } else {
                                            echo strtoupper($diagnostico[45]);
                                        } ?></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>No apto temporalmente aplazado</b></font>
                                                    </td>
                                                    <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[46] == "noaplica") {
                                            echo "NO APLICA";
                                        } else {
                                            echo strtoupper($diagnostico[46]);
                                        } ?></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Requiere examenes complementarios</b></font>
                                                    </td>
                                                    <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[47] == "noaplica") {
                                            echo "NO APLICA";
                                        } else {
                                            echo strtoupper($diagnostico[47]);
                                        } ?><b> <?php echo "Cuál(es):"; ?>&nbsp;</b> <?php echo strtoupper($diagnostico[49]); ?></font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <font style="font:Comic Sans MS" color="#000000" size="-1"><b>No apto para el trabajo que aspira</b></font>
                                                    </td>
                                                    <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[48] == "noaplica") {
                                            echo "NO APLICA";
                                        } else {
                                            echo strtoupper($diagnostico[48]);
                                        } ?></font></td>
                                                </tr>
                                            </table>
                                                                <?php if ($apertura[10] == "retiro") { ?>
                                                <table id="tablepe3"    border="2" cellspacing="0" >
                                                    <tr>
                                                        <td  width="456" bgcolor="#FFCC99" colspan="4">
                                                            <center><font style="font:Comic Sans MS" color="#000000" size="-1"><b>EXAMEN DE RETIRO&nbsp;</b>
                                                                </font></center>
                                                        </td>
                                                    </tr>
        <?php } else { ?>
                                                    <h3><a id="exname3" style="display:none" href="#">EXAMEN DE RETIRO</a></h3>
                                                    <table id="tablepe3" style="display:none"   border="2" cellspacing="0" >
        <?php } ?>

                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Satisfactorio</b></font>
                                                        </td>
                                                        <td width="567">	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[50] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[50]);
        } ?></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Con limitaciones que deben ser valoradas por su EPS</b></font>
                                                        </td>
                                                        <td><font style="font:Comic Sans MS" color="#000000" size="-1">	<?php if ($diagnostico[51] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[51]);
        } ?></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Signos de enfermedad profesional que deben ser evaluados por su EPS</b></font>
                                                        </td>
                                                        <td><font style="font:Comic Sans MS" color="#000000" size="-1">	<?php if ($diagnostico[52] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[52]);
        } ?><b> <?php echo "Cuál(es):"; ?>&nbsp;</b> <?php echo strtoupper($diagnostico[54]); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Se realizó examen medico</b></font>
                                                        </td>
                                                        <td>	<font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($diagnostico[53] == "noaplica") {
            echo "NO APLICA";
        } else {
            echo strtoupper($diagnostico[53]);
        } ?></td>
                                                    </tr>
                                                </table>

                                                <table  border="2" cellspacing="0" >
                                                    <tr bgcolor="#FFCC99">
                                                        <td width="224">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><center>EXAMENES <?php echo "PARACLÍNICOS "; ?></center></b></font>
                                                        </td>
                                                        <TD width="110">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><center>FECHA</center></b></font>
                                                        </TD>
                                                        <TD width="80">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><center>ESTADO</center></b></font>
                                                        </TD>
                                                        <TD width="485">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><center>OBSERVACIONES</center></b></font>
                                                        </TD>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><?php echo "Visiometría"; ?> :</b></font>
                                                        </td>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[13] == "") { ?>&nbsp;<?php
        } else {
            $anonaz = substr($case[14], 0, 4);
            $mesnaz = substr($case[14], 5, 2);
            $dianaz = substr($case[14], 8, 2);
            echo $anonaz . "-" . $mesnaz . "-" . $dianaz;
        }
        ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if (($case[13] == "") || ($case[13] == "No Aplica")) {
                                                echo "No Aplica";
                                            } else {
                                                $visio = $objparams->obtenerVisiometria($case[0]);
                                                echo strtoupper($visio[35]);
                                            } ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[13] == "") { ?>&nbsp;<?php } else {
                                                        $visio = $objparams->obtenerVisiometria($case[0]);
                                                        echo $visio[29];
                                                    } ?></font>
                                                        </TD>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><?php echo "Audiometría"; ?>:</b></font>
                                                        </td>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[16] == "") { ?>&nbsp;<?php
                                        } else {
                                            $anonaz = substr($case[17], 0, 4);
                                            $mesnaz = substr($case[17], 5, 2);
                                            $dianaz = substr($case[17], 8, 2);
                                            echo $anonaz . "-" . $mesnaz . "-" . $dianaz;
                                        }
                                        ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if (($case[16] == "") || ($case[16] == "No Aplica")) {
                                            echo "No Aplica";
                                        } else {
                                            $audio = $objparams->obtenerAudiometria($case[0]);
                                            echo strtoupper($audio[24]);
                                        } ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[16] == "") { ?>&nbsp;<?php } else {
                                            $audio = $objparams->obtenerAudiometria($case[0]);
                                            echo $audio[19];
                                        } ?></font>
                                                        </TD>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><?php echo "Espirometría"; ?> :</b></font>
                                                        </td>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[10] == "") { ?>&nbsp;<?php
                                                        } else {
                                                            $anonaz = substr($case[11], 0, 4);
                                                            $mesnaz = substr($case[11], 5, 2);
                                                            $dianaz = substr($case[11], 8, 2);
                                                            echo $anonaz . "-" . $mesnaz . "-" . $dianaz;
                                                        }
                                                        ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if (($case[10] == "") || ($case[10] == "No Aplica")) {
                                                            echo "No Aplica";
                                                        } else {
                                                            $espi = $objparams->obtenerEspirometria($case[0]);
                                                            echo strtoupper($espi[8]);
                                                        } ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[10] == "") { ?>&nbsp;<?php } else {
                                                            $espi = $objparams->obtenerEspirometria($case[0]);
                                                            echo $espi[3];
                                                        } ?></font>
                                                        </TD>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Electrocardiograma:</b></font>
                                                        </td>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[7] == "") { ?>&nbsp;<?php
                                                        } else {
                                                            $anonaz = substr($case[8], 0, 4);
                                                            $mesnaz = substr($case[8], 5, 2);
                                                            $dianaz = substr($case[8], 8, 2);
                                                            echo $anonaz . "-" . $mesnaz . "-" . $dianaz;
                                                        }
        ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if (($case[7] == "") || ($case[7] == "No Aplica")) {
                                                            echo "No Aplica";
                                                        } else {
                                                            $ele = $objparams->obtenerElectro($case[0]);
                                                            echo strtoupper($ele[22]);
                                                        } ?></font>
                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if ($case[7] == "") { ?>&nbsp;<?php } else {
                                                            $ele = $objparams->obtenerElectro($case[0]);
                                                            echo $ele[17];
                                                        } ?></font>
                                                        </TD>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Laboratorio <?php echo "Clínico"; ?> :</b></font>
                                                        </td>
                                                        <TD>&nbsp;

                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><?php if (($case[19] == "") || ($case[19] == "noaplica")) {
                                                            echo "No Aplica";
                                                        } else {
                                                            
                                                        } ?></font>
                                                        </TD>
                                                        <TD>&nbsp;

                                                        </TD>
                                                    </tr>
        <?php
        if (($case[19] == "") || ($case[19] == "noaplica")) {
            
        } else {
            $consulta = $objparams->obtenerLaboratorios2($caso);
            while ($rows = mysql_fetch_array($consulta)) {
                ?>
                                                            <tr bgcolor="#FFFFFF">
                                                                <td>
                                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><?php echo strtoupper("-------->" . $rows[8]); ?> </font>
                                                                </td>
                                                                <TD>
                                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><?php
                                                        $anonaz = substr($rows[4], 0, 4);
                                                        $mesnaz = substr($rows[4], 5, 2);
                                                        $dianaz = substr($rows[4], 8, 2);
                                                        echo $anonaz . "-" . $mesnaz . "-" . $dianaz;
                                                        ?></font>
                                                                </TD>
                                                                <td>
                                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"><?php echo strtoupper("" . $rows[9]); ?></font> 
                                                                </td>
                                                                <td>
                                                                    <font style="font:Comic Sans MS" color="#000000" size="-1"> <?php echo "" . $rows[3]; ?></font> 
                                                                </td>
                                                            </tr>
            <?php
            }
        }
        ?>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Otros:</b></font>
                                                        </td>
                                                        <TD>&nbsp;

                                                        </TD>
                                                        <TD>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"></font>
                                                        </TD>
                                                        <TD>&nbsp;

                                                        </TD>
                                                    </tr>
        <?php
        $consulta = $objparams->obtenerOtros($caso);
        while ($rows = mysql_fetch_array($consulta)) {
            ?>
                                                        <tr bgcolor="#FFFFFF">
                                                            <td>
                                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><?php echo strtoupper("-------->" . $rows[8]); ?> </font>
                                                            </td>
                                                            <TD>
                                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><?php
            $anonaz = substr($rows[4], 0, 4);
            $mesnaz = substr($rows[4], 5, 2);
            $dianaz = substr($rows[4], 8, 2);
            echo $anonaz . "-" . $mesnaz . "-" . $dianaz;
            ?></font>
                                                            </TD>
                                                            <td>
                                                                <font style="font:Comic Sans MS" color="#000000" size="-1"><?php echo strtoupper("" . $rows[9]); ?></font> 
                                                            </td>
                                                            <td>
                                                                <font style="font:Comic Sans MS" color="#000000" size="-1"> <?php echo "" . $rows[3]; ?></font> 
                                                            </td>
                                                        </tr>
        <?php }
        ?>
                                                </table>
                                                <table id="lejosexsinlentes"  border="2" cellspacing="0" >
                                                    <tr>
                                                        <td  width="910" colspan="4">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2">- Por favor describir las observaciones por las cuales: <br />
                                                                - El aspirante es apto con restricciones o con enfermedades que no interfieren con capacidad laboral, o no es apto, o el motivo del aplazamiento.
                                                                <br />
                                                                - Se debe reubicar o reasignar funciones, procedimientos, por secuelas de accidentes de trabajo o conducta por signos y sintomas de enfermedad profesional y/o recomendaciones por examen satisfactorio..<br />
                                                                - Hay limitaciones que deben ser valoradas por la E.P.S., procedimientos por secuelas de accidente de trabajo o conducta por signos y sintomas de enfermedad profesional y/o recomendaciones por examen satisfactorio. 
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  width="456" bgcolor="#FFCC99" colspan="4">
                                                            <center><font style="font:Comic Sans MS" color="#000000" size="-1"><b>RECOMENDACIONES LABORALES Y PARA LOS SISTEMAS DE VIGILANCIA EPIDEMIOLOGICA</b>
                                                                </font></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  width="900" height="80" colspan="4">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2">
        <?php if ($diagnostico[34] == "") {
            
        } else {
            echo strtoupper($diagnostico[34]);
            echo "<br />";
        } ?>
        <?php if ($antefam[81] == "") {
            
        } else {
            echo strtoupper($antefam[81]);
            echo "<br />";
        } ?>
                                                <?php if ($antefam[82] == "") {
                                                    
                                                } else {
                                                    echo strtoupper($antefam[82]);
                                                    echo "<br />";
                                                } ?>
        <?php if ($antefam[83] == "") {
            
        } else {
            echo strtoupper($antefam[83]);
            echo "<br />";
        } ?>
        <?php if ($antefam[84] == "") {
            
        } else {
            echo strtoupper($antefam[84]);
            echo "<br />";
        } ?>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br />

                                                <table id="lejosexsinlentes"  border="2" cellspacing="0" >
                                                    <tr>
                                                        <td  width="200" colspan="4">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b>Fecha Nueva Valoración Medica </b></font>
                                                        </td>
                                                        <td  width="100" colspan="4">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-1"><b><?php echo strtoupper($diagnostico[40]); ?> </b></font>
                                                        </td>
                                                        <td  width="600" colspan="4">
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2">Acepto los resultados y conceptos del presente examen. Este documento es confidencial de reserva profesional, salvo cuando lo ordenen el mando judicial, por autorización expresa, escrita y firmada por el profesional. o por autoridades competentes de Previsión y Seguridad Social. Resolución 2346 - 2007 Art. 16</font>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br />

                                                <table style="border-bottom:none; border-top:none; border-left:none; border-right:none" border="1" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="border-bottom:none; border-top:none; border-left:none; border-right:none" width="350">
                                                            <img width="200" height="50" src="img/firma.png" />

                                                        </td>
                                                        <td style="border-bottom:none; border-top:none; border-left:none; border-right:none" width="80">

                                                        </td>
                                                        <td style="border-bottom:none; border-top:none; border-left:none; border-right:none" width="350">
                                                            <img width="200" height="50" src="<?php echo "../historia/firmas/" . $paciente[5] . "/" . $paciente[30] . ""; ?>" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-bottom:none; border-left:none; border-right:none" >
                                                            <font style="font: Arial, Helvetica, sans-serif" face="Arial, Helvetica, sans-serif" color="#000000" size="-2">Firma Médico&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registro No. <?php
        $numero = "";
        switch (strlen($caso)) {
            case 1: $numero = "0000" . $caso;
                break;
            case 2: $numero = "000" . $caso;
                break;
            case 3: $numero = "00" . $caso;
                break;
            case 4: $numero = "0" . $caso;
                break;
            case 5: $numero = "" . $caso;
                break;
        }
        echo $numero;
        ?></font>
                                                        </td>
                                                        <td style="border-bottom:none; border-top:none; border-left:none; border-right:none">
                                                        </td>
                                                        <td style="border-bottom:none; border-left:none; border-right:none">
                                                            <font style="font: Arial, Helvetica, sans-serif" face="Arial, Helvetica, sans-serif" color="#000000" size="-2">Firma Paciente C.C. No. <?php echo $paciente[5]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DE</font>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br />
                                                <br />
                                                <div>

                                                </div>
                                                <table cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td><font style="font:Comic Sans MS" color="#000000" size="-2"><b>Centro Medico Prisma&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
                                                        <td><font style="font:Comic Sans MS" color="#000000" size="-2"><b>Mamonal Km 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
                                                        <td><font style="font:Comic Sans MS" color="#000000" size="-2"><b>Roberto Ambrad Ghisays</b></font></td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b></b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Bocagrande, Carrera 6 No. 5 - 161 Of. 101</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Kra. 56 No. 7C - 39</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Director Medico</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b></b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Tel.: 6657044</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Centro Logistico B.L.O.C PORT Local 27</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Cel.: 300 8141 117, 318 8527 701</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b></b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Cartagena de Indias D.T. y C. - Colombia</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Tel.: 6460942 - 6670319</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>E-mail: administracion@cimpre.com</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b></b></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b></b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>Cartagena de Indias D.T. y C. - Colombia</b></font>
                                                        </td>
                                                        <td>
                                                            <font style="font:Comic Sans MS" color="#000000" size="-2"><b>info@cimpre.com / www.cimpre.com</b></font>
                                                        </td>
                                                        <td >&nbsp;

                                                        </td>
                                                    </tr>
                                                </table>

                                                <center><button id="boton" type="button" onclick="myprint()" ><img src="img/submit.gif">&nbsp;&nbsp;&nbsp;Imprimir&nbsp;&nbsp;&nbsp;</button> 

                                                    <button id="boton2" type="button" onClick="cerrar();" >&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/cerrar.png" 
                                                                                                                                        alt="">&nbsp; Cerrar&nbsp;&nbsp;&nbsp;&nbsp;</button></center>
                                                </form>
                                                </div>
                                                <div id="formDiv">
                                                </div>

        <?php
    }
}
?>
                                        </body>
                                        </html>
