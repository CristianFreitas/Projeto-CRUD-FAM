<?php
//Inclui arquivo conexao
require_once('../conexao/conexao.inc.php');
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !



if (isset($_GET["id"]))
{

$id = $_GET["id"];	

$sql = 'DELETE FROM Produtos WHERE id = :id';


$stmt = $db->prepare($sql);
$stmt->execute(['id'=>$id]);

echo "<script>alert('Produto Removido com Sucesso')</script>";

echo "<meta http-equiv='refresh' content='1;url=produtos.php'>";


}else {
    echo "<script>alert('Você precisa estar logado para realizar esta função')</script>";
}







