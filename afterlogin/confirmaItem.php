<?php

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
	<?php 
	include 'connect.php';
	echo "<hr>";
	session_start();
	$nf = $_SESSION['nf'];
	$consulta = "SELECT * FROM itens_nf WHERE num_nf = '$nf'";
	echo "Nota Fiscal: ". $nf ."<br>";
	$total = 0;
	foreach ($connecting -> query($consulta) as $linhaAtual) {
		echo "Código dos produtos:". $linhaAtual['cod_produto']. "<br>";
		echo "Quantidade:".$linhaAtual['qtde'] ."<br>";
		echo "Subtotal:".$linhaAtual['subtotal'] ."<br>";
		$total = $total + $linhaAtual['subtotal'];
		echo "<hr>";
	}
	echo "Total:".$total."<br>";
	?>


	<p> O que deseja fazer </p>
	<a href="seleUltimaNF.php">Inserir novo produto</a>
	<a href="finalizar.php?total=<?php echo $total; ?>">Finalizar nota fiscal</a>


</body>
</html>