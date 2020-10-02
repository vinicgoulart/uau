<?php
    

	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}


include 'connect.php';

$nome = $_POST['nome'];
$preco = $_POST['preco'];

$sql = $connecting -> prepare ("INSERT INTO `produtos`( `nome`, `preco`) VALUES ('$nome', '$preco')");

$sql -> execute();

header('Location: index.php');
?>