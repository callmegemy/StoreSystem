<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    require "connect.php";

    $name_trader = $_POST['trader'];
    $result = $_POST['traderinvoice'];
    $paid = $_POST['traderpaid'];
    $residual = $_POST['traderresidual'];

    $select_trader = $connect -> query("SELECT * FROM trader WHERE trader_name ='$name_trader'");
    $trader = $select_trader -> fetch_assoc();
    $name = $trader['trader_name'];
  

    if($name_trader === $name && $result >= $paid){
        $insert_trader_invoice = $connect -> query("INSERT INTO trader_invoice 
        (trader_name,total_trade,paid_trade,residual_trade)
        VALUES
        ('$name_trader','$result','$paid','$residual')");
        
        $select_total = $connect -> query("SELECT SUM(total_trade) AS total_sum FROM trader_invoice WHERE trader_name ='$name_trader'");
        $total_row = $select_total -> fetch_assoc();
        $total_sum = $total_row['total_sum'];

        $select_residual = $connect -> query("SELECT SUM(residual_trade) AS residual_sum FROM trader_invoice WHERE trader_name ='$name_trader'");
        $residual_row = $select_residual -> fetch_assoc();
        $residual_sum = $residual_row['residual_sum'];

        $select_paid = $connect -> query("SELECT SUM(paid_trade) AS paid_sum FROM trader_invoice WHERE trader_name ='$name_trader'");
        $paid_row = $select_paid -> fetch_assoc();
        $paid_sum = $paid_row['paid_sum'];


        $select_bills = $connect -> query("SELECT * FROM trader_total_bills WHERE trader_name ='$name_trader'");
        $bills = $select_bills -> num_rows;

        if($bills == 0){
            $insert_trader = $connect -> query("INSERT INTO trader_total_bills 
            (trader_name,total,paid,residual)
            VALUES
            ('$name_trader','$total_sum','$paid_sum ','$residual_sum')");
        }else{
            $update_trader = $connect -> query("UPDATE trader_total_bills 
            SET total = '$total_sum', paid='$paid_sum', residual='$residual_sum' WHERE trader_name = '$name_trader'");
        }

        if($insert_trader_invoice){
            header("location:../trader_invoice.php");
        }
    } else {
        // تحقق إذا كان هناك خطأ مع اسم العميل أو الكمية
        if($name_trader !== $name) {
            $error_message = "يرجى التأكد من وجود اسم التاجر في جدول التجار.";
        }
    
        // إذا كان هناك خطأ، قم بإرسال رسالة الخطأ مع إعادة توجيه المستخدم إلى الصفحة السابقة
        if(isset($error_message)) {
            header("location:../trader_invoice.php?page=invoicetrade&notfound=$error_message");
        }
    }
}
