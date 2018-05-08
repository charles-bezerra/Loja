<?php
session_name("admin");
session_start();

if(!isset($_SESSION['login']) || ($_SESSION['login'] != "OK") ) {
    $_SESSION["error"] = "Você deve se autenticar!";
    header("location:loginAdmin.php");
}else{
    session_destroy();
    header('location:index.php');
}


?>
