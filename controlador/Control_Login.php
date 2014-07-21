<?php

include_once '../DAO/Dao_Empresa.php';


if (isset($_GET['var'])) {
    $tipo = $_GET['var'];
    if ($tipo == "login") {
        Login::validarLogin($_POST['NIT'], $_POST['password']);
    }
}

class login {

    function __construct() {
        # code...
    }

    public static function validarLogin($NIT, $password) {
        $dao = new Dao_Empresa();
        $fila_empresa = $dao->buscar($NIT, $password);
        
        if ($fila_empresa != null && count($fila_empresa) > 0) {
            session_start();

            $_SESSION['NIT'] = $NIT;
            $_SESSION['password'] = $password;
            $_SESSION['nombre'] = $fila_empresa["empresa"];
            $_SESSION['id'] = $fila_empresa["id"];


            Header("location:../index.php");
        } else {
            header("location:../Vista/Login.php?var=error");
            echo 'erro';
        }
    }

}

?>