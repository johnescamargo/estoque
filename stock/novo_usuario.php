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
        <li><a href="novo_produto.php">Produto</a></li>
        <li><a href="nova_categoria.php">Categoria</a></li>
        <li><a class="active" href="novo_usuario.php">Usuário</a></li>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <div class="form-save">
    <form method="POST">
      <div class="container">
        <label for="name"><b>Usuário</b></label>
        <input type="text" placeholder="Nome" id="name" name="name" required />
        <label for="password"><b>Senha</b></label>
        <input type="password" placeholder="Senha" id="password" name="password" required />
        <button type="submit">Salvar</button>
      </div>
    </form>
  </div>
  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql3 = "INSERT INTO mydb.db_user (name, password) VALUES('$name', '$password');";

    if ($conn->query($sql3) === TRUE) {
      echo "New record created successfully";
      header("Location: novo_usuario.php");
    } else {
      echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
  }
  ?>




  <div class="content">
    <table class="table" id='customers'>
      <?php
      $sql = "SELECT * FROM db_user;";
      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
      ?>
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th></th>
            </tr>

          </thead>
          <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <td id="id-<?php echo $row["id"] ?>"><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td>
                  <button class="button-update" id='update-<?php echo $row["id"] ?>'>Update</button>
                  <button class="button-del" id='<?php echo $row["id"] ?>'>Deletar</button>
                </td>
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

  <div class="test"></div>

  <script src="scriptStock.js"></script>
  <script src="script_user.js"></script>
</body>

</html>