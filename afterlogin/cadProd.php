<?php

session_start();

if(!isset($_SESSION['email'])){
    header('Location: ../index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastrarProd.php" method="POST">

    Nome item:<input name="nome"></input><br>
    Preco item:<input name="preco"></input><br>

	<input type="submit" name="Adicionar produto">
	</form>
    <a href="index.php">Voltar à Pagina Inicial</a>
</body>
</html>