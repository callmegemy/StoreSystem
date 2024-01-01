<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $trader_id = $_POST['trader_id'];
        $trade_name = $_POST['trade_name'];
        $phone = $_POST['phone'];
       


        $update_trader = $connect -> query("UPDATE trader SET trader_name='$trade_name',trader_phone='$phone' WHERE id='$trader_id'");


        if($update_trader){
            header("location:../trade.php");
        }

        
    }
?>