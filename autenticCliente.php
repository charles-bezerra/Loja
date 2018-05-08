<?php
    session_name("cliente");
    session_start();
    $cpf = $_GET['cod'];
    $senha = $_GET['senha'];
    $con = mysqli_connect('localhost','root','jun08071998','netInfo');
    $sql = mysqli_query($con,"select * from Pessoa as p where p.cpf = '$cpf' and p.admin = 'False' and p.senha = '$senha'");
    if (mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_array($sql);
        $_SESSION['loginCliente'] = 'OK';
        $_SESSION['cpfCliente'] = $row['cpf'];
        $_SESSION['nomeCliente'] = $row['nome'];
        $_SESSION['senhaCliente'] = $row['senha'];
        $_SESSION['errorClienteLogin'] = '';
        header("location:agendar.php");
    }else{
        $_SESSION['errorClienteLogin'] = 'cpf ou senha está incorreto';
        $_SESSION['loginCliente'] = '';
        header("location:loginCliente.php");
    }
    mysqli_close($con);
?>
