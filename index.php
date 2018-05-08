<!DOCTYPE html>
<html>

	<head>
			<title>NET INFORMÁTICA</title>

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
			<script src="js/demo.js"></script>
			<link rel="stylesheet" href="css/style.css">


	</head>


<body data-spy="scroll" data-target="#mainNav">
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top"  id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#home" style="font-family: 'Kaushan Script','Helvetica Neue',Helvetica,Arial,cursive;">Loja</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu<i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#servicos">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#produtos">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#assis">Assistência</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contato">Contato</a>
            </li>
						<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="loginCliente.php">Conta</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

		<header class="masthead" id='home'>
					<div style="background-color: black; position: absolute; width: 100%; height: 100%; opacity: 0.4;"></div>
					<div class="container" style="color:white; opacity:1; position: absolute; width: 100%; margin: 0% 8%">
							<div class="intro-text">
									<div class="intro-lead-in">Bem vindo a nossa loja!</div>
									<div class="intro-heading text-uppercase" >Encontre tudo aqui</div>
									<a class="btn btn btn-warning btn-xl text-uppercase js-scroll-trigger" style="color: white" href="#servicos">Ver mais</a>
							</div>
					</div>

		</header>

		<section id='servicos'>
					<div class="container" style="padding: 100px">

								<div class='row  justify-content-between'>
										<div class="col-lg-12 align-text-center">
													<h1 align='center'>Nossos serviços</h1>
													<p align='center' id='text-dark'>Conheça a maior e melhor assistência técnica de seridó</p>
										</div>
								</div>

								<div class='row justify-content-between'>

										<div class="col-sm-4 padding-100">
											<div class='row padding-30 card' align='center' style="margin-left: 10px">
													<div class='col-12'><img class="img-fluid" src='img/logo2.png'></div>
													<div class="col-12"><h5 align='center'>Manutenção Preventiva</h5></div>
													<div class="col-12"><p align='center' id='text-dark'>Venha conhecer nossos produtos, os quais: placas de video, placas de rede, HDs, Fones,Computadores Desktops, Loptops e entre outro</p></div>
											</div>
										</div>

										<div class="col-sm-4 padding-100">
											<div class='row padding-30 card' align='center'  style="margin-left: 10px">
													<div class='col-12'><img  id='image' class="img-fluid" src='img/logo1.png'></div>
													<div class="col-12"><h5 align='center'>Manutenção Corretiva</h5></div>
													<div class="col-12"><p align='center' id='text-dark'>Venha conhecer nossos produtos, os quais: placas de video, placas de rede, HDs, Fones,Computadores Desktops, Loptops e entre outro</p></div>
											</div>
										</div>

										<div class="col-sm-4 padding-100">
												<div class='row padding-30 card'  align='center' style="margin-left: 10px">
														<div class='col-12'><img  id='image' class="img-fluid" src='img/logo.png'></div>
														<div class="col-12"><h5 align='center'>Venda de eletrônicos</h5></div>
														<div class="col-12"><p align='center' id='text-dark'>Venha conhecer nossos produtos, os quais: placas de video, placas de rede, HDs, Fones,Computadores Desktops, Loptops e entre outro</p></div>
												</div>
										</div>
							</div>
					</div>
		</section>

		<section  id='produtos'>
				<div class="container">
								<div class="row" align='center'>
										<div class="col-sm-12">
												<h1 style="font-family: Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;">PRODUTOS</h1>
										</div>

										<div class="col-sm-12">
												<p id='text-dark'>Exemplos dos produtos encontrados em nossa loja</p>
										</div>
								</div>
				</div>



				<div class="container" style="padding-top: 10px">
							<div class="row" style="padding-top: 30px">
										<div class="col-sm-4">
														<img class='img-fluid anime1 w-100' src="img/7.jpg">
														<h5 align="center">Acessórios</h5>
										</div>
										<div class="col-sm-4">
														<img class='img-fluid anime1 w-100' src="img/3.jpg">
														<h5 align="center">Roteadores</h5>
										</div>
										<div class="col-sm-4">
												<img class='img-fluid anime1 w-100' src="img/9.jpg">
												<h5 align="center">Laptops</h5>
										</div>
							</div>

							<div class="row" align='center'  style="padding-top: 30px">
									<div class="col-12">
											<a href='imgs.php' class="btn btn-light"
															style="width: 200px;opacity: 0.6; border-radius: 50px">
															Ver
											</a>
									</div>
							</div>
			</div>
		</section>


		<section class="m-display" id='assis'>
				<div id='shandow' style="background-color: black; position: absolute; width: 100%; height: 100%; opacity: 0.2;"></div>
				<div class="container">
							<div class="row" align='center' style="padding-top: 125px">
									<div class="col-12">
												<h1>Manutenção em domicílio</h1>
												<p>Marque uma visita de nossos técnicas em sua residência</p>
									</div>
							</div>
							<div class="row" align='center' style="padding-top: 25px">
									<div class="col-12">
											<a class="btn btn-warning" href="loginCliente.php" style="color: white;  border-radius: 50px; width: 200px">Agendar</a>
									</div>
							</div>
				</div>
		</section>

		<section id='contato'>
				<div class="container" style="padding: 0px 100px">
						<div class='row'>
								<div class="col-12"><h2 style="font-weight: 300">Vamos entrar em contato</h2></div>
						</div>
						<hr style="max-width: 50px; border-color: orange; border-width: 3px; color: black"/>
						<div class='row'>
								<div class="col-12">
										<h5 style='font-weight: 300'>Pronto para começar a usar nossos serviçoes? Isso é ótimo! Ligue-nos ou envie-nos um e-mail e nós retornaremos o mais rápido possível.</h5>
								</div>
						</div>
						<div class="row" align='center' style="padding-top: 50px">
								<div class="col-sm-6">
										<i class="fa fa-phone fa-3x" aria-hidden="true"></i>
										<p><i>(84) 3417-1142</i></p>
								</div>
								<div class="col-sm-6">
										<i class="fa fa-envelope-o fa-3x" aria-hidden="true"></i>
										<p><a href="#">loja@exemplo.com<a></p>
								</div>
						</div>
						<div class="row" style="margin-top: 5%">
									<div class="col-12"><a href='loginAdmin.php' class="btn btn-outline-warning">Administração</a></div>
						</div>
				</div>
		</section>
		<footer align='center'>
				<b>All rights reserved by Charles Bezerra de Oliveira Júnior</b>
		</footer>
</body>
</html>
