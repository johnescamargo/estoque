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

  <div id="navbar">
    <a href="produtos.php">Produtos</a>
    <a href="novo_produto.php">Novo Produto</a>
    <a href="nova_categoria.php">Nova Categoria</a>
    <a class="active" href="novo_usuario.php">Novo Usuário</a>
    <a href="../logout.php">Sair</a>
  </div>

  <form method="POST">
    <div class="container">
      <label for="name"><b>Usuário</b></label>
      <input type="text" placeholder="Enter Username" id="name" name="name" required />

      <label for="password"><b>Senha</b></label>
      <input type="password" placeholder="Enter Password" id="password" name="password" required />

      <button type="submit">Entrar</button>
    </div>
  </form>


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