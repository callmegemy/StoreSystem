<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طباعة</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/rtl.css" rel="stylesheet">
    
    <style>
    body {
        direction: rtl;
        font-size: 16px;
        line-height: 1.5;
    }

    .container {
        max-width: 80%;
        height: 100%;
        padding: 0;
        margin: 0 auto;
        box-sizing: border-box;
        /* display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center; */
    }

    .card-header {
        font-size: 24px;
        text-align: center;
        padding: 10px 0;
    }

    .form-control {
        border: none;
        font-size: 16px;
        padding: 5px;
        width: 100%;
        background: transparent;
    }

    .form-group label {
        font-size: 18px;
        margin-bottom: 5px;
        display: block;
    }

    .button2 {
        background-color: #212529;
        border: 2px solid red;
        border-radius: 8px;
        padding: 10px;
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 25px;
        margin: 20px auto;
        width: 100%;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
    }

    /* Define page size and center content for each paper size */

    /* Legal paper size */
    @page {
        size: Legal;
        margin: 0;
    }

    /* Customize styles for Legal size */
    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* Repeat the same structure for other paper sizes */

    /* Letter paper size */
    @page {
        size: Letter;
        margin: 0;
    }

    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* Tabloid paper size */
    @page {
        size: Tabloid;
        margin: 0;
    }

    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }
    /* A0 paper size */
    @page {
        size: A0;
        margin: 0;
    }

   @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* A1 paper size */
    @page {
        size: A1;
        margin: 0;
    }

    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* A2 paper size */
    @page {
        size: A2;
        margin: 0;
    }

    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* A3 paper size */
    @page {
        size: A3;
        margin: 0;
    }

    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* A4 paper size */
    @page {
        size: A4;
        margin: 0;
    }

   @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }

    /* A5 paper size */
    @page {
        size: A5;
        margin: 0;
    }

    @media print {
        body {
            font-size: 30px;
            direction: rtl;
            margin: 0;
            padding: 0;
            line-height: 3;
        }

        .container {
            max-width: 100%;
            height: auto;
            padding: 0;
            margin: 0;
            page-break-after: auto;
        }

        .card-header {
            font-size: 30px;
            padding: 10px 0;
        }

        .form-control {
            font-size: 30px;
            padding: 5px;
            background: transparent;
        }

        .form-group label {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .button2 {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        #search-results {
            display: none;
        }
    }
</style>


</head>
<body>
    <?php
    date_default_timezone_set('Africa/Cairo');
    $current_time = date('h:i A');

    date_default_timezone_set('Africa/Cairo');
    $current_day = date('l d F Y');

    require "functions/connect.php";
    
    $id_print = $_GET['print'];
    $select_print =  $connect->query("SELECT * FROM invoice WHERE id ='$id_print'");
    $print = $select_print->fetch_assoc();
    ?>
 

    <div class="container">
        <div class="ml-auto mr-auto " style="height:100%;border:none;">
            <div class="card-header bg-primary d-flex justify-content-center align-items-center">
                <img style="width: 42%;height: auto;" src="segad3.svg" alt="">
            </div>


            <div class="card-body">
                <form>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="invoice_no" class="text-left"><b>رقم الفاتورة:</b></label>
                                <span id="invoice_no" class="text-right"><?php echo $id_print;?></span>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="current_time" class="text-left"><b>الوقت الحالي:</b></label>
                                <span id="current_time" class="text-right"><?php echo $current_time;?></span>
                            </div>
                        </div>
                
                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="day" class="text-left"><b>اليوم:</b></label>
                            <span id="day" class="text-right"><?php echo $current_day;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="search" class="text-left"><b>اسم العميل:</b></label>
                            <span id="search" class="text-right"><?php echo $print['client_name']?></span>
                        </div>
                        <div id="search-results"></div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="exampleInputEmail10" class="text-left"><b>التاريخ:</b></label>
                            <span id="exampleInputEmail10" class="text-right"><?php echo $print['date']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="num1" class="text-left"><b>اسماء المنتجات:</b></label>
                            <span id="num1" class="text-right"><?php echo $print['product']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="num1" class="text-left"><b>سعر المنتجات:</b></label>
                            <span id="num1" class="text-right"><?php echo $print['price']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="num2" class="text-left"><b>عدد القطع:</b></label>
                            <span id="num2" class="text-right"><?php echo $print['pieces']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result" class="text-left"><b>الإجمالي:</b></label>
                            <span id="result" class="text-right"><?php echo $print['total']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="num3" class="text-left"><b>المدفوع:</b></label>
                            <span id="num3" class="text-right"><?php echo $print['paid']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result2" class="text-left"><b>المتبقي:</b></label>
                            <span id="result2" class="text-right"><?php echo $print['residual']?></span>
                        </div>
                    </div>
                    <input type="button" onclick="window.print()" class="button2 btn btn-danger" value="طباعة">
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for printing -->
    <script>
        function printPage() {
            window.print();
        }
    </script>

</body>
</html>
