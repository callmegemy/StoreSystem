<?php
    $id = $_GET['id'];
    $select_total_bills = $connect -> query("SELECT * FROM trader_invoice WHERE id = '$id'");
    $bill_id = $select_total_bills -> fetch_assoc();
?>
<div class="container">
<div class="card card-login mx-auto mt-5"style=" margin-bottom:2%;">
        <div class="card-header bg-info" style="text-align:center;">
            <b>سداد فاتورة رقم <?php echo $bill_id['id']?></b>
        </div>
        <div class="card-body">
        <div class="<?php if(isset($_GET['error'])){echo "alert alert-danger";}?>">
                <?php
                    if(isset($_GET['error'])){
                        echo $_GET['error'];
                    }
                ?>
            </div>
            <form action="functions/trader_invoice_edit.php" method="post">
                    <input type="text" class="form-control" id="id" name="id" required  value="<?php echo $bill_id['id']?>" hidden>
                <div class="form-group">
                    <label for="namee"><b>اسم العميل</b></label>
                    <input type="text" class="form-control" id="namee" name="namee" required  value="<?php echo $bill_id['trader_name']?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="pay3"><b>إجمالي الفواتير</b></label>
                    <input type="number" class="form-control" id="pay3" name="total" readonly  value="<?php echo $bill_id['total_trade']?>" >
                </div>
               
                <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="trader-paid"><b> إجمالي المدفوع </b></label>
                                <input type="number" class="form-control" id="trader-paid" name="traderpaid" onkeyup="subtract()" required value="<?php echo $bill_id['paid_trade'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="trader-residual"><b>المتبقي</b></label>
                                <input type="text" class="form-control" id="trader-residual" name="traderresidual" readonly required value="<?php echo $bill_id['residual_trade'] ?>">
                            </div>
                        </div>
                    </div>
                

                <div class="form-group">
                    <label for="pay1"><b>قيمة السداد</b></label>
                    <input type="number" class="form-control" id="pay1" name="value" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail10"><b>تاريخ السداد</b></label>
                    <input type="date" class="form-control" id="exampleInputEmail10" name="date2" required >
                </div>                
                    <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin:0% auto;font-size:20px;" value="سداد">       
            </form>
        </div>
      </div>
    </div>
  </div>


  
