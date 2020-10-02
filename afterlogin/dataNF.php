<?php 
include 'connect.php';
session_start();

if(!isset($_SESSION['email'])){
	header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerador de notas fiscais</title>
</head>
<body>
	<form action="geraNF.php" method="post">
		<p>Insira a data da venda</p>
		<h1> Data:<input type="date" name="data"> </h1>
		<input type="submit" name="Continuar">

	</form>

</body>
</html>