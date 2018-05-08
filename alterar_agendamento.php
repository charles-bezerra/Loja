<?php
    function excluir($cod){
      $con = mysqli_connect('localhost','root','jun08071998','netInfo');
      $sql="call rm_manutencao($cod)";
      // $sql = "delete from Manutencao_Agendada where cod = $cod";
      mysqli_query($con,$sql);
      mysqli_close($con);
    }
    function add_visita($cod){
        $feito = $_POST['feito'];
        $data = $_POST['data'];
        $orcamento = $_POST['orcamento'];
        $tecnico = $_POST['tecnico'];
        $con = mysqli_connect('localhost','root','jun08071998','netInfo');
        $result = mysqli_query($con, "insert into Visita values($cod,$tecnico,'$feito','$data','$orcamento')");
    }
    $cod = $_POST['cod'];
    $comando = $_POST['comando'];
    if($comando == 2){
        excluir($cod);
    }elseif ($comando == 1) {
        add_visita($cod);
    }
?>
