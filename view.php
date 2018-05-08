<?php
    session_name("admin");
    session_start();
    if(!isset($_SESSION['login']) or $_SESSION['login'] != 'OK'){
       $_SESSION['error'] = 'Você deve se autenticar';
       header('location:loginAdmin.php');
    }elseif(isset($_SESSION['login']) && $_SESSION['login'] == 'OK'){
        $_SESSION['error'] = '';
    }else {
        $_SESSION['error'] = 'Você deve se autenticar';
        header('location:loginAdmin.php');
    }

function agendamentos(){
      $con = mysqli_connect('localhost','root','jun08071998','netInfo');
      $sql = 'select * from Manutencao_Agendada m, Pessoa p where p.cpf = m.codCliente';
      $result = mysqli_query($con, $sql);
      echo "<h4><b>Agendamentos <span style='color:red'>pendentes</span></p></h4>";
      $cont = 0;
      while ($row = mysqli_fetch_array($result)) {
          $sql1 = "select * from Visita as v where v.codManu = " . $row['cod'];
          $result1 = mysqli_query($con, $sql1);
          if(mysqli_num_rows($result1) == 0){
                echo "<div class='card' style='width: 100%; margin-top: 20px;border: 0; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);'>";
                    echo "<ul class='list-group list-group-flush'>";
                        echo "<li class='list-group-item' style='background-color:#424242;color: white'><b>Pendente</b></li>";
                        echo "<li class='list-group-item'><b>Código: </b>" . $row['cod'] . "</li>";
                        echo "<li class='list-group-item'><b>CPF: </b>" . $row['cpf'] . "</li>";
                        echo "<li class='list-group-item'><b>Cliente: </b>" . $row['nome'] . "</li>";
                        echo "<li class='list-group-item'><b>Data marcada: </b>" . $row['data_'] . "</li>";
                        echo "<li class='list-group-item'><b>Endereço: </b>" . "Rua " . $row['rua'] . ", Bairro " . $row['bairro'] . ", Nº " . $row['numero'] . "</li>";
                        echo "<li class='list-group-item'><b>Cidade: </b>" . $row['cidade'] . "</li>";
                        echo "<li class='list-group-item' align='center' style='color:red'>
                        <div class='row' align='right'>
                            <div class='col-12'>
                                <button class='btn btn-primary' id='" . $row['cod'] . "' onClick='alterar_agendamento(this.id, 1)'>Confirmar</button>
                                <button class='btn btn-danger' id='" . $row['cod'] . "' onClick='alterar_agendamento(this.id, 2)'>Excluir</button>
                            </div>
                        </div>
                        </li>";
                    echo "</ul>";
                echo "</div>";
                $cont += 1;
          }
      }
      if($cont==0){
        echo "<ul class='list-group list-group-flush'>";
            echo "<li class='list-group-item' align='center'><b>Nenhum cadastro feito no momento</b></li>";
        echo "</ul>";
      }
      $cont2 = 0;
      echo "<h4 style='margin-top:50px'><b>Agendamentos <span style='color:green;'>concluidos</b></h4>";
      $sql1 = 'select * from Manutencao_Agendada m, Pessoa p, Visita as v where p.cpf = m.codCliente and v.codManu = m.cod';
      $result1 = mysqli_query($con, $sql1);
      while($row = mysqli_fetch_array($result1)){
        echo "<div class='card' style='width: 100%; margin-top: 20px;border: 0; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);'>";
            echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item' style='background-color:#424242;color: white'><b>Concluido</b></li>";
                echo "<li class='list-group-item'><b>Código: </b>" . $row['cod'] . "</li>";
                echo "<li class='list-group-item'><b>CPF: </b>" . $row['cpf'] . "</li>";
                echo "<li class='list-group-item'><b>Data da visita: </b>" . $row['data_'] . "</li>";
                echo "<li class='list-group-item'><b>Endereço: </b>" . "Rua " . $row['rua'] . ", Bairro " . $row['bairro'] . ", Nº " . $row['numero'] . "</li>";
                echo "<li class='list-group-item'><b>Cidade: </b>" . $row['cidade'] . "</li>";
                echo "<li class='list-group-item'><b>Detalhes: </b>" . $row['feito'] . "</li>";
                echo "<li class='list-group-item'><b>Valor: </b>R$" . $row['orcamento'] . "</li>";
            echo "</ul>";
        echo "</div>";
        $cont2 += 1;
      }
      if($cont2==0){
          echo "<ul class='list-group list-group-flush'>";
              echo "<li class='list-group-item' align='center'><b>Nenhum cadastro concluido no momento</b></li>";
          echo "</ul>";
      }
      mysqli_close($con);
}
function tecnicos(){
      $con = mysqli_connect('localhost','root','jun08071998','netInfo');
      $sql = "select * from Tecnico";
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($result)){
        echo "<option>" . $row['nome'] . " - " . $row['cod'].  "</option>";
      }
      mysqli_close($con);
}


