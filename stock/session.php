<?php
include('/xampp/htdocs/estoque/db_connection.php');
session_start();

$user_check = $_SESSION['login_name'];

$ses_sql = mysqli_query($conn, "select name from db_user where name = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['name'];

if (!isset($_SESSION['login_name'])) {
   header("Location:../index.php");
   die();
}

?>