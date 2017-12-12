<?php
    session_start();
	echo "<script>alert('Deslogado com Sucesso')</script>";
    
    $_SESSION['autenticacao'] = false;
    session_destroy();
    unset($_SESSION['nome']);

	echo "<meta http-equiv='refresh' content='1;url=moderador.php'>";
	die(0);

    
?>

