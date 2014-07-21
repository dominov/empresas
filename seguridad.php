<?php
session_start();
if (!isset($_SESSION['NIT'])) {
    header("location:../Empresas/login.php");
} else {
    include_once "Modelo/Empresa.php";
    $empresa = new Empresa($_SESSION['NIT'], $_SESSION['password'], $_SESSION['nombre'], $_SESSION['id']);
}
?>
