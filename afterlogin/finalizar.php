<?php
	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}
	include 'connect.php';
	session_start();
	$nf = $_SESSION['nf'];
	$total = $_GET['total'];
	echo "Nota Fiscak: ". $nf ."<br>";
	echo "Total:". $total ."<br>";

	$consulta = $connecting -> prepare(
		"UPDATE nota_fiscal SET valor_total ='$total' WHERE nf = '$nf'"
	);
	$consulta -> execute();

	header('Location: logout.php');
?>