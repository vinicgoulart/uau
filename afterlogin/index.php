<?php

	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerador de Notas Fiscais</title>
</head>
<body>
	<h1>Iniciar uma nova venda</h1>
	<form action="dataNF.php" method="post">

		<input type="submit" name="Iniciar venda">

	</form>
	<a href="verNota.php">Clique para visualizar as notas emitidas</a> <br>
	<a href="Produtos.php">Ver produtos</a> <br>
	<a href="cadProd.php">Cadastrar produtos</a> <br>
	<a href="sair.php">Sair</a>
</body>
</html>