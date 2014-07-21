<?php
/*
	File: signup.server.php

	Example which demonstrates a xajax implementation of a sign-up page.
	
	Title: Sign-up Example
	
	Please see <copyright.inc.php> for a detailed description, copyright
	and license information.
*/

/*
	Section: Files
	
	- <signup.php>
	- <signup.common.php>
	- <signup.server.php>
*/

/*
	@package xajax
	@version $Id: xajax.inc.php 362 2007-05-29 15:32:24Z calltoconstruct $
	@copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
	@copyright Copyright (c) 2008-2009 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
	@license http://www.xajaxproject.org/bsd_license.txt BSD License
*/

require_once ("signup.commonvision.php");
//include_once("DBManager.php");

function processAccountData($aFormValues)
{
	$objResponse = new xajaxResponse();
$token=0;
$caso=$aFormValues["caso"];
$fultimoex=$aFormValues["fultimoex"];

$usalentes=$aFormValues["usalentes"];
$tipolentes=$aFormValues["tipolentes"];
$antquirurgicos=$aFormValues["antquirurgicos"];
$antenfermedad=$aFormValues["antenfermedad"];
$lejosojoderechosin=$aFormValues["lejosojoderechosin"];
$lejosojoderechocon=$aFormValues["lejosojoderechocon"];
$lejosojoizquierdosin=$aFormValues["lejosojoizquierdosin"];
$lejosojoizquierdocon=$aFormValues["lejosojoizquierdocon"];
$lejosojobinocularsin=$aFormValues["lejosojobinocularsin"];
$lejosojobinocularcon=$aFormValues["lejosojobinocularcon"];
$lejosojostereoopsissin=$aFormValues["lejosojostereoopsissin"];
$lejosojostereoopsiscon=$aFormValues["lejosojostereoopsiscon"];
$lejosojophoriasin=$aFormValues["lejosojophoriasin"];
$lejosojophoriacon=$aFormValues["lejosojophoriacon"];
$cercanoojoderechosin=$aFormValues["cercanoojoderechosin"];
$cercanoojoderechocon=$aFormValues["cercanoojoderechocon"];
$cercanoojoizquierdosin=$aFormValues["cercanoojoizquierdosin"];
$cercanoojoizquierdocon=$aFormValues["cercanoojoizquierdocon"];
$cercanoojobinocularsin=$aFormValues["cercanoojobinocularsin"];
$cercanoojobinocularcon=$aFormValues["cercanoojobinocularcon"];
$cercanoojostereoopsissin=$aFormValues["cercanoojostereoopsissin"];
$cercanoojostereoopsiscon=$aFormValues["cercanoojostereoopsiscon"];
$cercanoojophoriasin=$aFormValues["cercanoojophoriasin"];
$cercanoojophoriacon=$aFormValues["cercanoojophoriacon"];


$usuario=$_SESSION["usuario"];
if($token==0){
crearDatos($caso,$fultimoex,$usalentes,$tipolentes,$antquirurgicos,$antenfermedad,$lejosojoderechosin,$lejosojoderechocon,$lejosojoizquierdosin,$lejosojoizquierdocon,$lejosojobinocularsin,$lejosojobinocularcon,$lejosojostereoopsissin,$lejosojostereoopsiscon,$lejosojophoriasin,$lejosojophoriacon,$cercanoojoderechosin,$cercanoojoderechocon,$cercanoojoizquierdosin,$cercanoojoizquierdocon,$cercanoojobinocularsin,$cercanoojobinocularcon,$cercanoojostereoopsissin,$cercanoojostereoopsiscon,$cercanoojophoriasin,$cercanoojophoriacon,$usuario);

cerrarCaso($caso, $usuario);

$objResponse->alert("Examen Visiometrico Guardado Satisfactoriamente");
 $sForm = "<center><form action=\"crearExvisual.php\">";
	            	$sForm .="<input type=\"submit\" value=\"Crear Otro Examen Visiometrico\"/>";
		          $sForm .="</form></center>";
		           $objResponse->assign("formDiv","innerHTML",$sForm);
		           $objResponse->assign("accordion","style.display", "none");
				   $objResponse->assign("boton","style.display", "none");
				   $objResponse->assign("boton2","style.display", "none");
}
$objResponse->assign("boton","value","continue ->");
                   $objResponse->assign("boton","disabled",false);

	return $objResponse;
}

 function crearDatos($caso,$fultimoex,$usalentes,$tipolentes,$antquirurgicos,$antenfermedad,$lejosojoderechosin,$lejosojoderechocon,$lejosojoizquierdosin,$lejosojoizquierdocon,$lejosojobinocularsin,$lejosojobinocularcon,$lejosojostereoopsissin,$lejosojostereoopsiscon,$lejosojophoriasin,$lejosojophoriacon,$cercanoojoderechosin,$cercanoojoderechocon,$cercanoojoizquierdosin,$cercanoojoizquierdocon,$cercanoojobinocularsin,$cercanoojobinocularcon,$cercanoojostereoopsissin,$cercanoojostereoopsiscon,$cercanoojophoriasin,$cercanoojophoriacon,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $estado="Cerrado";
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO `desarro1_ocupacional`.`visiometria` (`caso`, `fultimoex`, `usalentes`, `tipolentes`, `antquirurgicos`, `antenfermedad`, `lejosojoderechosin`, `lejosojoderechocon`, `lejosojoizquierdosin`, `lejosojoizquierdocon`, `lejosojobinocularsin`, `lejosojobinocularcon`, `lejosojostereoopsissin`, `lejosojostereoopsiscon`, `lejosojophoriasin`, `lejosojophoriacon`, `cercanoojoderechosin`, `cercanoojoderechocon`, `cercanoojoizquierdosin`, `cercanoojoizquierdocon`, `cercanoojobinocularsin`, `cercanoojobinocularcon`, `cercanoojostereoopsissin`, `cercanoojostereoopsiscon`, `cercanoojophoriasin`, `cercanoojophoriacon`, `fecha`, `usuario`, `estado`) VALUES ('".$caso."','".$fultimoex."','".$usalentes."','".$tipolentes."','".$antquirurgicos."','".$antenfermedad."','".$lejosojoderechosin."','".$lejosojoderechocon."','".$lejosojoizquierdosin."','".$lejosojoizquierdocon."','".$lejosojobinocularsin."','".$lejosojobinocularcon."','".$lejosojostereoopsissin."','".$lejosojostereoopsiscon."','".$lejosojophoriasin."','".$lejosojophoriacon."','".$cercanoojoderechosin."','".$cercanoojoderechocon."','".$cercanoojoizquierdosin."','".$cercanoojoizquierdocon."','".$cercanoojobinocularsin."','".$cercanoojobinocularcon."','".$cercanoojostereoopsissin."','".$cercanoojostereoopsiscon."','".$cercanoojophoriasin."','".$cercanoojophoriacon."','".$fecha."','".$usuario."','".$estado."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 
 
function esnumero($numero){
$valor=false;
if(is_numeric($numero)){
    $valor=true;
}else{
   $valor=false;
}
return $valor;
}
function cerrarCaso($caso,$usuario){
   $con = new DBManager;
   $estado="Por cerrar";
      date_default_timezone_set('America/Bogota');
   $fecha=date("Y-m-d H:i:s"); 
   if($con->conectar()==true) {
     $query = "UPDATE casos SET estvisiometria='$estado', fechavisio='$fecha', usuariovisio='$usuario' WHERE id='$caso'";
     $result = mysql_query($query);
     if (!$result)
       return false;
     else
       return true;
   }
 } 
$xajax->processRequest();
?>