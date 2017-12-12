
<!DOCTYPE html>
<html>
<head>

<?php 
session_start();

$sessao = $_SESSION['autenticacao'];
$usuario = $_SESSION['usuario'];

if($sessao != true){
	echo $sessao;
	echo "<script>alert('Você precisa estar logado para ter acesso a esta Pagina')</script>";
	echo "<meta http-equiv='refresh' content='0.0;url=moderador.php'>";

}else {

	require_once('../conexao/conexao.inc.php');

	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

	$sql = 'SELECT * FROM Produtos
	WHERE Ativo = 1';

	

?>
<link rel="stylesheet" type="text/css" href="../css/tela_moderador.css">
<link rel="stylesheet" href="../css/produtos.css">


	<title>Tela dos Clientes</title>
</head>
<body class="news">

	

	 <header>
    <div class="nav">
      <ul>
      	<?php

	echo '<h1>Olá Moderador ' . ucfirst($usuario) . ' </h1>' ;
	//unset($_SESSION['autenticacao']);
	?>
        <li class="home"><a href="tela_moderador.php">Home</a></li>
        <li class="clientes"><a class="active" href="produtos.php">Produtos</a></li>
        <li class="sair"><a href="logout.php">Sair</a></li>
      </ul>

    </div>
  </header>

<?php
echo "<form action='remover.php' action='get'>";
  foreach($db->query($sql) as $row){
	   $str = $row['preco'];
	   $var = (double)filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		
		echo '<table>';
		echo '<th>ID Produto</th>';
  		echo '<th>Nome Produto</th>';
  		echo '<th>Categoria</th>';
  		echo '<th>Preço</th>';
		echo '<th>Descricao Produto</th>';
		echo '<th>Remover</th>'; 
		echo '<tr>';
		echo '<td>' . $row['id'] . ' </td>';
		echo '<td>' . $row['nome'] . ' </td>';
		echo '<td>' . $row['categoria'] . ' </td>';
		echo '<td>' . $var . ' </td>';
		echo '<td>' . $row['descricao'] . ' </td>';
		echo "<td><button type='submit' class='btn' name='id' value='". $row['id']. "'>Remover</button></td>";
		echo '</tr>';
		echo '</table>';
		echo '<br>';
		
		
	}
	echo '</form>';
?>


</body>
</html>



<?php
}
?>





