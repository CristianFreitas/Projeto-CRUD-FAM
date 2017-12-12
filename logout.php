<?php
    session_start();
	echo "<script>alert('Deslogado com Sucesso')</script>";
    $_SESSION['autenticacao'] = false;
    session_destroy();
    unset($_SESSION['nome']);
	sleep(2);
	header("Location: index.php");
	die(0);

    
?>

