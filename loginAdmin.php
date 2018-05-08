<?php
    session_name("admin");
    session_start();

    if(isset($_SESSION['error']) == False){
        $_SESSION['error'] = '';
    }
    if(isset($_SESSION['login']) && $_SESSION['login'] == 'OK'){
        header('location:view.php');
    }else{
        $_SESSION['login'] = False;
    }

?>
<html>
<head>
      <title>Entrar</title>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Charles Bezerra de Oliveira Júnior">
      <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body style="background-color: #EEEEEE">
    <nav class="navbar navbar-expand-lg navbar-dark" style='background-color: #212529'>
        <a class="navbar-brand" href='#'>Administrador</a>
    </nav>
    <div class="container" style="padding-top: 70px">
        <form method="get" action="autenticAdmin.php" >
            <div style="width: 50%; padding: 5% 5%;margin-left: 25%; border-radius: 45px; background-color: white; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);">
                <div class="row" align='center'>
                    <div class="col-12">
                        <h5 align='center' style="padding-bottom: 25px">Entre como Administrador</h5>
                    </div>
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
                          echo $_SESSION['error'];
                      ?>
                </p>
                <div class="row" align='center' style="padding-top: 20px">
                    <div class="col-12">
                        <button type="submit" class="btn btn-info">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
