


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/login.css">
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>

<style>
body {
    background-image: url("img/background-login.jpg");
position: relative;
}

</style>

<?php
session_start();
require_once('conexao/conexao.inc.php');

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);



?>
</head>
<body>

<div class="container">

<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tela de Usuario</h4>
            </div>
            <div class="modal-body">
				<h2>Bem vindo.</h2>
                <form class="form-login" action="login.php" method="post">
                    <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email Address" name="email">
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 


if(count($_POST)){

	$sql = 'SELECT * FROM clientes
	WHERE email = :email
	AND ativo = 1';

	$stmt = $db->prepare($sql);
	$stmt->execute(['email' => $_POST['email']]);
	$reg = $stmt->fetch();

	if(count($reg) > 0){
		if($reg['senha'] == md5($_POST['senha'])){
			$_SESSION['autenticacao'] = true;
			$_SESSION['nome'] = $reg['Nome'];
			header("Location: index.php");
			die(0);
		}
	}
	echo "<h2 align='center'>Usuario ou senha Invalido!</h2>
	<script>alert('Usuario ou senha Invalido')</script>";

}

 ?>

</div>
</body>
</html>                            