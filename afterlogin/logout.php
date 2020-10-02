<?php 
session_start();
unset(
	$_SESSION['nf']
);
header('Location: index.php');

?>