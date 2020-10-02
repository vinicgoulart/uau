<?php 
	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}
include 'connect.php';

$consulta = "SELECT * FROM nota_fiscal";

foreach ($connecting -> query($consulta) as $linhaAtual) {
	echo "Nota Fiscal Nº: ".$linhaAtual['nf']."<br>";
	echo "Data: ".$linhaAtual['data']."<br>";
	echo "Valor total: ".$linhaAtual['valor_total']."<br>";

	$nota = $linhaAtual['nf'];
	$consulta2 = "SELECT * FROM itens_nf WHERE num_nf = '$nota'";
	foreach ($connecting -> query($consulta2) as $linhaAtual2) {
		echo "ID: ". $linhaAtual2['id'] ."<br>";
		echo "Código do produto: ".$linhaAtual2['cod_produto']. "<br>";
		$codigo=$linhaAtual2['cod_produto'];
		$consulta3 = "SELECT * FROM produtos WHERE id='$codigo'";
		foreach ($connecting -> query($consulta3) as $linhaAtual3) {
			echo "Produto: ".$linhaAtual3['nome']."<br>";
			echo "Valor unitário: ".$linhaAtual3['preco']."<br>";
		}

		echo "Quantidade: ".$linhaAtual2['qtde']."<br>";
		echo "Sub total: ".$linhaAtual2['subtotal']."<br>";
	}
	echo "<hr>";

}
echo "<br>";

?>
<p><a href="index.php">Voltar</a></p>