?>

<html>

<head>
    <title>AdministraçãoNET</title>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Charles Bezerra de Oliveira Júnior">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
    integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <script src="jquery-3.2.1.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style='background-color: #212529'>
        <div class="container">
            <a class="navbar-brand" href='#'>Administração</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#modal3">Adcionar imagens ao site</a>
                </li>
                <li class="na-item">
                  <a class="nav-link" href="sair.php" style="color: red">Sair</a>
                </li>
              </ul>
            </div>
        </div>
    </nav>
    <section id='agendamentos'>
        <div class="container">
            <div style="width: 100%; margin-top: 50px;">
                <?php
                    agendamentos();
                ?>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aviso!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <h5>Preenchar os dados</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id='btn_confirmar_visita' class="btn btn-primary">Confirmar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aviso!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <h5>Tem certeza que deseja excluir?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id='btn_excluir_visita' class="btn btn-primary">Confirmar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100" id="exampleModalLabel" align='center'><b>CONFIRMAÇÃO DE VISITA</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class='container'>
                  <div class="form-group">
                    <label for="lbFeito">Descrição de atividades</label>
                    <input type="text" class="form-control" id='feito' required='required' placeholder="Descreva o que foi feito"/>
                  </div>
                  <div class="form-group">
                    <label for="lbData">Data da visita</label>
                    <input type="date" class="form-control" id='data' required='required'/>
                  </div>
                  <div class="form-group">
                    <label for="lbData">Orçamento</label>
                    <input type="number" class="form-control" id='orcamento' required='required' placeholder="R$00,00"/>
                  </div>
                  <div class="form-group">
                    <label for='lbTecnico'>Tecnico responsável</label>
                    <select class="form-control" id='tecnicos' name='tecnicos'>
                    </select>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id='btn_add_visita' class="btn btn-primary">Confirmar</button>
          </div>
        </div>
      </div>
    </div>



<!-- Modal 3-->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="gravarimagem.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Imagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" required='required' id='nome' name='nome' placeholder="Dê uma nome a imagem">
          </div>
          <div class="form-group">
              <label for="desc">Descrição</label>
              <input type="text" class="form-control" required='required' id='desc' name='desc' placeholder="Descrição da imagem">
          </div>
          <div class="form-group">
              <label for="imagem">Escolha uma imagem</label>
              <input type="file" required='required' name="imagem"/>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
    </div>
  </div>
</div>

</body>
<script>
      function alterar_agendamento(cod, comando){
          if(comando == 2){
              $('#modal2').modal('show');
          }else if (comando == 1) {
              document.getElementById('tecnicos').innerHTML = "<?php tecnicos();?>";
              $('#modal4').modal('show');
          }
          $('#btn_excluir_visita').click(function(){
              $('#modal2').modal('hide');
              $.ajax({
                type : 'POST',
                url : 'alterar_agendamento.php',
                data : {'cod': cod, 'comando': comando}
              }).done(function(){
                window.location.reload();
              });
          });
          $('#btn_add_visita').click(function(){

              var valor = document.getElementById('tecnicos').value;
              vetor = valor.split(" - ");
              tecnico = parseInt(vetor[1]);


              var feito = document.getElementById('feito').value;
              var data = document.getElementById('data').value;
              var orcamento = document.getElementById('orcamento').value;
              $('#modal4').modal('hide');
              $.ajax({
                type : 'POST',
                url : 'alterar_agendamento.php',
                data : {'cod': cod, 'feito': feito, 'tecnico': tecnico, 'data': data,'orcamento': orcamento, 'comando': comando}
              }).done(function(){
                window.location.reload();
              });
          });
      }
</script>
</html>
