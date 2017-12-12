<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/cadastrar.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<h2>Cadastrar</h2><br>
<?php

if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['CPF'])){
	require_once("conexao/conexao.inc.php");
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);

	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$nome = $_POST['nome'];
	$cpf = $_POST['CPF'];
	$endereco = $_POST['endereco'];
	$tel = $_POST['telefone'];
	$ativo = 1;


	$sql = "INSERT INTO clientes
				(email,senha,nome,cpf,endereco,telefone, ativo)
				VALUES (:email, :senha, :nome, :cpf, :endereco, :telefone, :ativo)";

	$stmt=$db->prepare($sql);
	$stmt->execute(['email'=>$email, 'senha'=>$senha,'nome'=>$nome, 'cpf'=>$cpf, 'endereco'=>$endereco, 'telefone'=>$tel, 'ativo'=>1]);
	header("Location: login.php");
}else{

?>

<div class="container">

<form method="POST" class="form" action="cadastrar.php">

	<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nome:</label>
   <div class="col-10">
    <input class="form-control" type="text" name="nome" value="Nome" id="nome">
  </div>
</div>
<div class="form-group row">
  <label for="example-email-input" class="col-2 col-form-label">Email</label>
  <div class="col-10">
    <input class="form-control" type="email" name="email" value="alex@example.com" id="example-email-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-password-input" class="col-2 col-form-label">Senha</label>
  <div class="col-10">
    <input class="form-control" type="password" name="senha" value="Senha" id="example-password-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
  <div class="col-10">
    <input class="form-control" type="tel" name="telefone" value="(55) 95555-5555" id="example-tel-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">CPF:</label>
  <div class="col-10">
    <input class="form-control" type="number" value="CPF" name="CPF" id="example-text-input" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Endereço:</label>
  <div class="col-10">
    <input class="form-control" type="text" name="endereco" value="Endereço" id="example-text-input">
  </div>
</div>

<button type="submit" class="btn" onClick="javascript:window.location.href='index.php'">Voltar</button>
<button type="submit" class="btn">Cadastrar</button>

</form>

</div>
<?php
}
?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>