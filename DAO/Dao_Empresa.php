<?php

include_once 'DaoGeneral.php';

/**
 * Description of DaoUsuario
 *
 * @author Cristian
 */
class Dao_Empresa extends DaoGeneral {

    function __construct() {
        
    }

    function select($condicion) {


        $this->Conectarse();
        $link = $this->Conectarse();
        $respuesta = mysql_query($condicion, $link);
        $this->cerrarConexion();
        return $respuesta;
    }

    function buscar($NIT, $password) {

        
        
        $link = $this->Conectarse();
        // if ($conexion == true) {
        $query = "SELECT * FROM `empresa` WHERE `NIT` = $NIT and `password` = $password";
        $result = mysql_query($query, $link);
        $fila = mysql_fetch_array($result);

        $this->cerrarConexion();
        
        
        /*Nueva forma
         * $consulta = $this->Conectarse()->query($query);
        $fila = $consulta->fetch_assoc();*/
        return $fila;
        // }
    }

}

?>
