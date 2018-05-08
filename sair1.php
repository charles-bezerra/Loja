<?php
session_name("cliente");
session_start();

if(!isset($_SESSION['loginCliente']) || ($_SESSION['loginCliente'] != "OK") ) {
    $_SESSION["error"] = "Você deve se autenticar!";
    header("location:loginCliente.php");
}else{
    session_destroy();
    header('location:index.php');
}


?>
