<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="styleStock.css" />
  <title>Novo Produto</title>
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
        <li><a class="active" href="novo_produto.php">Produto</a></li>
        <li><a href="nova_categoria.php">Categoria</a></li>
        <li><a href="novo_usuario.php">Usuário</a></li>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <div>
    <form class="form-save" method="POST">
      <div class="container">
        <label for="name"><b>Categoria</b></label>
        <div>

          <?php

          $sql = "SELECT * FROM db_category;";

          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
              echo "<select name='category_product'>" .
                "<option value=' ' disabled='' selected=''>Selecione</option>";
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
              }
              echo "</select>";
            } else {
              echo "0 Result";
            }
          }
          ?>
          </br></br>
          <label for="name"><b>Nome do Produto</b></label>
          <input type="text" placeholder="Nome do Produto" id="name" name="name" required />
          <button onclick="showNotification" type="submit">Salvar</button>
        </div>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST['name'];
          $id = "empty";

          //Checking if category is selected
          if (isset($_POST['category_product'])) {
            $id = $_POST['category_product'];
          }


          if ($id != "empty") {

            $sql = "INSERT INTO mydb.db_product
                   (name, quantity, db_category_id)
                 VALUES ('$name', 0, '$id')";
            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
          } else {
            echo "Error: Escolha uma categoria";
          }
        }
        ?>
    </form>
  </div>

  <div class="content">
    <div class="container" style="max-width: 50%;">
      <div class="text-center mt-5 mb-4">
        <label for="name"><b>Procurar Produtos</b></label>
      </div>
      <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Digite ... ">
    </div>
  </div>

  <div class="content">
    <div id="search-result"></div>
  </div>

  <script src="scriptStock.js"></script>
  <script src="./produto/script_live_search.js"></script>
</body>

</html>