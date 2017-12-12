<!DOCTYPE html>
<html>
<head>

<?php 
session_start();

$sessao = $_SESSION['autenticacao'];
$usuario = $_SESSION['usuario'];

if($sessao != true){
    echo "<script>alert('Você precisa estar logado para acessar esta tela')</script>";
    echo "<meta http-equiv='refresh' content='0.0;url=moderador.php'>";
}else {



?>
<link rel="stylesheet" type="text/css" href="../css/tela_moderador.css">
<link rel="stylesheet" type="text/css" href="../css/moderador.css">
<script src="../js/aviso.js"></script>

	<title>Tela dos Clientes</title>
</head>
<body class="news">

	

	 <header>
    <div class="nav">
      <ul>
      	<?php
   
	echo '<h1>Olá Moderador ' . ucfirst($usuario) . ' </h1>' ;
	
	?>
        <li class="home"><a class="active" href="tela_moderador.php">Home</a></li>
        <li class="clientes"><a href="produtos.php">Produtos</a></li>
        <li class="sair"><a href="logout.php" onclick="return sair();">Sair</a></li>
      </ul>

    </div>
  </header>

 
	<div class="wrapper">
  <form method="post" action="cadastrar_produto.php">
    <h2>Cadastrar Produto</h2>
    <hr class="sep"/>
    <div class="group">
      <input type="text" required="required" name="nome"/><span class="highlight"></span><span class="bar"></span>
      <label>Nome do Produto</label>
    </div>
    <div class="group">
      <input type="number" required="required" name="categoria"/><span class="highlight"></span><span class="bar"></span>
      <label>Categoria</label>
    </div>
     <div class="group">
      <input type="text" required="required" name="preco"/><span class="highlight"></span><span class="bar"></span>
      <label>Preço</label>
    </div>
      <div class="group">
      	<textarea required="required" name="descricao"></textarea><span class="highlight"></span><span class="bar"></span>
      <label>Descrição do Produto</label>
      </div>
    <div class="group">
		<input type="file" name="imagem"/><span class="highlight"></span><span class="bar"></span>
    <label for="imagem">Imagem:</label>
    </div>
    <div class="btn-box">
      <button class="btn btn-submit" type="submit">Cadastrar</button>
      <h5><span class="emoji">&#x1F609;</span></h5>
    </div>
  </form>
</div>


</body>
</html>



<?php
}
?>





