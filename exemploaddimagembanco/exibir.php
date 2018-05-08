<?php

$host = "localhost";
$username = "root";
$password = "jun08071998";
$db = "testeimagem";

$con = mysqli_connect($host,$username,$password, $db) or die("Impossível conectar ao banco.");

$result=mysqli_query($con, "SELECT * FROM PESSOA") or die("Impossível executar a query");

while($row=mysqli_fetch_array($result)) {
	echo "<img src='getImagem.php?PicNum=" . $row['PES_ID'] . "'\>";
}

	mysqli_close($con);

?>
