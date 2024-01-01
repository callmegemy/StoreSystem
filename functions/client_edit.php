<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $id = $_POST['id'];
        $name = $_POST['namee'];
        $total = $_POST['total'];
        $pieces = $_POST['pieces'];
        $paid = $_POST['paid'];
        $rest = $_POST['rest'];
        $value = $_POST['value'];
        $date = $_POST['date'];


        $sum = $paid + $value;
        if($value > $rest){
            $subtract = ($value - $rest);
        }elseif($value < $rest){
            $subtract = ($rest - $value);
        }elseif($value === $rest){
            $subtract = 0;
        }


        $insert_ = $connect -> query("INSERT INTO pay 
        (pay_value,pay_date,client_statid)
        VALUES
        ('$value','$date','$id')");

        $update_ = $connect -> query("UPDATE client_statement SET name='$name',client_total='$total',client_pieces='$pieces',client_paid='$sum',client_residual='$subtract' WHERE id='$id'");


        if($insert_ && $update_){
            header("location:../pay.php");
        }

        
    }
?>