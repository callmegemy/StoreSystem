<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        

        $update_client = $connect -> query("UPDATE clients SET name='$name',phone='$phone' WHERE id='$id'");

        if($update_client){
            header("location:../customer.php");
        }
    }
    
?>