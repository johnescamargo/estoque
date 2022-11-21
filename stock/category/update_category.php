<?php
include('../session.php');
include('../db_connection.php');

if (isset($_POST['data'])) {
  // Data from jquery ajax
  echo "TEST";
  $data = json_decode(stripslashes($_POST['data']));

  $name = $data[0];
  $id = $data[1];

  $sql = "UPDATE db_category SET name='$name' WHERE id='$id';";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}
