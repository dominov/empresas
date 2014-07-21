<?php
include_once ("./DAO/Dao_Comceptos.php");
include_once ("./logica/Herramientas.php");

function mostrar_tabla_comceptos($NIT) {

    $dao = new Dao_Comceptos();
    $comceptos = $dao->listar($NIT);
    $tabla = " <tbody>";
    while (is_array($comceptos) && (list($key, $val) = each($comceptos))) {

        $id = ($val["id"] != null) ? Herramientas::encriptar($val["id"],$NIT) : "--";
        $nombre = ($val["nombres"] != null) ? $val["nombres"] : "--";
        $apellidos = ($val["apellidos"] != null) ? $val["apellidos"] : "--";
        $numero = ($val["numero"] != null) ? $val["numero"] : "--";
        $ocupacion = ($val["ocupacion"] != null) ? $val["ocupacion"] : "--";
        $tabla .= <<<HTML
                
                
	<tr ">					
		<td>$nombre</td>
		<td>$apellidos</td>
		<td class="center"> $numero</td>
		<td class="center">$ocupacion</td>
                <td><a class="btn-mini btn-black btn-arrow-right" href="Imp_concep.php?c=$id"><span></span>Imprimir</a></td>
	</tr>				
HTML;
    }
    $tabla .="</tbody>";
    echo "$tabla";
}

?>