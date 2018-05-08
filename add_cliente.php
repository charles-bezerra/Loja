<?php
    session_start();
    $cpf = $_GET['cpf'];
    $nome = $_GET['nome'];
    $telefone= $_GET['telefone'];
    $idade = $_GET['idade'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $senha_c = $_GET['senha_c'];
    if($senha != $senha_c){
        $_SESSION['errorCliente'] = 'Senhas não conferem';
        header('location:cadastroCliente.php');
    }
    $sql = "select * from Pessoa as p where p.cpf = $cpf and p.email = $email";
    $con = mysqli_connect('localhost','root','jun08071998','netInfo') or die('Error ao conectar o banco');

    $result =  mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
          $_SESSION['errorCliente'] = "Usuário ja existente";
          header("location:cadastroCliente.php");
    }else{
          $_SESSION['cpfCliente'] = $cpf;
          $_SESSION['nomeCliente'] = $nome;
          $_SESSION['senhaCliente'] = $senha;
          $_SESSION['loginCliente'] = "OK";
          $aux = mysqli_query($con,"call add_pessoa('$cpf','$senha','False','$nome','$telefone','$email',$idade)");
          if($aux){
              header("location:agendar.php");
          }echo("Algo deu errado");
    }

    mysqli_close($con);
?>
