<?php
    session_name("cliente");
    session_start();
    if(!isset($_SESSION['loginCliente'])){
        $_SESSION['loginCliente'] = '';
        $_SESSION['errorClienteLogin'] = '';
    }
    elseif (isset($_SESSION['loginCliente']) && $_SESSION['loginCliente'] == 'OK') {
        header('location:agendar.php');
    }
?>
<html>
<head>
  <title>Cliente</title>

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

  <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:#EEEEEE">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink"  id="mainNav">
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

      <div class="container">
          <form method="get" action="autenticCliente.php">
            <div style="padding: 8% 29%">
                <div style="padding: 7%; background-color:#F5F5F5; border-radius: 30px ;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);">
                  <div class="row" style="padding-bottom: 20px" align='center'>
                      <div class="col-12"><i class="fa fa-user-circle fa-4x" aria-hidden="true"></i></div>
                  </div>
                  <div class='form-group'>
                        <label for="lbCodigo">CPF</label>
                        <input type="text" class="form-control" required='required' id='cod' placeholder="Código de entrada(CPF)" name='cod'/>
                  </div>
                  <div class='form-group'>
                        <label for="lbSenha">Senha</label>
                        <input type="password" class="form-control" required='required' id='senha' placeholder="Senha de entrada" name='senha'/>
                  </div>
                  <p style="padding: 0 10%; color: red" id='error' align='center'>
                        <?php
                            echo $_SESSION['errorClienteLogin'];
                        ?>
                  </p>
                  <div class="row" align='center' style="padding-top: 20px">
                      <div class="col-12">
                          <button type="submit" style="width: 130px" class="btn btn-info">Entrar </button>
                      </div>
                      <div class="col-12">
                          <a class="btn" style="font-size: 17px"href="cadastroCliente.php">Cadastrar-se</a>
                      </div>
                  </div>
              </div>
          </div>
        </form>


      </div>




</body>

</html>
