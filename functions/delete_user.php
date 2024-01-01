<?php

require "connect.php";

$id = $_GET['id'];

$delete_user2 = $connect -> query("DELETE FROM clients WHERE id = '$id'");

if($delete_user2){
  header("location:../customer.php");
}
?>