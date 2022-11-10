<?php
//include('session.php');
include('fetch.php');
include('save_product.php');

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
        <li><a class="active" href="produtos.php">Produtos</a> </li>
        <li><a href="novo_produto.php">Novo Produto</a></li>
        <li><a href="nova_categoria.php">Nova Categoria</a></li>
        <li><a href="novo_usuario.php">Novo Usuário</a></li>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">

    <?php

    $sql = "SELECT * FROM db_category;";

    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {
        echo "<select name='fetchval' id='fetchval' class='fetchval'>" .
          "<option value='' disabled='' selected=''>Selecione</option>";
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
        }
        echo "</select>";
      } else {
        echo "0 Result";
      }
    }
    ?>

    <br><br>

    <div class="container">

    </div>

    <div class="test">

    </div>

    <script src="scriptStock.js"> </script>
</body>

</html>