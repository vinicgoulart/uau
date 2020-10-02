<?php 
	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}
include 'connect.php';
echo "<br><hr>";

$consulta = "SELECT MAX(nf) as ultima FROM nota_fiscal";
$consulta = $connecting->query($consulta);
$linhaAtual = $consulta->fetch_assoc();
$ultimoRegis = $linhaAtual['ultima'];
echo "Nota Fiscal: ".$ultimoRegis."<br>";
echo "<hr>";


session_start();
$_SESSION['nf'] = $ultimoRegis;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gerador de notas fiscais</title>
</head>
<body>

	<form action="insereItem.php?nf='<?php echo $ultimoRegis; ?>'" method="post">
		<h2>Nota fiscal: </h2> <input type="text" name="nf" value="<?php echo $ultimoRegis; ?>">
		<br>
		<p>
			Produto: 
			<select name="produtoOpcao" id="produtoOpcao">
				<?php 
					$consulta = "SELECT * FROM produtos";
					foreach ($connecting -> query($consulta) as $linhaAtual) {
					?>
					<option
					value="<?php echo $linhaAtual['id']; ?>">
					<?php echo $linhaAtual['nome'];?>
					</option>
					<?php
					}
					?>
			</select>
		</p>
		<p>
			Qtde: <input type="text" name="qtde">
		</p>
		<hr>
		<input type="submit" name="adicionar">
	</form>


</body>
</html>