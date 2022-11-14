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

  <div class="form-save">
    <form method="POST">
      <div class="container">
        <label for="name"><b>Nome do Produto</b></label>
        <div>

          <?php

          $sql = "SELECT * FROM db_category;";

          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
              echo "<select name='category_product'>" .
                "<option value='' disabled='' selected=''>Selecione</option>";
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
              }
              echo "</select>";
            } else {
              echo "0 Result";
            }
          }
          ?>

          <input type="text" placeholder="Nome do Produto" id="name" name="name" />
          <button onclick="showNotification" type="submit">Salvar</button>
        </div>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST['name'];
          $id = $_POST['category_product'];
          echo "<div>ID: " . $id . ", name: " . $name . "</div>";


          if ($id == "") {
            echo "
            <div style='background-color: rgba(134, 36, 36, 0.527);' class='notification-container' id='notification-container'>
            <p>Insira o nome do produto! 1</p>
            </div>";
            sleep(3);
          }


          // if ($name == "") {
          //   echo "
          //   <div style='background-color: rgba(134, 36, 36, 0.527);' class='notification-container' id='notification-container'>
          //   <p>Insira o nome do produto! 2</p>
          //   </div>";
          // }

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "INSERT INTO mydb.db_product
              (name, quantity, db_category_id)
              VALUES ('$name', 0, '$id')";

          if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";

            echo "
                  <!-- Notification -->
                  <div class='notification-container' id='notification-container'>
                  <p>Nova produto criado!</p>
                  </div>
                 ";
            sleep(3);
          } else {
            echo "
                 <div style='background-color: rgba(134, 36, 36, 0.527);' class='notification-container' id='notification-container'>
                 <p>Insira o nome do produto!</p>
                 </div>";

            // "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();
        }
        ?>
    </form>
  </div>

  <script src="scriptStock.js"></script>
</body>

</html>