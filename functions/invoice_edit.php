<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

        require "connect.php";

        $id = $_POST['id'];
        $name_ = $_POST['search'];
        $date = $_POST['date'];
        $product = $_POST['product'];
        $price = $_POST['price'];
        $pieces = $_POST['pieces'];
        $result = $_POST['result'];
        $cost = $_POST['cost'];
        $paid = $_POST['paid'];
        $residual = $_POST['residual'];
        $debt = $_POST['debt'];
        $value = $_POST['value'];
        $date2 = $_POST['date2'];

          // Calculate new paid and residual values
            $newPaid = $paid + $value;
            $newResidual = $residual - $value;
            if ($newPaid == $result && $newResidual == 0) {
                $debt = "-";
            }
    

            $update_invoice = $connect -> query("UPDATE invoice SET client_name = '$name_', date = '$date',product='$product',price = '$price',pieces='$pieces',total='$result',cost='$cost',paid = '$newPaid', residual= '$newResidual',debt='$debt' WHERE id = '$id'");

    
            // Insert the new payment record
            $insert_ = $connect->query("INSERT INTO pay (pay_value, pay_date, client_statid) VALUES ('$value', '$date', '$id')");

                // Calculate and update various totals
                $select_total = $connect->query("SELECT SUM(total) AS total_sum FROM invoice WHERE client_name = '$name_'");
                $total_row = $select_total->fetch_assoc();
                $total_sum = $total_row['total_sum'];

                $select_pieces = $connect->query("SELECT SUM(pieces) AS pieces_sum FROM invoice WHERE client_name = '$name_'");
                $pieces_row = $select_pieces->fetch_assoc();
                $pieces_sum = $pieces_row['pieces_sum'];

                $select_residual = $connect->query("SELECT SUM(residual) AS residual_sum FROM invoice WHERE client_name = '$name_'");
                $residual_row = $select_residual->fetch_assoc();
                $residual_sum = $residual_row['residual_sum'];

                $select_paid = $connect->query("SELECT SUM(paid) AS paid_sum FROM invoice WHERE client_name = '$name_'");
                $paid_row = $select_paid->fetch_assoc();
                $paid_sum = $paid_row['paid_sum'];

                $select_cost = $connect->query("SELECT SUM(cost) AS cost_sum FROM invoice WHERE client_name = '$name_'");
                $cost_row = $select_cost->fetch_assoc();
                $cost_sum = $cost_row['cost_sum'];

                // Check if client statement exists
                $select_client_statement = $connect->query("SELECT * FROM client_statement WHERE name = '$name_'");
                $client_statement_rows = $select_client_statement->num_rows;

                if ($client_statement_rows > 0) {
                    // Update existing client statement
                    $update_client_statement = $connect->query("UPDATE client_statement 
                        SET client_total = '$total_sum', client_pieces = '$pieces_sum', client_paid = '$paid_sum', client_residual = '$residual_sum'  
                        WHERE name = '$name_'");
                }
    
    if($update_invoice && $insert_){
       header("location:../bill.php");
    }
    }