<?php

include 'connect.php';

$consulta = "SELECT * FROM produtos";

foreach($connecting -> query($consulta) as $linha){
?>

    <?php echo $linha['nome'] ?>

    R$ <?php echo $linha['preco'] ?>
<br>
<?php } ?>
<br>
  <a href="index.php">Voltar Início</a>
  