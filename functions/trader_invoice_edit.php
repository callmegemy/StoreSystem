<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "connect.php";

    $id = $_POST['id'];
    $name = $_POST['namee'];
    $total = $_POST['total'];
    $paid = $_POST['traderpaid'];
    $rest = $_POST['traderresidual'];
    $value = $_POST['value'];
    $date = $_POST['date2'];

    if ($rest >= $value) {
        $newPaid = $paid + $value;
        $newResidual = $rest - $value;

        // Update the trader_invoice table
        $update_invoice = $connect->query("UPDATE trader_invoice SET paid_trade='$newPaid', residual_trade='$newResidual' WHERE id='$id'");
    } else {
        header("location: ../trader_invoice.php?page=invoiceedit&id=$id&error=قيمة السداد اكبر من المتبقي");
        exit; // Terminate script to prevent further execution
    }

    // Insert the new payment record
    $insert_ = $connect->query("INSERT INTO trader_total_pay (pay_value, pay_date, trader_bill_id) VALUES ('$value', '$date', '$id')");

    if ($insert_ && $update_invoice) {
        header("location: ../trader_invoice.php");
    }
}
?>
