<?php 
	session_start();

	if(!isset($_SESSION['email'])){
		header('Location: ../index.php');
	}

include 'connect.php';
session_start();
$nf = $_SESSION['nf'];
$idProduto = $_POST['idProduto'];
$qtde = $_POST['qtdeProduto'];
$subTotal = $_POST['sub'];


echo "Nota Fiscal -=-=-". $nf ."<br>";
echo "Id do produto -=-=-". $idProduto ."<br>";
echo "Quantidade -=-=-". $qtde ."<br>";
echo "Subtotal -=-=-". $subTotal ."<br>";


$consulta = $connecting->prepare(
	"INSERT INTO itens_nf (cod_produto, num_nf, qtde, subtotal)
	VALUES ('$idProduto', '$nf', '$qtde', '$subTotal')");
$consulta -> execute();
header('Location: confirmaItem.php');



?>
