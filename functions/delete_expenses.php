<?php

require "connect.php";

$id = $_GET['id'];

$delete_user1 = $connect -> query("DELETE FROM expenses WHERE id = '$id'");

if($delete_user1){
  header("location:../expenses.php");
}
?>