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
    <a class="active" href="produtos.php">Produtos</a>
    <a href="novo_produto.php">Novo Produto</a>
    <a href="nova_categoria.php">Nova Categoria</a>
    <a href="../logout.php">Sair</a>
  </div>

  <div class="content">

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

  </div>

  <script src="scriptStock.js">

  </script>
</body>

</html>