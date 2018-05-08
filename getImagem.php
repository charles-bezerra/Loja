<?php
$host = "localhost";
$username = "root";
$password = "jun08071998";
$db = "netInfo";
$PicNum = $_GET["PicNum"];

$con = mysqli_connect($host,$username,$password, $db) or die("Impossível conectar ao banco.");
$result=mysqli_query($con, "select PES_IMG from Imagens WHERE PES_ID=$PicNum") or die("Impossível executar a query ");
$row=mysqli_fetch_array($result);
Header( "Content-type: image/jpg");
echo $row['PES_IMG'];

mysqli_close($con);
?>
