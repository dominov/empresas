<?php 
include_once 'DaoGeneral.php';

class Dao_historia extends DaoGeneral{
 //constructor	
 function consultas_Historia(){
 }	
 
  function obtenerPacienteocu($caso){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE caso='$caso'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
    function obtenerApertura($caso){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM apertura WHERE id_paciente='$caso'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
  function obtenerAntecedentesante($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM anteceocuantes WHERE id_caso='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
   function obtenerAntecedentesdes($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM anteceocuactual WHERE id_caso='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
  function obtenerAntecedentesfam($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM antefamiliares WHERE id_caso='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
   function obtenerExamen($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM examenfisico WHERE id_caso='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
   function obtenerDiagnostico($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM diagnostico WHERE id_caso='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
}
?>
