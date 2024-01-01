<?php

$id = $_GET['id'];
$select_invoice = $connect -> query("SELECT * FROM invoice WHERE id ='$id'");
$edit_invoice = $select_invoice -> fetch_assoc();


?>

<div class="container">
    <div class="card card-login ml-auto mr-auto" style=" margin-bottom:2%;">
        <div class="card-header bg-info" style="text-align:center;">
        <b> سداد فاتورة رقم <?php echo $edit_invoice['id']?></b>
        </div>
      <div class="card-body">
            <form action="functions/invoice_edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $edit_invoice['id']?>">
                <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="search"><b>اسم العميل</b></label>
                                <input type="text" class="form-control" id="search" name="search" readonly  value="<?php echo $edit_invoice['client_name']?>">
                                <div id="search-results"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail10"><b>التاريخ</b></label>
                                <input type="date" class="form-control" id="exampleInputEmail10" name="date" readonly required value="<?php echo $edit_invoice['date']?>">
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="product"><b>اسماء المنتجات</b></label>
                    <input type="text" class="form-control" id="product" name="product" readonly required value="<?php echo $edit_invoice['product']?>">
                    <div id="search-result"></div>
                </div>
                <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="num1"><b>سعر المنتجات</b></label>
                                <input type="number" class="form-control"  id="num1" name="price" readonly onkeyup="multiply()" required value="<?php echo $edit_invoice['price']?>">
                            </div>
                            <div class="col-md-6">
                                <label for="num2"><b>عدد القطع</b></label>
                                <input type="number" class="form-control"  id="num2" name="pieces" readonly onkeyup="multiply()" required value="<?php echo $edit_invoice['pieces']?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="result"><b>الإجمالي</b></label>
                                <input type="text" class="form-control" id="result" name="result" readonly  onkeyup="subtract()" required value="<?php echo $edit_invoice['total']?>">
                            </div>
                            <div class="col-md-6">
                                <label for="cost"><b>خصم </b></label>
                                <input type="number" class="form-control" id="cost" name="cost" readonly onkeyup="sum()" required value="<?php echo $edit_invoice['cost']?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="num3"><b>المدفوع</b></label>
                                <input type="number" class="form-control" readonly id="num3" name="paid" onkeyup="subtract()" required  value="<?php echo $edit_invoice['paid']?>">
                            </div>
                            <div class="col-md-6">
                                <label for="result2"><b>المتبقي</b></label>
                                <input type="text" class="form-control" id="result2" name="residual" readonly  required value="<?php echo $edit_invoice['residual']?>">
                            </div>
                        </div>
                    </div>


                <div class="form-group">
                    <label for="pay1"><b>قيمة السداد</b></label>
                    <input type="number" class="form-control" id="pay1" name="value" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail10"><b>تاريخ السداد</b></label>
                    <input type="date" class="form-control" id="exampleInputEmail10" name="date" required >
                </div> 
                        <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin:0% auto;font-size:20px;" value="سداد">
               
        </div>
      </div>
    </div>
  </div>





