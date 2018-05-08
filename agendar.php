<?php
    session_name("cliente");
    session_start();
    if(!isset($_SESSION['loginCliente']) && !isset($_SESSION['errorCliente'])){
        $_SESSION['loginCliente'] = '';
        $_SESSION['errorCliente'] = '';
        $_SESSION['errorClienteLogin'] = '';
    }
    elseif (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente'] != 'OK' or !isset($_SESSION['loginCliente'])) {
        $_SESSION['errorCliente'] = 'Você deve se autenticar';
        header('location:loginCliente.php');
    }
    if(!isset($_SESSION['errorAG'])){
        $_SESSION['errorAG'] = '';
    }
    function listar(){
        $con = mysqli_connect('localhost','root','jun08071998','netInfo') or die('Não foi possível acessar o banco');
        $cpf = $_SESSION['cpfCliente'];
        $sql = "select p.nome,p.cpf,m.data_,m.cod,m.bairro,m.rua,m.numero from Manutencao_Agendada as m, Pessoa as p where m.codCliente = '$cpf' and p.cpf = '$cpf'";
        $result = mysqli_query($con, $sql);
        echo "<h4 style='color:#757575;'>SEUS AGENDAMENTOS<span style='color:red'> PENDENTES</span></h4>";

        echo "<hr class='w-100'/>";
        $cont = 1;
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $sql1 = "select * from Visita as v where v.codManu = " . $row['cod'];
            $result1 = mysqli_query($con, $sql1);
            if(mysqli_num_rows($result1) == 0){
                  echo "<div class='card' style='width: 100%; margin-top: 20px;border: 0; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);'>";
                      echo "<ul class='list-group list-group-flush'>";
                          echo "<li class='list-group-item' style='background-color:#424242;color: white'><b>Agendamento: " . $cont .
                            "<button type='button' class='close' id=" . $row['cod'] . " onClick='excluir(this.id)'>
                              <span aria-hidden='true'>&times;</span>
                            </button></b></li>";
                          echo "<li class='list-group-item'><b>Código: </b>" . $row['cod'] . "</li>";
                          echo "<li class='list-group-item'><b>CPF: </b>" . $row['cpf'] . "</li>";
                          echo "<li class='list-group-item'><b>Cliente: </b>" . $row['nome'] . "</li>";
                          echo "<li class='list-group-item'><b>Data marcada: </b>" . $row['data_'] . "</li>";
                          echo "<li class='list-group-item'><b>Endereço: </b>" . "Rua " . $row['rua'] . ", Bairro " . $row['bairro'] . ", Nº " . $row['numero'] . "</li>";
                          echo "<li class='list-group-item' align='center' style='color:red'><b>Pendente</b></li>";
                      echo "</ul>";
                  echo "</div>";
                  $cont += 1;
                  $count += 1;
            }
        }
        if($count == 0){
              echo "<ul class='list-group list-group-flush'>";
                    echo "<li class='list-group-item' align='center'><b>Nenhum cadastro pendente no momento</b></li>";
              echo "</ul>";
        }


        $count2 = 0;
        echo "<h4 style='margin-top:50px;color:#757575;'><b>AGENDAMENTOS <span style='color:green;'>CONCLUIDOS</b></h4>";
        $sql1 = "select *
        from Manutencao_Agendada m, Pessoa p, Visita as v where p.cpf = m.codCliente and v.codManu = m.cod and p.cpf ='$cpf'";
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
          $count2 += 1;
        }
        if($count2==0){
            echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item' align='center'><b>Nenhum cadastro concluido no momento</b></li>";
            echo "</ul>";
        }

    }
