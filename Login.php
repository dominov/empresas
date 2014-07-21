<?php
session_start();
if (isset($_SESSION['NIT'])) {
    header("location:index.php");
    # code...
}
?>
<html>
    <head>
        <title>Ingreso de Empresas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="CSS/estilo_login.css">
    </head>
    <body>
        <form action="controlador/Control_Login.php?var=login" method="post" class="login"> 
            
            <div><label>NIT</label><input name="NIT" type="text" ></div> 
            <div><label>Contrase&ntilde;a</label><input name="password" type="password"></div> 
            <div><input name="login" type="submit" value="login"></div> 
        </form> 
        <?php
        if (isset($_GET['var'])) {
            if ($_GET['var'] == "error") {
                echo '<div class="error">Nit o Contrase&nacute;a incorrectos<br/> intente nuevamente.</div>';
            }
        }
        ?>

    </body>
</html>
