<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $name = $_POST['trade_name'];
        $phone = $_POST['prefix'] . $_POST['phone'];
        
        $client_add = $connect -> query("SELECT * FROM trader WHERE trader_name ='$name'");
        $add_client = $client_add -> fetch_assoc();
        $addclient = $add_client['trader_name'];

        if($name === $addclient){
            header("location:../trade.php?page=trader&clientuse=اسم التاجر موجود");
        }else{
            $insert_client = $connect -> query("INSERT INTO trader (trader_name,trader_phone) VALUES ('$name','$phone ')");

            if($insert_client){
                header("location:../trade.php");
            }
        }
    }
?>