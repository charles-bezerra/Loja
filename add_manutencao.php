<?php
    session_name('cliente');
    session_start();

    #Dados pessoais
    $cpf = $_SESSION['cpfCliente'];

    #Dados de registro
    $data = $_GET['data'];
    $setor = $_GET['setor'];
    $cidade = $_GET['cidades'];

    #Endereço
    $rua = $_GET['rua'];
    $numero = $_GET['numero'];
    $bairro = $_GET['bairro'];

    $conect = mysqli_connect('127.0.0.1','root','jun08071998','netInfo');
    $sql = "select * from Manutencao_Agendada m where m.codCliente = '$cpf' and m.data_ = '$data' and m.rua = '$rua' and m.numero = '$numero' and m.cidade = '$cidade'";
    $result = mysqli_query($conect, $sql);
    if(mysqli_num_rows($result) > 0){
       $_SESSION['errorAG'] = "<script>alert('Já existe esse agendamento em seu nome');</script>";
       header('location:agendar.php');
    }else{
        $sql1 = "insert into Manutencao_Agendada(codCliente, data_,rua,bairro,numero,setor,cidade) values('$cpf','$data','$rua','$bairro','$numero','$setor','$cidade')";
        mysqli_query($conect,$sql1);
        echo "Deu certo";
        header('location:agendar.php');
    }
    mysqli_close($conect);

?>
