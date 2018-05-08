<?php
  $imagem = $_FILES["imagem"];
  $nome = $_POST["nome"];
  $desc = $_POST["desc"];
  $con = mysqli_connect('localhost','root','jun08071998', 'netInfo') or die("Impossível Conectar");

  if($imagem != NULL) {
  	$nomeFinal = time() . '.jpg';
  	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
  		$tamanhoImg = filesize($nomeFinal);
  		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
  		mysqli_query($con, "INSERT INTO Imagens (nome,descricao,tamanho,tipo_imagem,PES_IMG) VALUES ('$nome','$desc','$tamanhoImg','jpg','$mysqlImg')") or die("O sistema não foi capaz de executar a query");

  		unlink($nomeFinal);
      header('location:view.php');
  	}
  }
  else {
  	echo"Você não realizou o upload de forma satisfatória.";
  }

  	mysqli_close($con);

?>
