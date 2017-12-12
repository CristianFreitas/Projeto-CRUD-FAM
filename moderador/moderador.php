<!DOCTYPE html>
<html>
<head>
	<title>Tela de Moderador</title>
	<link rel="stylesheet" type="text/css" href="../css/moderador.css">
</head>
<body>

<?php	 
require_once('../conexao/conexao.inc.php');
session_start();

if(isset($_SESSION['autenticacao'])){

$sessao = $_SESSION['autenticacao'];

if($sessao == true){
    echo "<script>alert('Você esta já esta logado')</script>";
		echo "<meta http-equiv='refresh' content='0.1;url=tela_moderador.php'>";
		
}}else {

?>

	<div class="wrapper">
  <form method="post" action="moderador.php">
    <h2>Bem vindo Moderador</h2>
    <hr class="sep"/>
    <div class="group">
      <input type="email" required="required" name="email"/><span class="highlight"></span><span class="bar"></span>
      <label>Email</label>
    </div>
    <div class="group">
      <input type="password" required="required" name="senha"/><span class="highlight"></span><span class="bar"></span>
      <label>Password</label>
    </div>
    <br>
    <div class="btn-box">
      <button class="btn btn-submit" type="submit">Entrar</button>
      <h5><span class="emoji">&#x1F609;</span></h5>
    </div>
  </form>
</div>

	<?php 




$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);


if(count($_POST)){

	$sql = 'SELECT * FROM Moderadores
	WHERE email = :email
	AND ativo = 1';

	$stmt = $db->prepare($sql);
	$stmt->execute(['email' => $_POST['email']]);
	$reg = $stmt->fetch();


	if(count($reg) > 0){
		if($reg['senha'] == md5($_POST['senha'])){
			$_SESSION['autenticacao'] = true;
			$_SESSION['usuario'] = $_POST['usuario'];
			header('Location: tela_moderador.php');
			
		}
	}
	echo "<h2 align='center'>Usuario ou senha Invalido!</h2>
	<script>alert('Usuario ou senha Invalido')</script>";

	}
}

 ?>

</body>
</html>