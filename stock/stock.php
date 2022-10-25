<?php
include('session.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Estoque</title>
</head>

<body>
  <div id="navbar">
    <a class="active" href="stock.php">Home</a>
    <a href="javascript:void(0)">News</a>
    <a href="javascript:void(0)">Contact</a>
    <a href="../logout.php">Sair</a>

  </div>

  <div class="content">

    <table id="customers">
      <tr>
        <th>Id</th>
        <th>Produto</th>
        <th>Entrada</th>
        <th>Venda</th>
        <th>Consumo</th>
        <th>Perda</th>
        <th>Quant. em estoque</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Cerveja</td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td>20 <button type="submit">Salvar</button></td>

      </tr>
      <tr>
        <td>1</td>
        <td>Refrigerante</td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td>20 <button type="submit">Salvar</button></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Cerveja</td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td><input type="text" placeholder="0"></td>
        <td>20 <button type="submit">Salvar</button></td>

      </tr>

    </table>

  </div>

  <script src="script.js"></script>
</body>

</html>