?>
<html>
  <head>
      <title>Agendamento</title>

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
      <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbar-shrink"  id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#" style="font-family: Arial;color:#EEEEEE;">
            Sua conta
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu<i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                    <?php
                        echo $_SESSION['nomeCliente'];
                    ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                  Loja
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle='modal'  data-target='#add_modal' href="index.php">
                  Adicionar <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
              </a>
            </li>

            <li class="nav-item">
              <div class="dropdown">
                <div class="dropdown-toggle  nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                  Mais
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Configurações</a>
                    <a class="dropdown-item" href="sair1.php" style="color: red">Sair</a>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <div class="container" style="margin-top:80px">
        <div class="row">
          <div class="col-12" id='valores'>
                <?php listar()?>
          </div>
        </div>

        <div class="row" align='center'>
            <div class="col-12">
                <hr class="w-100"/>
            </div>
            <div class="col-12" style="padding: 10px">
                <button type='button' class='btn btn-primary' data-toggle='modal' style='box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);' data-target='#add_modal'>
                    Agendar uma visita
                </button>
            </div>
        </div>
    </div>




      <!-- Modal -->
      <div class="modal fade w-100" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" align='center' id="exampleModalLabel">Adicionar agendamento</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="add_manutencao.php">
            <div class="modal-body">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-6">
                                  <h5>Dados de Registro</h5>
                                  <div class="form-group">
                                       <label for='lbData'>Data desejada</label>
                                       <input type="date" class="form-control" id='data' required='required' placeholder="Data desejada para visita" name="data">
                                  </div>
                                  <div class='form-group'>
                                       <label for='lbSetor'>Setor</label>
                                       <select class="form-control" id='setor' name='setor'>
                                            <option>Não sabe o problema</option>
                                            <option>Impresoras</option>
                                            <option>Rede</option>
                                            <option>Computadores</option>
                                            <option>Laptops</option>
                                       </select>
                                  </div>
                                  <div class="form-group">
                                       <label for='lbCidade'>Cidade</label>
                                       <select class="form-control" id="cidades" name="cidades">
                                            <option>Caicó - RN</option>
                                            <option>Cruzeta - RN</option>
                                            <option>Ipueira - RN</option>
                                            <option>Jardim de Piranhas - RN</option>
                                            <option>Jucurutu - RN</option>
                                            <option>São Fernando - RN</option>
                                            <option>São João do Sabugi - RN</option>
                                            <option>São José do Seridó - RN</option>
                                      </select>
                                  </div>
                              </div>
                              <div class='col-sm-6'>
                                  <h5>Endereço</h5>
                                  <div class="form-group">
                                       <label for="ldRua">Rua</label>
                                       <input type="text" class="form-control" id='rua' required='required' placeholder="Rua tal" name='rua'>
                                  </div>
                                  <div class="form-group">
                                       <label for="ldNumero">Número</label>
                                       <input type="number" class="form-control" id='numero' required='required' placeholder="Número do local" name='numero'>
                                  </div>
                                  <div class="form-group">
                                       <label for="ldBairro">Bairro</label>
                                       <input type="text" class="form-control" id='bairro' required='required' placeholder="Bairro" name="bairro">
                                  </div>
                              </div>
                          </div>
                      </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button class="btn btn-primary">Confirmar</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      <div class="modal fade" id='modalExcluir'  aria-labelledby="exampleModalLabel" aria-hidden="true"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title"><b>Tem certeza que deseja cancelar essa visita?</b></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                   <label for="ldSenha">Senha</label>
                   <input type="password" class="form-control" id='senha' required='required' placeholder="Digite sua senha para de autenicação" name="senha">
                   <br/>
                   <p align='center' id='errorSenha2' style="color:red"></p>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='btn_confirme_excluir'>Confirmar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

      <?php
          echo $_SESSION['errorAG'];
          $_SESSION['errorAG'] = '';
      ?>

  </body>

  <script>
      function excluir(cod){
          $('#modalExcluir').modal('show');
          $('#btn_confirme_excluir').click(function(){
               var senha = document.getElementById('senha').value;
               var error = document.getElementById('errorSenha2');
               if(senha == "<?php echo $_SESSION['senhaCliente'];?>"){
                 error.innerHTML = '';
                 $.ajax({
                   type : 'POST',
                   url : 'alterar_agendamento.php',
                   data : {'cod': cod, 'comando': 2}
                 }).done(function(){
                   window.location.reload();
                 });
               }else{
                 error.innerHTML = 'Senha não confere';
             }
          });
      }
      $(document).ready(function(){
      });

  </script>
</html>
