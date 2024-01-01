<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $name = $_POST['name'];
        $phone = $_POST['prefix'] . $_POST['phone'];
        
        $client_add = $connect -> query("SELECT * FROM clients WHERE name ='$name'");
        $add_client = $client_add -> fetch_assoc();
        $addclient = $add_client['name'];

        if($name === $addclient){
            header("location:../customer.php?page=add&clientuse=اسم العميل مستخدم");
        }else{
            $insert_client = $connect -> query("INSERT INTO clients (name,phone) VALUES ('$name','$phone ')");

            if($insert_client){
                header("location:../customer.php");
            }
        }
    }
?>