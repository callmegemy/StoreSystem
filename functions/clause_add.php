<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $clause = $_POST['clause'];
        $color = $_POST['color'];
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];

        $select_clause = $connect -> query("SELECT * FROM expenses WHERE clause_name='$clause'");
        $add_clause = $select_clause -> fetch_assoc();
        $addclause = $add_clause['clause_name'];

        if($clause === $addclause){
            header("location:../expenses.php?page=show&clauseuse=اسم المنتج موجود");
        }else{
            $insert_clause = $connect -> query("INSERT INTO expenses (clause_name,color,quantity,date) VALUES ('$clause','$color','$quantity','$date')");

            if($insert_clause){
                header("location:../expenses.php");
            }
        }
        
    }
       
?>