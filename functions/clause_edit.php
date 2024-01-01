<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $id = $_POST['id'];
        $clause = $_POST['clause'];
        $color = $_POST['color'];
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];

        $update_clause = $connect -> query("UPDATE expenses SET clause_name='$clause',color='$color',quantity='$quantity',date='$date' WHERE id='$id'");

        if($update_clause){
            header("location:../expenses.php");
        }
    }
        

       
?>