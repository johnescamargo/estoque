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
        <li><a href="novo_produto.php">Novo Produto</a></li>
        <li><a class="active" href="nova_categoria.php">Nova Categoria</a></li>
        <li><a href="novo_usuario.php">Novo Usuário</a></li>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <form method="POST">
    <div class="container">
      <label for="name"><b>Nome da categoria</b></label>
      <input type="text" placeholder="Nome da categoria" id="name" name="name" required />
      <button type="submit">Salvar</button>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      echo $name;

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO mydb.db_category
              (name)
              VALUES ('$name');";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: nova_categoria.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
    ?>
  </form>


  <div class="content">
    <table class="table" id='customers'>
      <?php
      $sql = "SELECT * FROM db_category;";
      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
      ?>
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome da categoria</th>
            </tr>

          </thead>
          <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
              </tr>
        <?php
            }
          } else {
            echo "0 Result";
          }
        }
        ?>
          </tbody>
    </table>
  </div>

  <script src="scriptStock.js">

  </script>
</body>

</html>