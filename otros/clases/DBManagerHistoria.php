<?php
class DBManager {

    var $conect;

    function DBManager() {
        
    }

    function getCon() {
        return $this->conect;
    }

    function conectar() {
        if (!($con = @mysql_connect("localhost", "desarro1", "RO5hk604bw"))) {
            echo"Error al conectarce a la base de datos";
            exit();
        }
        if (!@mysql_select_db("desarro1_ocupacional", $con)) {
            echo "error al seleccionar la base de datos";
            exit();
        }
        $this->conect = $con;
        return true;
    }
       /* 	 function conectar() {
	     if(!($con=@mysql_connect("localhost","desarro1","RO5hk604bw")))
		 {
		     echo"Error al conectar a la base de datos";	
			 exit();
	      }
		  if (!@mysql_select_db("desarro1_ocupacional",$con)) {
		   echo "error al seleccionar la base de datos";  
		   exit();
		  }
	       $this->conect=$con;
		   return true;	
	 }*/

}

?>
