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
		echo "<br>";
		session_start();
		$nf = $_SESSION['nf'];
		echo "<b>Numero da nota fiscal: ". $nf . "</b> <br>";
		$idProduto = $_POST['produtoOpcao'];
		$qtdeProduto = $_POST['qtde'];

		$consulta = "SELECT preco,nome FROM produtos WHERE id='$idProduto'";
		$consulta = $connecting->query($consulta);
		$linhaAtual = $consulta->fetch_assoc();

		$preco = $linhaAtual['preco'];
		$nome = $linhaAtual['nome'];

		$sub = $preco * $qtdeProduto;

	?>
	<form action="insereItemNF.php" method="POST">
		<p>Id do produto:
			<input type="text" name="idProduto" value="<?php echo $idProduto; ?>" reandonly="reandonly">
		</p>
		<p>Produto:
			<input type="text" name="nomeProduto" value="<?php echo $nome; ?>" reandonly="reandonly">
		</p>
		<p>Valor unitário:
			<input type="text" name="uniValorProduto" value="<?php echo $preco; ?>" reandonly="reandonly">
		</p>
		<p>Quantidade:
			<input type="text" name="qtdeProduto" value="<?php echo $qtdeProduto; ?>" reandonly="reandonly">
		</p>
		<p>Subtotal:
			<input type="text" name="sub" value="<?php echo $sub; ?>" reandonly="reandonly">
		</p>
		<input type="submit" name="Adicionar produto">

	</form>
</body>
</html>