<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    

    <title>Loja Master</title>

    <style>
    </style>



</head>
<body>
<?php
session_start();
require_once('conexao/conexao.inc.php');
$auth = false;
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

if(isset($_SESSION['autenticacao'])){
$auth = $_SESSION['autenticacao'];
}



?>

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
          <a class="dropdown-item" href="produto.php?categoria=3">Acessórios</a>
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
</figure>
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

<div class="container">
    <h2>Contato</h2>
</div>

<div class="container">
<br>
<img class="d-block w-100" src="img/contato.jpg" alt="First slide" width="100%">
<br>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>