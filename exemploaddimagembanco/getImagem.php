<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "testeimagem";
	$PicNum = $_GET["PicNum"];

	$con = mysqli_connect($host,$username,$password, $db) or die("Impossível conectar ao banco."); 
	$result=mysqli_query($con,"SELECT * FROM PESSOA WHERE PES_ID=$PicNum") or die("Impossível executar a query "); 
	$row=mysqli_fetch_array($result); 
	Header( "Content-type: image/gif"); 
	echo $row['PES_IMG']; 



	mysqli_close($con);
?>