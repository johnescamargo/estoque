<?php
session_start();
include('db_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Login</title>
</head>

<body>
  <form method="POST">
    <div class="container">
      <label for="name"><b>Usuário</b></label>
      <input type="text" placeholder="Enter Username" id="name" name="name" required />

      <label for="password"><b>Senha</b></label>
      <input type="password" placeholder="Enter Password" id="password" name="password" required />

      <button type="submit">Entrar</button>
    </div>
  </form>

  <script src="script.js"></script>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM db_user WHERE name='$name' && password='$password'";
  $sqlName = "SELECT name FROM db_user WHERE name='$name' && password='$password'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);

  // If result matched $name and $password, table row must be 1 row
  if ($count == 1) {
    $_SESSION['login_name'] = $row['name'];
    header('Location: success.html');
    header('Location: stock/produtos.php');
  } else {
    echo '<div>Nome ou senha invalida!</div>';
  }
}
?>