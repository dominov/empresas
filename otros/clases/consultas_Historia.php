<?php 
//referenciamos la clase DBManager
include_once("DBManagerHistoria.php");

//implementamos la clase empleado
class consultas_Historia{
 //constructor	
 function consultas_Historia(){
 }	
 
 // consulta los empledos de la BD
 function consultarParametrosCiudad(){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "select * from parametro_ciudad order by ciudad";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 function cerrarCasoimges($caso,$usuario){
   $con = new DBManager;
   $estado="Cerrado";
      date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   if($con->conectar()==true) {
     $query = "UPDATE casos SET estespirometria='$estado', fechaesp='$fecha', usuarioesp='$usuario' WHERE id='$caso'";
     $result = mysql_query($query);
     if (!$result)
       return false;
     else
       return true;
   }
 }
 function cerrarCasoimgel($caso,$usuario){
   $con = new DBManager;
   $estado="Cerrado";
      date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   if($con->conectar()==true) {
     $query = "UPDATE casos SET estelectrocardiograma='$estado', fechaelec='$fecha', usuarioelec='$usuario' WHERE id='$caso'";
     $result = mysql_query($query);
     if (!$result)
       return false;
     else
       return true;
   }
 }
  function contarHistorias(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT count(*) FROM historia";
     $result = @mysql_query($query);
	 $rcount=mysql_result($result,0);  
      return $rcount;
    }
  
 }
  function consultarCiudad($ciudad){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM parametro_ciudad WHERE ciudad='$ciudad'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 
  function consultarCargos(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM cargos";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 function contarCasos(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT count(*) FROM casos";
     $result = @mysql_query($query);
	 $rcount=mysql_result($result,0);  
      return $rcount;
    }
  
 }
 function consultarEmpresa($empresa){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM parametro_empresa WHERE empresa='$empresa'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 function obtenerHistoria($cedula){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM historia WHERE numero='$cedula'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }

 function existeColor($color){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM tratamientos WHERE color='$color'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 //EXISTE EPS
 function existeEps($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM eps WHERE empresa='$eps'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 
  function existeImgespi($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM espirometria WHERE caso='$eps'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 
   function existeImgelec($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM electrocardiograma WHERE caso='$eps'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 
   function existeImgespi2($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   $estado="Por Imagen";
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM casos WHERE id='$eps' AND estespirometria='$estado'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
    function existeApertura($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   $estado="Por Imagen";
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM apertura WHERE id_paciente='$eps'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
    function existeImgelec2($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   $estado="Por Imagen";
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM casos WHERE id='$eps' AND estelectrocardiograma='$estado'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
  //EXISTE MEDICO
 function existeMedico($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM medico WHERE medico='$eps'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 //EXISTE Paciente
 function existePaciente($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM historia WHERE numero='$eps'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
//EXISTE ARP 
 function existeArp($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM arp WHERE empresa='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 //EXISTE CIudad 
 function existeCiudad($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM ciudad WHERE ciudad='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
  //EXISTE Dpto
 function existeDpto($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM dpto WHERE dpto='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 //EXISTE Empresa
 function existeEmpresa($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM empresa WHERE empresa='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 //EXISTE Tipo
 function existeTipo($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM tipo WHERE tipo='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 function obtenerTipo($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM tipo WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return $row;
   }
 }
 
  function obtenerCargo($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM cargos WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return $row;
   }
 }
 //EXISTE Tipo
 function existeEquipo($id,$eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM equipos WHERE id_perfil='$id' AND equipo='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
  function existeCaso($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM casos WHERE cedula='$cedula' AND estado='Pendiente'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 
   function existeCasoant($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM casos WHERE cedula='$cedula' AND estado='Cerrado' AND esthistoria='Cerrado' ORDER BY id DESC ";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 
 
  function obtenerCasoant($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM casos WHERE cedula='$cedula' AND estado='Cerrado' ORDER BY id DESC ";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
  function obtenerVisiometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM visiometria WHERE caso='$cedula' AND estado='Cerrado'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function existeVisiometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM visiometria WHERE caso='$cedula' AND estado='Cerrado'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
   function existeVisiometria2($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM visiometria WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
   function obtenerAudiometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriadatos WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
    function existeAudiometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriadatos WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
  function obtenerImgEspirometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM imgespirometria WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerImgElectro($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM imgelectrocardiograma WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function obtenerEspirometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM espirometria WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function existeEspirometria($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM espirometria WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
    function obtenerElectro($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM electrocardiograma WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function existeElectro($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM electrocardiograma WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }  
  function obtenerLaboratorio($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM laboratorio WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerLaboratorios($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM laboratorio WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return true;
   }
 }
 
   function obtenerLaboratorios2($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM laboratorio WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
   function obtenerLaboratorios34($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM otros WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
  function obtenerOtros($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM otros WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
    function obtenerLaboratorios3($cedula,$tipo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM laboratorio WHERE caso='$cedula' AND tipo='$tipo'";
	$result = @mysql_query($query);
	$row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
    function obtenerLaboratorios38($cedula,$tipo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM otros WHERE caso='$cedula' AND tipo='$tipo'";
	$result = @mysql_query($query);
	$row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
     function obtenerLaboratorios4($cedula,$tipo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM laboratorio WHERE caso='$cedula' AND tipo='$tipo'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
    function obtenerLaboratorios45($cedula,$tipo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM otros WHERE caso='$cedula' AND tipo='$tipo'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
    function obtenerAudiometria2($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriaa1b1c1 WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
     function obtenerAudiometria3($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriad1e1f1 WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
     function obtenerAudiometria4($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriag1h1i1 WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
     function obtenerAudiometria5($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriaj1k1l1 WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
     function obtenerAudiometria6($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriam1 WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
      function obtenerAudiometria7($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometrianop WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
      function obtenerAudiometria8($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriaqrs WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
      function obtenerAudiometria9($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriatuv WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
      function obtenerAudiometria10($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM audiometriawxy WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=@mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function existeCasoid($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM casos WHERE id='$cedula'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
 
    function existeConsentimiento($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM consentimiento WHERE caso='$cedula'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
  //EXISTE Tipo
 function existePerfil($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM perfil WHERE perfil='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return true;
	 else
	   return false;
   }
 }
  //obtener perfil
 function obtenerPerfil($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT perfil FROM perfil WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerEmpresa($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT empresa FROM empresa WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function obtenerEmpresa2($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM empresa WHERE empresa='$eps'";
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
  function obtenerDiagnosticocod($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM cie10 WHERE ci_codigoci='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function obtenerDiagnosticoall(){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM cie10 ORDER BY ci_descripcion";
	$result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
  function obtenerEps($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM eps WHERE empresa='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function obtenerEpsid($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM eps WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function obtenerCasopen($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,cedula,estado FROM casos WHERE cedula='$eps' AND estado='Pendiente'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerCasopen2($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
    $query = "SELECT * FROM casos WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerCasopen3($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
    $query = "SELECT * FROM casos WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function obtenerCasopen3d($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
    $query = "SELECT * FROM casos WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerCasopenid($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,cedula,estado FROM casos WHERE id='$eps' AND estado='Pendiente'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function existeHistoriaedit($caso){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,cedula,estado FROM casos WHERE id='$caso' AND estado='Pendiente' AND esthistoria='Cerrado'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
   function obtenerCasopenid7($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,cedula,estado FROM casos WHERE id='$eps' AND estado='Por cerrar'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerArpid($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM arp WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function obtenerArp($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM arp WHERE empresa='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
    function obtenerCiudad($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,ciudad FROM ciudad WHERE ciudad='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function obtenerCiudadid($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,ciudad FROM ciudad WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerDptoid($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,dpto FROM dpto WHERE id='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function obtenerDpto($eps){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT id,dpto FROM dpto WHERE dpto='$eps'";
	$result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 
 function consultarTipo($tipo){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM parametro_tipoide WHERE tipo='$tipo'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 
 //OBTENER ARPS
  function obtenerArps(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM arp";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 //OBTENER MEDICOS
  function obtenerMedicos(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,medico FROM medico";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 
  //OBTENER EPS
  function obtenerEpss(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM eps";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 
 function cerrarCaso($caso,$usuario){
   $con = new DBManager;
   $estado="Cerrado";
      date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   if($con->conectar()==true) {
     $query = "UPDATE casos SET estado='$estado', fecha_cierre='$fecha', usuario_cierre='$usuario', estlaboratorio='$estado', usuariolab='$usuario', fechalab='$fecha' WHERE id='$caso'";
     $result = mysql_query($query);
     if (!$result)
       return false;
     else
       return true;
   }
 }
  //OBTENER Ciudad
  function obtenerCiudades(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,ciudad FROM ciudad";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 //OBTENER Dpto
  function obtenerDptos(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,dpto FROM dpto";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
  //OBTENER Empresa
  function obtenerEmpresas(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,empresa FROM empresa order by empresa";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 
   //OBTENER perfiles
  function obtenerPerfiles(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,perfil FROM perfil";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
  //OBTENER Tipo
  function obtenerTipos(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT id,tipo FROM tipo";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 
   //OBTENER Equipos
  function obtenerEquipos($id){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT equipo FROM equipos WHERE id_perfil='$id'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
  
 //inserta un nuevo empleado en la base de datos
 function crearParametrosCiudad($ciudad,$fecha){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO parametro_ciudad (ciudad,fecha_registro)
        VALUES ('".$ciudad."','".$fecha."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
  //inserta un nuevo empleado en la base de datos
 function crearTabla($usuario){
   $con = new DBManager;
   if($con->conectar()==true){
   $query="CREATE TABLE `controldent`.`diagnosticos_seleccionados_$usuario` (
`id` INT NOT NULL AUTO_INCREMENT ,
`parte` VARCHAR( 30 ) NOT NULL ,
`descripcion` VARCHAR( 30 ) NOT NULL ,
`color` VARCHAR( 30 ) NOT NULL ,
PRIMARY KEY ( `id` )
) ENGINE = MYISAM ;";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
  //inserta un nuevo empleado en la base de datos
 function borrarTabla($usuario){
   $con = new DBManager;
   if($con->conectar()==true){
   $query="DROP TABLE `diagnosticos_seleccionados_$usuario`";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //CREAR PACIENTE 
 function crearHistoria($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$firma){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO historia ( `nombres`, `apellidos`, `nhijos`, `documento_identidad`, `numero`, `npcargos`, `domicilio`, `telefono`, `oficina`, `tel_oficina`, `ocupacion`, `email`, `escolaridad`, `fecha_nacimiento`, `estudio`, `profesion`, `empresa`, `carnet`, `sexo`, `natural`, `procedente`, `eps`, `arp`, `estadocivil`, `medicacion`, `foto`, `fecha_registro`, `usuario`, `firma`) VALUES ('".$nombres."','".$apellidos."','".$edad."','".$documento."','".$numero."','".$tratamiento."','".$domicilio."','".$telefono."','".$oficina."','".$teloficina."','".$ocupacion."','".$email."','".$padre."','".$fechanacimiento."','".$referido."','".$fechaingreso."','".$empresa."','".$carnet."','".$sexo."','".$alarma."','".$motivo."','".$estado."','".$coagulacion."','".$tolerancia."','".$medicacion."','".$foto."','".$fecha."','".$usuario."','".$firma."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 
  function crearHistoriaactu($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$fecha,$firma){
   date_default_timezone_set('America/Bogota'); 
   $fechaac=date("Y-m-d H:i:s"); 
   @session_start();
   $us=$_SESSION["usuario"];

   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO historiaactu ( `nombres`, `apellidos`, `nhijos`, `documento_identidad`, `numero`, `npcargos`, `domicilio`, `telefono`, `oficina`, `tel_oficina`, `ocupacion`, `email`, `escolaridad`, `fecha_nacimiento`, `estudio`, `profesion`, `empresa`, `carnet`, `sexo`, `natural`, `procedente`, `eps`, `arp`, `estadocivil`, `medicacion`, `foto`, `fecha_registro`, `usuario`, `fecha_actu`, `usuarioactu`, `firma`) VALUES ('".$nombres."','".$apellidos."','".$edad."','".$documento."','".$numero."','".$tratamiento."','".$domicilio."','".$telefono."','".$oficina."','".$teloficina."','".$ocupacion."','".$email."','".$padre."','".$fechanacimiento."','".$referido."','".$fechaingreso."','".$empresa."','".$carnet."','".$sexo."','".$alarma."','".$motivo."','".$estado."','".$coagulacion."','".$tolerancia."','".$medicacion."','".$foto."','".$fecha."','".$usuario."','".$fechaac."','".$us."','".$firma."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 
  function editarHistoria($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$numero,$id,$firma){
  $paci=$this->obtenerPaciente($numero);
  $this->crearHistoriaactu($paci[1],$paci[2],$paci[3],$paci[4],$paci[5],$paci[6],$paci[7],$paci[8],$paci[9],$paci[10],$paci[11],$paci[12],$paci[13],$paci[14],$paci[15],$paci[16],$paci[17],$paci[18],$paci[19],$paci[20],$paci[21],$paci[22],$paci[23],$paci[24],$paci[25],$paci[26],$paci[28],$paci[27],$paci[29]);
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE historia SET `nombres`='$nombres', `apellidos`='$apellidos', `nhijos`='$edad', `documento_identidad`='$documento', `npcargos`='$tratamiento', `domicilio`='$domicilio', `telefono`='$telefono', `oficina`='$oficina', `tel_oficina`='$teloficina', `ocupacion`='$ocupacion', `email`='$email', `escolaridad`='$padre', `fecha_nacimiento`='$fechanacimiento', `estudio`='$referido', `profesion`='$fechaingreso', `empresa`='$empresa', `carnet`='$carnet', `sexo`='$sexo', `natural`='$alarma', `procedente`='$motivo', `eps`='$estado', `arp`='$coagulacion', `estadocivil`='$tolerancia', `medicacion`='$medicacion', `foto`='$foto', `fecha_registro`='$fecha', `usuario`='$usuario',numero='$numero',firma='$firma' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 function editarHistoriaocu($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$numero,$id,$firma,$caso){
  $paci=$this->obtenerPacienteocu($numero);
  $this->crearHistoriaactu($paci[1],$paci[2],$paci[3],$paci[4],$paci[5],$paci[6],$paci[7],$paci[8],$paci[9],$paci[10],$paci[11],$paci[12],$paci[13],$paci[14],$paci[15],$paci[16],$paci[17],$paci[18],$paci[19],$paci[20],$paci[21],$paci[22],$paci[23],$paci[24],$paci[25],$paci[26],$paci[28],$paci[27],$paci[29]);
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE paciente_ocu SET `nombres`='$nombres', `apellidos`='$apellidos', `nhijos`='$edad', `documento_identidad`='$documento', `npcargos`='$tratamiento', `domicilio`='$domicilio', `telefono`='$telefono', `oficina`='$oficina', `tel_oficina`='$teloficina', `ocupacion`='$ocupacion', `email`='$email', `escolaridad`='$padre', `fecha_nacimiento`='$fechanacimiento', `estudio`='$referido', `profesion`='$fechaingreso', `empresa`='$empresa', `carnet`='$carnet', `sexo`='$sexo', `natural`='$alarma', `procedente`='$motivo', `eps`='$estado', `arp`='$coagulacion', `estadocivil`='$tolerancia', `medicacion`='$medicacion', `foto`='$foto', `usuario`='$usuario',numero='$numero',firma='$firma' WHERE caso='$caso'";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
  function editarHistoria2($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$numero,$id,$firma){
  $paci=$this->obtenerPaciente($numero);
 $this-> crearHistoriaactu($paci[1],$paci[2],$paci[3],$paci[4],$paci[5],$paci[6],$paci[7],$paci[8],$paci[9],$paci[10],$paci[11],$paci[12],$paci[13],$paci[14],$paci[15],$paci[16],$paci[17],$paci[18],$paci[19],$paci[20],$paci[21],$paci[22],$paci[23],$paci[24],$paci[25],$paci[26],$paci[28],$paci[27],$paci[29]);
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE historia SET `nombres`='$nombres', `apellidos`='$apellidos', `nhijos`='$edad', `documento_identidad`='$documento', `npcargos`='$tratamiento', `domicilio`='$domicilio', `telefono`='$telefono', `oficina`='$oficina', `tel_oficina`='$teloficina', `ocupacion`='$ocupacion', `email`='$email', `escolaridad`='$padre', `fecha_nacimiento`='$fechanacimiento', `estudio`='$referido', `profesion`='$fechaingreso', `empresa`='$empresa', `carnet`='$carnet', `sexo`='$sexo', `natural`='$alarma', `procedente`='$motivo', `eps`='$estado', `arp`='$coagulacion', `estadocivil`='$tolerancia', `medicacion`='$medicacion', `fecha_registro`='$fecha', `usuario`='$usuario',numero='$numero',firma='$firma' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 function editarHistoria2ocu($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$numero,$id,$firma,$caso){
  $paci=$this->obtenerPacienteocu($numero);
 $this-> crearHistoriaactu($paci[1],$paci[2],$paci[3],$paci[4],$paci[5],$paci[6],$paci[7],$paci[8],$paci[9],$paci[10],$paci[11],$paci[12],$paci[13],$paci[14],$paci[15],$paci[16],$paci[17],$paci[18],$paci[19],$paci[20],$paci[21],$paci[22],$paci[23],$paci[24],$paci[25],$paci[26],$paci[28],$paci[27],$paci[29]);
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE paciente_ocu SET `nombres`='$nombres', `apellidos`='$apellidos', `nhijos`='$edad', `documento_identidad`='$documento', `npcargos`='$tratamiento', `domicilio`='$domicilio', `telefono`='$telefono', `oficina`='$oficina', `tel_oficina`='$teloficina', `ocupacion`='$ocupacion', `email`='$email', `escolaridad`='$padre', `fecha_nacimiento`='$fechanacimiento', `estudio`='$referido', `profesion`='$fechaingreso', `empresa`='$empresa', `carnet`='$carnet', `sexo`='$sexo', `natural`='$alarma', `procedente`='$motivo', `eps`='$estado', `arp`='$coagulacion', `estadocivil`='$tolerancia', `medicacion`='$medicacion', `usuario`='$usuario',numero='$numero',firma='$firma' WHERE caso='$caso'";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 
 function crearDatos($caso,$archivo,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $estado="terminado";
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO `ocupacional`.`imgespirometria` (`caso`, `archivo`, `fecha`, `usuario`, `estado`) VALUES ('".$caso."','".$archivo."','".$fecha."','".$usuario."','".$estado."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 function crearDatose($caso,$archivo,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $estado="terminado";
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO `ocupacional`.`imgelectrocardiograma` (`caso`, `archivo`, `fecha`, `usuario`, `estado`) VALUES ('".$caso."','".$archivo."','".$fecha."','".$usuario."','".$estado."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 
  function crearDatosl($caso,$archivo,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $estado="terminado";
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO `ocupacional`.`imglaboratorio` (`caso`, `archivo`, `fecha`, `usuario`, `estado`) VALUES ('".$caso."','".$archivo."','".$fecha."','".$usuario."','".$estado."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 
  function crearAntecedentesocuantes($otros1,$aeconomica2,$cargo2,$del2,$al2,$ano2,$meses2,$fisico2,$quimico2,$mecanico2,$biologico2,$ergon2,$pslab2,$otros2,$epp2,$aeconomica3,$cargo3,$del3,$al3,$ano3,$meses3,$fisico3,$quimico3,$mecanico3,$biologico3,$ergon3,$pslab3,$otros3,$epp3,$aeconomica4,$cargo4,$del4,$al4,$ano4,$meses4,$fisico4,$quimico4,$mecanico4,$biologico4,$ergon4,$pslab4,$otros4,$epp4,$at,$ep,$reubicacion,$nepp,$tepp,$uepp,$sentado,$parado,$caminando,$emaneja,$mprimas,$caso,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO historia ( `id_caso`, `otros1`, `aeconomica2`, `cargo2`, `del2`, `al2`, `ano2`, `meses2`, `fisico2`, `quimico2`, `mecanico2`, `biologico2`, `ergon2`, `pslab`, `otros2`, `epp2`, `aeconomica3`, `cargo3`, `del3`, `al3`, `ano3`, `meses3`, `fisico3`, `quimico3`, `mecanico3`, `biologico3`, `ergon3`, `pslab3`, `otros3`, `epp3`, `aeconomica4`, `cargo4`, `del4`, `al4`, `ano4`, `meses4`, `fisico4`, `quimico4`, `mecanico4`, `biologico4`, `ergon4`, `pslab4`, `otros4`, `epp4`, `at`, `ep`, `reubicacion`, `nepp`, `tepp`, `uepp`, `sentado`, `parado`, `caminando`, `emaneja`, `mprimas`, `fecha_registro`, `usuario`) VALUES ('".$caso."','".$otros1."','".$aeconomica2."','".$cargo2."','".$del2."','".$al2."','".$ano2."','".$meses2."','".$fisico2."','".$quimico2."','".$mecanico2."','".$biologico2."','".$ergon2."','".$pslab2."','".$otros2."','".$epp2."','".$aeconomica3."','".$cargo3."','".$del3."','".$al3."','".$ano3."','".$meses3."','".$fisico3."','".$quimico3."','".$mecanico3."','".$biologico3."','".$ergon3."','".$pslab3."','".$otros3."','".$epp3."','".$aeconomica4."','".$cargo4."','".$del4."','".$al4."','".$ano4."','".$meses4."','".$fisico4."','".$quimico4."','".$mecanico4."','".$biologico4."','".$ergon4."','".$pslab4."','".$otros4."','".$epp4."','".$at."','".$ep."','".$reubicacion."','".$nepp."','".$tepp."','".$uepp."','".$sentado."','".$parado."','".$caminando."','".$emaneja."','".$mprimas."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
 function crearTratamiento($tipo,$descripcion,$aplicacion,$costo,$costocli1,$costocli2,$observacion,$color,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO tratamientos (tipo,descripcion,aplicacion,costo,costocli1,costocli2,observacion,color,usuario,fecha)
        VALUES ('".$tipo."','".$descripcion."','".$aplicacion."','".$costo."','".$costocli1."','".$costocli2."','".$observacion."','".$color."','".$usuario."','".$fecha."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function crearConsentimiento($historia,$audio,$visio,$electro,$espiro,$opto,$laboratorios,$oblab,$otros,$obotros,$caso,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO consentimiento (historiaocu,audiometria,visiometria,electro,espiro,optometria,laboratorios,oblab,otros,obotros,fecha,caso,usuario)
        VALUES ('".$historia."','".$audio."','".$visio."','".$electro."','".$espiro."','".$opto."','".$laboratorios."','".$oblab."','".$otros."','".$obotros."','".$fecha."','".$caso."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //CREACION DE EPS
 function crearEps($nombre,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO eps (empresa,fecha,usuario)
        VALUES ('".$nombre."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //CREACION DE EPS
 function crearEquipo($nombre,$equipo,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO equipos (id_perfil,equipo,fecha,usuario)
        VALUES ('".$nombre."','".$equipo."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function crearCaso($cedula,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $estado="Pendiente";
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO casos (cedula,estado,fecha_registro,usuario)
        VALUES ('".$cedula."','".$estado."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
  function crearPacienteocu($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$usuario,$caso,$firma){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO `paciente_ocu` ( `nombres`, `apellidos`, `nhijos`, `documento_identidad`, `numero`, `npcargos`, `domicilio`, `telefono`, `oficina`, `tel_oficina`, `ocupacion`, `email`, `escolaridad`, `fecha_nacimiento`, `estudio`, `profesion`, `empresa`, `carnet`, `sexo`, `natural`, `procedente`, `eps`, `arp`, `estadocivil`, `medicacion`, `foto`, `fecha_registro`, `usuario`, `caso`, `firma`) VALUES ('".$nombres."','".$apellidos."','".$edad."','".$documento."','".$numero."','".$tratamiento."','".$domicilio."','".$telefono."','".$oficina."','".$teloficina."','".$ocupacion."','".$email."','".$padre."','".$fechanacimiento."','".$referido."','".$fechaingreso."','".$empresa."','".$carnet."','".$sexo."','".$alarma."','".$motivo."','".$estado."','".$coagulacion."','".$tolerancia."','".$medicacion."','".$foto."','".$fecha."','".$usuario."','".$caso."','".$firma."')";
     $result = @mysql_query($query);
     if (!$result){
	   return false;
     }else{
       return true;
	 }
   }
 }
  function crearPerfil($nombre,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO perfil (perfil,fecha,usuario)
        VALUES ('".$nombre."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
  //CREACION DE Medico
 function crearMedico($nombre,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO medico (medico,fecha,usuario)
        VALUES ('".$nombre."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
 //CREACION DE Ciudad
 function crearCiudad($ciudad,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO ciudad (ciudad,fecha,usuario)
        VALUES ('".$ciudad."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
 //CREACION DE Dpto
 function crearDpto($dpto,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO dpto (dpto,fecha,usuario)
        VALUES ('".$dpto."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //CREACION DE Empresa
 function crearEmpresa($dpto,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO empresa (empresa,fecha,usuario)
        VALUES ('".$dpto."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //CREACION DE Tipo
 function crearTipo($dpto,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO tipo (tipo,fecha,usuario)
        VALUES ('".$dpto."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //CREACION DE ARP
 function crearArp($nombre,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO arp (empresa,fecha,usuario)
        VALUES ('".$nombre."','".$fecha."','".$usuario."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function insertarSeleccion2($parte,$descripcion,$color,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO diagnosticos_seleccionados_$usuario (parte,descripcion,color)
        VALUES ('".$parte."','".$descripcion."','".$color."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarSeleccionados($usuario){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM diagnosticos_seleccionados_$usuario";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 function borrarSeleccion($parte,$usuario){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "DELETE FROM diagnosticos_seleccionados_$usuario WHERE parte='$parte'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
 
 }
 function actualizarSeleccion($parte,$descripcion,$color,$usuario){
   $con = new DBManager;
   if($con->conectar()==true) {
     $query = "UPDATE diagnosticos_seleccionados_$usuario SET descripcion='$descripcion', color='$color' WHERE parte='$parte'";
     $result = mysql_query($query);
     if (!$result)
       return false;
     else
       return true;
   }
 }
  function existeSeleccion($parte,$usuario){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM diagnosticos_seleccionados_$usuario WHERE parte='$parte'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 function existeUsuario($user,$clave){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$user' AND clave='$clave'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
  function existeUsuariov($user,$clave){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$user' AND clave='$clave'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
   function existeNick($codigo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$codigo'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 function existeNum($codigo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE cedula='$codigo'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 function obtenerUsuarioid($codigo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE id='$codigo'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerUsuarionick($codigo){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$codigo'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function usuarios(){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
 function crearUsuario($nombres,$apellidos,$tipodoc,$cedula,$direccion,$telefono,$celular,$correo,$usuario,$clave,$foto,$fecha,$usuariocrea,$tipouser){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO usuarios (nombres,apellidos,tipodoc,cedula,direccion,telefono,celular,correo,usuario,clave,foto,fecha,usuariocrea,tipouser)
        VALUES ('".$nombres."','".$apellidos."','".$tipodoc."','".$cedula."','".$direccion."','".$telefono."','".$celular."','".$correo."','".$usuario."','".$clave."','".$foto."','".$fecha."','".$usuariocrea."','".$tipouser."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function crearUsuarioactu($nombres,$apellidos,$tipodoc,$cedula,$direccion,$telefono,$celular,$correo,$usuario,$clave,$foto,$fecha,$usuariocrea,$tipouser){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO usuariosactu (nombres,apellidos,tipodoc,cedula,direccion,telefono,celular,correo,usuario,clave,foto,fecha,usuariocrea,tipouser)
        VALUES ('".$nombres."','".$apellidos."','".$tipodoc."','".$cedula."','".$direccion."','".$telefono."','".$celular."','".$correo."','".$usuario."','".$clave."','".$foto."','".$fecha."','".$usuariocrea."','".$tipouser."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function crearUsuarioeli($nombres,$apellidos,$tipodoc,$cedula,$direccion,$telefono,$celular,$correo,$usuario,$clave,$foto,$fecha,$usuariocrea,$eliminado,$tipouser){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO usuarioseli (nombres,apellidos,tipodoc,cedula,direccion,telefono,celular,correo,usuario,clave,foto,fecha,usuariocrea,eliminadopor,tipouser)
        VALUES ('".$nombres."','".$apellidos."','".$tipodoc."','".$cedula."','".$direccion."','".$telefono."','".$celular."','".$correo."','".$usuario."','".$clave."','".$foto."','".$fecha."','".$usuariocrea."','".$eliminado."','".$tipouser."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function borrarUsuario($cod){
  $goto=$this->obtenerUsuarioid($cod); 
   $this->crearUsuarioeli($goto[1],$goto[2],$goto[3],$goto[4],$goto[5],$goto[6],$goto[7],$goto[8],$goto[9],$goto[10],$goto[11],$goto[12],$goto[13],"user",$goto[14]);
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "DELETE FROM usuarios WHERE id='$cod'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return true;
    }
 
 }
  function actuUsuario($id,$nombres,$apellidos,$tipodoc,$cedula,$direccion,$telefono,$celular,$correo,$usuario,$clave,$foto,$fecha,$usuariocrea,$tipouser){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $goto=$this->obtenerUsuarioid($id); 
   $this->crearUsuarioactu($goto[1],$goto[2],$goto[3],$goto[4],$goto[5],$goto[6],$goto[7],$goto[8],$goto[9],$goto[10],$goto[11],$goto[12],$goto[13],$goto[14]);
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE usuarios SET nombres='$nombres',apellidos='$apellidos',tipodoc='$tipodoc',cedula='$cedula',direccion='$direccion',telefono='$telefono',celular='$celular',correo='$correo',usuario='$usuario',clave='$clave',foto='$foto',fecha='$fecha',usuariocrea='$usuariocrea',tipouser='$tipouser' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
   function actuHistoriacaso($estado,$id,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE casos SET esthistoria='$estado', fechahis='$fecha', usuariohis='$usuario' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
  function actuAudiocaso($estado,$id,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE casos SET estaudiometria='$estado', fechaaudio='$fecha', usuarioaudio='$usuario' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
   function actuVisiocaso($estado,$id,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE casos SET estvisiometria='$estado', fechavisio='$fecha', usuariovisio='$usuario' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
  function actuElectrocaso($estado,$id,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE casos SET estelectrocardiograma='$estado', fechaelec='$fecha', usuarioelec='$usuario' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   function actuEspirocaso($estado,$id,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE casos SET estespirometria='$estado', fechaesp='$fecha', usuarioesp='$usuario' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
    function actuLabcaso($estado,$id,$usuario){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE casos SET estlaboratorio='$estado', fechalab='$fecha', usuariolab='$usuario' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
   function actuUsuario2($id,$nombres,$apellidos,$tipodoc,$cedula,$direccion,$telefono,$celular,$correo,$usuario,$clave,$fecha,$usuariocrea,$tipouser){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s");
   //$obj=new consultas_inventario();
   $goto=$this->obtenerUsuarioid($id); 
   $this->crearUsuarioactu($goto[1],$goto[2],$goto[3],$goto[4],$goto[5],$goto[6],$goto[7],$goto[8],$goto[9],$goto[10],$goto[11],$goto[12],$goto[13],$goto[14]);
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE usuarios SET nombres='$nombres',apellidos='$apellidos',tipodoc='$tipodoc',cedula='$cedula',direccion='$direccion',telefono='$telefono',celular='$celular',correo='$correo',usuario='$usuario',clave='$clave',fecha='$fecha',usuariocrea='$usuariocrea',tipouser='$tipouser' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarUsuario($cod,$clave){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$cod' AND clave='$clave'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }
  function obtenerUsuario($cod,$clave){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$cod' AND clave='$clave'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
 function consultarUsuarios($cod){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "SELECT * FROM usuarios WHERE usuario='$cod'";
     $result = @mysql_query($query);
     if (!$result)
       return false;
     else
       return $result;
    }
  
 }

 function existeSeleccion2($descripcion,$usuario){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM diagnosticos_seleccionados_$usuario WHERE descripcion='$descripcion'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
 function existeSeleccionados($usuario){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT COUNT(*) FROM diagnosticos_seleccionados_$usuario";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
 
  function obtenerTratamientoId($id){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM tratamientos WHERE id='$id'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
function actualizarHistoria($nombres,$apellidos,$edad,$documento,$numero,$tratamiento,$domicilio,$telefono,$oficina,$teloficina,$ocupacion,$email,$padre,$fechanacimiento,$referido,$fechaingreso,$empresa,$carnet,$sexo,$alarma,$motivo,$estado,$coagulacion,$tolerancia,$medicacion,$foto,$id,$fecha){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE historia SET nombres='$nombres',apellidos='$apellidos',edad='$edad',documento_identidad='$documento',numero='$numero',tratamiento='$tratamiento',domicilio='$domicilio',telefono='$telefono',oficina='$oficina',tel_oficina='$teloficina',ocupacion='$ocupacion',email='$email',padres_acudiente='$padre',fecha_nacimiento='$fechanacimiento',referido='$referido',fecha_ingreso='$fechaingreso',empresa='$empresa',carnet='$carnet',sexo='$sexo',alarma='$alarma',motivo_consulta='$motivo',estado_salud='$estado',coagulacion='$coagulacion',tolerancia_anastesia='$tolerancia',medicacion='$medicacion',foto='$foto',fecha_registro='$fecha' WHERE id='$id'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function crearHistoriaClinica($id_paciente,$descripcion,$clase,$duracion,$enfermedadesfamiliares,$diabetes,$hepatitis,$hipertension,$cardiovascular,$fiebrereumatica,$sinusitis,$respiratorias,$inmunizaciones,$hospitalizaciones,$traumaticos,$transfuncionales,$quirurgicos,$medicacionactual,$irradiaciones,$hemorragia,$anestesicos,$penicilina,$otrasdrogas,$bruxismo,$resbucal,$succiondigital,$emplingual,$fonacion,$mordes,$deglucioninf,$fuma,$tension,$pulso,$frecrespiratoria,$piel,$amigdalasfaringe,$labios,$nodlinfaticos,$paladar,$pisodeboca,$lengua,$glandulassalivares,$carrillos,$mucosaalveolar,$frenillos,$senosmaxilares){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO historia_clinica (id_paciente,descripcion,clase,duracion,enfermedadesfamiliares,diabetes,hepatitis,hipertension,cardiovascular,fiebrereumatica,sinusitis,respiratorias,inmunizaciones,hospitalizaciones,traumaticos,transfuncionales,quirurgicos,medicacionactual,irradiaciones,hemorragias,anestesicos,penicilina,otrasdrogas,bruxismo,resbucal,succiondigital,emplingual,fonacion,mordes,deglucioninf,fuma,tension,pulso,frecrespiratoria,piel,amigdalasfaringe,labios,nodlinfaticos,paladar,pisodeboca,lengua,glandulassalivares,carrillos,mucosaalveolar,frenillos,senosmaxilares,fecha_registro) VALUES ('".$id_paciente."','".$descripcion."','".$clase."','".$duracion."','".$enfermedadesfamiliares."','".$diabetes."','".$hepatitis."','".$hipertension."','".$cardiovascular."','".$fiebrereumatica."','".$sinusitis."','".$respiratorias."','".$inmunizaciones."','".$hospitalizaciones."','".$traumaticos."','".$transfuncionales."','".$quirurgicos."','".$medicacionactual."','".$irradiaciones."','".$hemorragia."','".$anestesicos."','".$penicilina."','".$otrasdrogas."','".$bruxismo."','".$resbucal."','".$succiondigital."','".$emplingual."','".$fonacion."','".$mordes."','".$deglucioninf."','".$fuma."','".$tension."','".$pulso."','".$frecrespiratoria."','".$piel."','".$amigdalasfaringe."','".$labios."','".$nodlinfaticos."','".$paladar."','".$pisodeboca."','".$lengua."','".$glandulassalivares."','".$carrillos."','".$mucosaalveolar."','".$frenillos."','".$senosmaxilares."','".$fecha."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function actualizarHistoriaClinica($id_paciente,$descripcion,$clase,$duracion,$enfermedadesfamiliares,$diabetes,$hepatitis,$hipertension,$cardiovascular,$fiebrereumatica,$sinusitis,$respiratorias,$inmunizaciones,$hospitalizaciones,$traumaticos,$transfuncionales,$quirurgicos,$medicacionactual,$irradiaciones,$hemorragia,$anestesicos,$penicilina,$otrasdrogas,$bruxismo,$resbucal,$succiondigital,$emplingual,$fonacion,$mordes,$deglucioninf,$fuma,$tension,$pulso,$frecrespiratoria,$piel,$amigdalasfaringe,$labios,$nodlinfaticos,$paladar,$pisodeboca,$lengua,$glandulassalivares,$carrillos,$mucosaalveolar,$frenillos,$senosmaxilares){
   date_default_timezone_set('America/Bogota'); 
   $fecha=date("Y-m-d H:i:s"); 
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "UPDATE historia_clinica SET descripcion='$descripcion',clase='$clase',duracion='$duracion',enfermedadesfamiliares='$enfermedadesfamiliares',diabetes='$diabetes',hepatitis='$hepatitis',hipertension='$hipertension',cardiovascular='$cardiovascular',fiebrereumatica='$fiebrereumatica',sinusitis='$sinusitis',respiratorias='$respiratorias',inmunizaciones='$inmunizaciones',hospitalizaciones='$hospitalizaciones',traumaticos='$traumaticos',transfuncionales='$transfuncionales',quirurgicos='$quirurgicos',medicacionactual='$medicacionactual',irradiaciones='$irradiaciones',hemorragias='$hemorragia',anestesicos='$anestesicos',penicilina='$penicilina',otrasdrogas='$otrasdrogas',bruxismo='$bruxismo',resbucal='$resbucal',succiondigital='$succiondigital',emplingual='$emplingual',fonacion='$fonacion',mordes='$mordes',deglucioninf='$deglucioninf',fuma='$fuma',tension='$tension',pulso='$pulso',frecrespiratoria='$frecrespiratoria',piel='$piel',amigdalasfaringe='$amigdalasfaringe',labios='$labios',nodlinfaticos='$nodlinfaticos',paladar='$paladar',pisodeboca='$pisodeboca',lengua='$lengua',glandulassalivares='$glandulassalivares',carrillos='$carrillos',mucosaalveolar='$mucosaalveolar',frenillos='$frenillos',senosmaxilares='$senosmaxilares',fecha_registro='$fecha' WHERE id_paciente='$id_paciente'";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
 function consultarParametrosEmpresa(){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "select * from parametro_empresa order by empresa";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
  function obtenerPaciente($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM historia WHERE numero='$cedula'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
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
   function obtenerPacienteocuced($caso){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM historia WHERE numero='$caso'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
    function existeDiagnostico($dx){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM cie10 WHERE ci_codigoci='$dx'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return true;
   }
 }
     function obtenerDiagnosticonombre($dx){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM cie10 WHERE ci_codigoci='$dx'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row[2];
   }
 }
   function obtenerPacienteocuem($caso){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE empresa='$caso'";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 //CONSULTAS PARA LOS GRAFICOS
    function obtenerPacientesgraficosm($empresa,$fechaini,$fechafin){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE empresa='$empresa' AND sexo='Masculino' AND fecha_registro BETWEEN '".$fechaini." 00:00:00' AND '".$fechafin." 23:59:59' ORDER BY id";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
     function obtenerPacientesgraficosmg($fechaini,$fechafin){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion


   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE sexo='Masculino' AND fecha_registro BETWEEN '".$fechaini." 00:00:00' AND '".$fechafin." 23:59:59' GROUP BY numero";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
      function obtenerPacientesgraficosestadocivil($fechaini,$fechafin){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion


   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE fecha_registro BETWEEN '".$fechaini." 00:00:00' AND '".$fechafin." 23:59:59' GROUP BY numero";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
       function obtenerPacientesgraficoscargos($fechaini,$fechafin,$tipoexamen){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion


   if($con->conectar()==true){
      $query = "SELECT t1.*
FROM paciente_ocu t1, apertura t2
WHERE t1.caso = t2.id_paciente
AND t2.texamen = '".$tipoexamen."'
AND t1.fecha_registro
BETWEEN '".$fechaini." 00:00:00'
AND '".$fechafin." 23:59:59'
GROUP BY t1.numero
";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
       function obtenerPacientesantefamgraf($fechaini,$fechafin,$tipoexamen){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion


   if($con->conectar()==true){
    
	  $query = "SELECT max(t1.caso)
FROM paciente_ocu t1, apertura t2
WHERE t1.caso = t2.id_paciente
AND t2.texamen = '".$tipoexamen."'
AND t1.fecha_registro
BETWEEN '".$fechaini." 00:00:00'
AND '".$fechafin." 23:59:59'
GROUP BY t1.numero
";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
      function obtenerPacientesdx($fechaini,$fechafin,$tipoexamen){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion


   if($con->conectar()==true){
 
 $query = "SELECT t3.diagnostico1, t3.diagnostico2, t3.diagnostico3, t3.diagnostico4, t3.diagnostico5 
FROM  apertura t2, diagnostico t3 
WHERE t2.fecha_registro 
BETWEEN '".$fechaini." 00:00:00' 
AND '".$fechafin." 23:59:59'
AND t2.texamen = '".$tipoexamen."'  
AND t2.id_paciente = t3.id_caso 
GROUP BY  t2.id_paciente
";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
   function obtenerPacientesantepergraf($fechaini,$fechafin,$tipoexamen){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion


   if($con->conectar()==true){
    
	  $query = "SELECT max(t1.caso)
FROM paciente_ocu t1, apertura t2
WHERE t1.caso = t2.id_paciente
AND t2.texamen = '".$tipoexamen."'
AND t1.fecha_registro
BETWEEN '".$fechaini." 00:00:00'
AND '".$fechafin." 23:59:59'
GROUP BY t1.numero
";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
     function obtenerPacientesgraficosf($empresa,$fechaini,$fechafin){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE empresa='$empresa' AND sexo='Femenino' AND fecha_registro BETWEEN '".$fechaini." 00:00:00' AND '".$fechafin." 23:59:59' ORDER BY id";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
     function obtenerPacientesgraficosfg($fechaini,$fechafin){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
 
   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE sexo='Femenino' AND fecha_registro BETWEEN '$fechaini 00:00:00' AND '$fechafin 23:59:59' GROUP BY numero";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
 //FIN CONSULTA PARA GRAFICOS
 
 
   function consulEmpresas($fecha1,$fecha2,$sub){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
       if($sub=="todas"){
		   $query = "SELECT * FROM paciente_ocu WHERE fecha_registro BETWEEN '".$fecha1." 00:00:00' AND '".$fecha2." 23:59:59' ORDER BY id";    
	   }else{
    $query = "SELECT * FROM paciente_ocu WHERE empresa='$sub' AND fecha_registro BETWEEN '".$fecha1." 00:00:00' AND '".$fecha2." 23:59:59' ORDER BY id";      }
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
    function consulEmpresashoy($fecha1,$fecha2){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM paciente_ocu WHERE fecha_registro BETWEEN '".$fecha1." 00:00:00' AND '".$fecha2." 23:59:59' ORDER BY id";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
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
 function obtenerPacienteId($cedula){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM historia WHERE id='$cedula'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  function obtenerHistoriaId($id){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "SELECT * FROM historia_clinica WHERE id_paciente='$id'";
	 $result = @mysql_query($query);
	 $row=mysql_fetch_row($result);
	 if (!$row)
	   return false;
	 else
	   return $row;
   }
 }
  
 //inserta un nuevo empleado en la base de datos
 function crearParametrosEmpresa($empresa,$fecha){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO parametro_empresa (empresa,fecha_registro)
        VALUES ('".$empresa."','".$fecha."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarParametrosTipo(){
   //creamos el objeto $con a partir de la clase DBManager
   $con = new DBManager;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectar()==true){
     $query = "select * from parametro_tipoide order by tipo";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
  
 //inserta un nuevo empleado en la base de datos
 function crearParametrosTipo($tipo,$fecha){
   $con = new DBManager;
   if($con->conectar()==true){
     $query = "INSERT INTO parametro_tipoide (tipo,fecha_registro)
        VALUES ('".$tipo."','".$fecha."')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 
}
?>
