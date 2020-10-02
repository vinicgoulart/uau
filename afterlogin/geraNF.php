<?php 
	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}
	include 'connect.php';
	$dataAtual = $_POST['data'];
	$consulta = $connecting -> prepare("INSERT INTO nota_fiscal (data) VALUES ('$dataAtual')");
	$consulta -> execute();
	header('Location: seleUltimaNF.php');
?>