<!DOCTYPE html>
<html>
<head>
	<?php
session_start();

require_once('conexao/conexao.inc.php');
$auth = false;
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

if(isset($_SESSION['autenticacao'])){
$auth = $_SESSION['autenticacao'];

if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();
}

if(isset($_GET['id'])){
		$selecionado = intval($_GET['id']);
		if(!isset($_SESSION['carrinho'][$selecionado])){
			$_SESSION['carrinho'][$selecionado] = 1;
		}else{
			$_SESSION['carrinho'][$selecionado] += 1;
		}
}
}



?>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

	<title>Produtos</title>
</head>
<body>

<!----------------- nav bar-------------------------->

<div class="container-full">

<div class="container">
<nav class="navbar navbar-expand-lg">
 <h2> <a class="navbar-brand" href="#">Loja Master</a> </h2>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contato.php">Contato</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<b>Produtos</b>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="produto.php?categoria=1">Computadores e Notebooks</a>
					<a class="dropdown-item" href="produto.php?categoria=2">Headphones</a>
					<a class="dropdown-item" href="produto.php?categoria=3">Acessorios</a>
				</div>
			</li>
		</ul>
	</div>
	<form class="form-inline">
	<div class="modal-body">


	<ul class="navbar-nav">
	<li class="nav-item">
		<?php
	if($auth){
			echo count($_SESSION['carrinho']);
	?>
	<a href="carrinho.php"><img src="img/carrinho.jpg" alt="..." class="img1"></a>
	<?php
	}
	?>
	</li>
	<li class="nav-item">
	<?php
	
		if($auth){
			echo "Bem vindo: " . $_SESSION['nome'];
			?>

		<a href="logout.php" class="btn btn-primary btn btn-outline-info">Logout</a>

			<?php
		}else {
			?>
	     <a href="cadastrar.php" class="btn btn-primary btn btn-outline-info">Cadastrar</a>
		 <a href="login.php" class="btn btn-primary btn btn-outline-info">Login</a>
			<?php
		}
				?>
</ul>
</div>
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0 btn btn-outline-info" type="submit">Search</button>
	</form>
</nav>
</div>

<!-----------------FIM nav bar-------------------------->




<!-----------------Slider-------------------------->

<div class="container">
<img class="d-block w-100" src="img/images.jpg" alt="First slide" width="100%">
</div>

<!-----------------FIM Slider-------------------------->

<div class="container">

<h2>Promoções</h2>

</div>

<!-----------------CARD Produtos-------------------------->

<div class="container">
	<div class="card-deck">

			<?php

			$categoria = $_GET['categoria'];
			$ativo = 1;
			
			$sql = "SELECT *
										FROM produtos
										where ativo = :ativo
										AND categoria = '".$categoria."'";

			 
			$stmt = $db->prepare($sql);
			$stmt->execute(['ativo' => $ativo]);
			$regs = $stmt->fetchAll();

			$teste = count($regs);



			foreach($regs as $row){


			?>


	

			<div class="card">
				<p> <center><?php echo "<img heigth = '".$row['imagem']."' width='".$row['largura']."' src='img/produtos/".$row['imagem']."'"?></center> </p>
				<div class="card-body">
					<h3 class="card-title"><?php echo $row['nome']?></h3>

					<p class="card-text"><?php echo $row['descricao']?></p>
					<h4 class="card-title">Preço: <?php echo number_format($row['preco'],2,',','.')?></h4>
				</div>
				<div class="card-footer">
			<?php       
			 echo  "<a href='produto.php?id=".$row['id']."&categoria=".$categoria."' class='btn btn-primary btn btn-outline-info adicionar'>Adicionar Carrinho</a>";
			?>
				</div>
			</div>




<?php
}
?>

</div>
</div>

</div>
<!-----------------FIM card produtos-------------------------->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>