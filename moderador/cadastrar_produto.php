<?php
session_start();
//Inclui arquivo conexao
require_once('../conexao/conexao.inc.php');

// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !

$nome = $_POST["nome"];	
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$ativo = 1;


// Cria a conexao

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);


//Inserção do registro


if (isset($_POST["nome"]))
{

$sql = 'INSERT INTO Produtos (nome,categoria,preco,ativo,descricao) 
	Values (:nome, :categoria, :preco, :ativo, :descricao)';

$stmt = $db->prepare($sql);
$stmt->execute(['nome'=>$nome, 'categoria'=>$categoria, 'preco'=>$preco,'ativo'=>$ativo, 'descricao'=>$descricao]);



echo "<script>alert('Produto Inserido com Sucesso')</script>";

echo "<meta http-equiv='refresh' content='1;url=tela_moderador.php'>";
}else {

    echo "<script>alert('Você precisa estar logado para realizar esta função')</script>";
}

    ?>

  



