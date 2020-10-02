<?php
	session_start();

	include 'afterlogin/connect.php';

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$consulta = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";

	$resultado = $connecting->query($consulta);
	$registros = $resultado->num_rows;
	$resultado_usuario = mysqli_fetch_assoc($resultado);

	if ($registros == 1){
		$_SESSION['email'] = $email;
		
		$_SESSION['senha'] = $senha;

		 //caso for aprovado:
		
		header('Location: afterlogin/index.php');
	} else { //caso nada for encontrado: 
		
		header('Location: index.php');	
	}

?>

