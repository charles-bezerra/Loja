<?php
    session_name("admin");
    session_start();

    $cod = $_GET['cod'];
    $senha = $_GET['senha'];

    $conect = mysqli_connect('localhost','root','jun08071998','netInfo');
    $sql = "select * from Pessoa p where p.cpf = '$cod' and p.senha = '$senha' and p.admin = 'True'";

    $result = mysqli_query($conect, $sql);

    if(mysqli_num_rows($result)>0){
       $_SESSION['login'] = "OK";
       $_SESSION['error'] = "";
       header('location: view.php');
    }else{
       $_SESSION['error'] = "Código ou senha está incorreto";
       header('location:loginAdmin.php');
    }
    mysqli_close($conect);
?>
