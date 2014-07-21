<?php

/**
 * Description of DaoGeneral
 *
 * @author Cristian
 */
include_once 'Conexion.php';

class DaoGeneral {

    function Conectarse() {
        $bd = Conexion::getInstance();

        return $bd->getLink();
    }

    function cerrarConexion() {
        $bd = Conexion::getInstance();
        mysql_close($bd->getLink()); //cierra la conexion
    }

    function select($sql) {

        $link = $this->Conectarse();
        $respuesta = mysql_query($sql, $link);
        $this->cerrarConexion();


        if(!$respuesta){
            return null;
        }
        $fila = mysql_fetch_row($respuesta);

        if (!$fila) {
            return NULL;
        } else {
            return $fila;
        }
    }

    function select_row_where($tabla, $campos, $key, $valor) {
 
        $sql = "SELECT ";

        IF ($campos != NULL) {

            if (is_array($campos)) {
                foreach ($campos as $k => $value) {

                    $sql .=" $value,";
                }
                $sql = trim($sql, ',');
            } else {
                $sql .=" $campos ";
            }
        } else {
            $sql .=" * ";
        }

        $sql .= "FROM $tabla ";

        $sql .= "WHERE ";
        IF ($key != NULL) {
            if (is_array($key)) {
                $sql .="$key[index] = $valor[index], ";
                for ($index = 0; $index < count($key); $index++) {
                    $sql .="$key[index] = $valor[index], ";
                }
                $sql = trim($sql, ',');
            } else {
                $sql .="$key = $valor";
            }
        } else {
            $sql .= " 1";
        }

        $link = $this->Conectarse();
        $respuesta = mysql_query($sql, $link);
        //  $this->cerrarConexion();

 
        $fila = mysql_fetch_row($respuesta);

        if (!$fila) {
            return NULL;
        } else {
            return $fila;
        }
    }

}

?>