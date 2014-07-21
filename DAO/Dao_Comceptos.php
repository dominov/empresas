<?php
include_once ("DaoGeneral.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_Comceptos
 *
 * @author Cristian
 */
class Dao_Comceptos extends DaoGeneral {

    function __construct() {
        
    }

    function listar($NIT) {
      $sql = "Select casos.id , historia.nombres, historia.apellidos, historia.numero, historia.ocupacion FROM (`historia` inner join empresa on historia.empresa = empresa.id) inner join casos on historia.numero = casos.cedula WHERE empresa.NIT = $NIT and casos.estado ='Cerrado'";
      
      $link = $this->Conectarse();
        $respuesta = mysql_query($sql, $link);
        $this->cerrarConexion();

        if(!$respuesta){
            return null;
        }
        $lista = array();
        if (mysql_num_rows($respuesta) > 0) {
            $i = 0;
            while ($fila = mysql_fetch_array($respuesta)) {
                $lista[$i] = $fila;              
                $i++;
            }
        } else {
            $lista = null;
        }
        return $lista;
    }

    
}
