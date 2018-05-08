<?php
    session_name("cliente");
    session_start();
    if(!isset($_SESSION['loginCliente']) or $_SESSION['loginCliente'] != 'OK'){
        $_SESSION['loginCliente'] = '';
        $_SESSION['errorClienteLogin'] = '';
    }
    elseif (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente'] == 'OK') {
        header('location:agendar.php');
    }
?>
<html>
<head>
      <title>Cadastro cliente</title>

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

      <script type="text/javascript" src="jquery-3.2.1.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

      <!--Meu código-->
      <script src='js/demo2.js'></script>
      <link rel="stylesheet" href="css/style.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark navbar-shrink"  id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php#home" style="font-family: 'Kaushan Script','Helvetica Neue',Helvetica,Arial,cursive;">Loja</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu<i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php#servicos">Serviços</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#produtos">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#assis">Assistência</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#contato">Contato</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form method="get" action="add_cliente.php">
      <div class="container">
          <div class="display" style="padding: 1px; margin-top: 20px; border-radius:10px; background-color:#F5F5F5">
              <div class="row" align='center'>
                  <div class='col-12'>
                      <i class="fa fa-user-plus fa-4x" aria-hidden="true"></i>
                  </div>
                  <div class="col-12">
                      <p>Cadastre-se</p>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                  <h5 style="background-color:#F5F5F5; border-radius: 5px; padding: 10px">Dados de usuário</h5>
                  <div class="form-group">
                      <label for='lbCPF'>CPF</label>
                      <input type="text" class="form-control" id='cpf' required='required' pattern="\d{3}.\d{3}.\d{3}-\d{2}" title='CPF não atende ao formato nnn.nnn.nnn-nn' placeholder='Código de Pessoa Física' name="cpf">
                      <small id='errorCPF'  class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                      <label for='lbNome'>Nome</label>
                      <input type="text" class="form-control" id='nome' required='required' placeholder="Nome completo" name="nome">
                  </div>
                  <div class="form-group">
                      <label for='lbTelefone'>Telefone</label>
                      <input type="text" class="form-control" id='telefone' required='required' placeholder="Telefone para contato" name="telefone">
                      <small id='errorTelefone'  class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                      <label for='lbIdade'>Idade</label>
                      <input type="number" class="form-control" id='idade' required='required' placeholder="Sua idade" name="idade">
                  </div>
              </div>
              <div class="col-sm-6">
                  <h5 style="background-color:#F5F5F5; border-radius: 5px; padding: 10px">Dados de conta</h5>
                  <div class="form-group">
                      <label for='lbEmail'>Email</label>
                      <input type="email" class="form-control" id='email' required='required' placeholder="nome@exemplo.com" name="email">
                  </div>
                  <div class="form-group">
                      <label for='lbSenha'>Senha</label>
                      <input type="password" class="form-control" id='senha' required='required' placeholder="Escolha uma senha de acesso" name='senha'/>
                  </div>
                  <div class="form-group">
                      <label for='lbSenha-c'>Confirma a senha</label>
                      <input type="password" class="form-control" id='senha_c' required='required' placeholder="Agora confirme sua senha" name='senha_c'/>
                  </div>
              </div>
          </div>
          <p style="padding: 0 10%; color: red" id='error' align='center'>
                <?php
                    echo $_SESSION['errorCliente'];
                ?>
          </p>
          <hr class="w-100"/>
          <div class="row"  align='center'>
              <div class="col-12">
                  <button class="btn btn-primary">Confirmar</button>
              </div>
          </div>
      </div>
  </form>
</html>
