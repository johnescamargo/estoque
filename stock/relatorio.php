<?php
include('session.php');
include('db_connection.php')
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

  <nav class="navbar">
    <div class="brand-title">Bar do Bola</div>
    <a href="#" class="toggle-button">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </a>
    <div class="navbar-links">
      <ul>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="novo_produto.php">Produto</a></li>
        <li><a href="nova_categoria.php">Categoria</a></li>
        <li><a href="novo_usuario.php">Usuário</a></li>
        <li><a class="active" href="relatorio.php">Relatório</a></li>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>


  <div class="form-save">
    <form method="POST">
      <div class="container">
        <label for="calender"><b>Calendário</b></label>
        <input type="date" id="date" name="date" required />
        <button type="submit">Selecione</button>
      </div>
    </form>
  </div>

  <script src="scriptStock.js"> </script>
</body>

</html>