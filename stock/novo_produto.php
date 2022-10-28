<?php
include('session.php');
include('fetch.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="styleStock.css" />
  <title>Estoque</title>
</head>

<body>

  <div id="navbar">
    <a href="produtos.php">Produtos</a>
    <a class="active" href="novo_produto.php">Novo Produto</a>
    <a href="nova_categoria.php">Nova Categoria</a>
    <a href="../logout.php">Sair</a>
  </div>

  

  <script src="scriptStock.js">

  </script>
</body>

</html>