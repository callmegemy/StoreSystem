<?php

require "connect.php";

$id = $_GET['id'];

$delete_trade = $connect -> query("DELETE FROM trader_invoice WHERE id = '$id'");

if($delete_trade){
  header("location:../trader_invoice.php");
}
?>