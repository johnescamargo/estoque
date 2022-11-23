<?php
include('../db_connection.php');
include('../session.php');

if (isset($_POST['request'])) {
    $request = $_POST['request'];

    //echo $request;

    // sql to delete a record
    $sql = "DELETE FROM db_user WHERE id='$request'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
