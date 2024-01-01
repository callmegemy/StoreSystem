<div class="container">
    <div class="card card-login ml-auto mr-auto" style=" margin-bottom:2%;">
        <div class="card-header bg-info" style="text-align:center;">
        <b>اضافة فاتورة</b>
        </div>
      <div class="card-body">
            <div class="<?php if(isset($_GET['notfound'])){echo "alert alert-danger";}?>">
                <?php
                    if(isset($_GET['notfound'])){
                        echo $_GET['notfound'];
                    }
                ?>
            </div>
            <form action="functions/trader_invoice_add.php" method="post">
                <div class="form-group">
                    <label for="search"><b>اسم التاجر</b></label>
                    <input type="text" class="form-control" id="trade" name="trader" required >
                    <div id="search-trade"></div>
                </div>
                
                <div class="form-group">
                    <label for="trader-invoice"><b>إجمالي الفواتير</b></label>
                    <input type="number" class="form-control" id="trader-invoice" name="traderinvoice" onkeyup="subtract()" required>
                </div>
 

                <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="trader-paid"><b> إجمالي المدفوع </b></label>
                                <input type="number" class="form-control" id="trader-paid" name="traderpaid" onkeyup="subtract()" required>
                            </div>
                            <div class="col-md-6">
                                <label for="trader-residual"><b>المتبقي</b></label>
                                <input type="text" class="form-control" id="trader-residual" name="traderresidual" readonly required>
                            </div>
                        </div>
                    </div>
                
                
                <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin:0% auto;font-size:20px;" value="اضافة">
               
        </div>
      </div>
    </div>
  </div>


