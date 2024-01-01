<?php

require "connect.php";

$id = $_GET['id'];

$delete_trade = $connect -> query("DELETE FROM trader WHERE id = '$id'");

if($delete_trade){
  header("location:../trade.php");
}
?>