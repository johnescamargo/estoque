<?php
include('db_connection.php');
if (!isset($_SESSION)) {
   session_start();
}

// foreach ($data as $d) {
//    echo $d;
// }

if (isset($_POST['data'])) {
   // Data from jquery ajax
   $data = json_decode(stripslashes($_POST['data']));

   $id_produto = $data[0];
   $categoria_name = $data[1];
   $entrada = $data[2];
   $venda = $data[3];
   $consumo = $data[4];
   $perda = $data[5];
   $quant =  $entrada + (-1 * abs($venda + $consumo + $perda)); // Comes from tables in products.php
   $date = date("Y-m-d"); // Comes from the local system
   $user = $_SESSION['login_name'];; //comes from session javascript

   if ($entrada === 0 &&  $venda === 0 && $consumo === 0 &&  $perda === 0) {
      echo "Empty fields";
   } else {
      // Select quantity
      $sql_quantity = "SELECT quantity FROM db_product WHERE id = '$id_produto'";
      $result_quantity = mysqli_query($conn, $sql_quantity);
      $row_quantity = mysqli_fetch_assoc($result_quantity);
      $res_quantity = $row_quantity['quantity'];
      $quantidade = $res_quantity + $quant;


      // Select category
      $sql_category = "SELECT id FROM db_category WHERE db_category.name = '$categoria_name';";
      $result_category  = mysqli_query($conn, $sql_category);
      $row  = mysqli_fetch_assoc($result_category);
      $id_category = $row['id'];


      // Insert into db_transactions
      $sql2 = "INSERT INTO mydb.db_transactions
      (entry, sold, consume, loss, quantity, user, date, 
      db_product_id, db_product_db_category_id)
      VALUES ('$entrada', '$venda', '$consumo', '$perda', '$quantidade', '$user', '$date',
      '$id_produto', '$id_category');";

      if ($conn->query($sql2) === TRUE) {
         echo "New record created successfully/n";
      } else {
         echo "Error: " . $sql2 . "<br>" . $conn->error;
      }

      // Update quantity into db_product
      $sql_update = "UPDATE db_product SET quantity='$quantidade' WHERE id='$id_produto'";

      if ($conn->query($sql_update) === TRUE) {
         echo "Record updated successfully";
      } else {
         echo "Error updating record: " . $conn->error;
      }

      $conn->close();
   }
}
