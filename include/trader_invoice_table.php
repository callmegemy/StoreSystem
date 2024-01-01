<div class="card mb-3">
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
              إجمالي فواتير التجار 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم التاجر</th>
                    <th>اسم التاجر</th>
                    <th>رقم الهاتف</th>
                    <th>إجمالي الفواتير</th>
                    <th>إجمالي المدفوع</th>
                    <th>إجمالي المتبقي</th>

                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_trade = $connect -> query("SELECT * FROM trader_total_bills");
                      $id_counter = 1;
                      foreach($select_trade as $trade){
                      $id_bill = $trade['id'];  
                      $names = $trade['trader_name'];
                      $paid = $trade['paid'];

                      $select_trader = $connect -> query ("SELECT * FROM trader WHERE trader_name='$names'");
                      $trader = $select_trader -> fetch_assoc();

                      $select_total = $connect -> query("SELECT SUM(total_trade) AS total_sum FROM trader_invoice WHERE trader_name ='$names'");
                      $total_row = $select_total -> fetch_assoc();
                      $total_sum = $total_row['total_sum'];             
                                            
                      $select_paid = $connect -> query("SELECT SUM(paid_trade) AS paid_sum FROM trader_invoice WHERE trader_name ='$names'");
                      $paid_row = $select_paid -> fetch_assoc();
                      $paid_sum = $paid_row['paid_sum'];

                      $select_residual = $connect -> query("SELECT SUM(residual_trade) AS residual_sum FROM trader_invoice WHERE trader_name ='$names'");
                      $residual_row = $select_residual -> fetch_assoc();
                      $residual_sum = $residual_row['residual_sum'];
                    ?>
                  <tr>
                    <td><?php echo $id_counter++ ?></td>
                    <td><?php echo $trade['trader_name']?></td>
                    <td><?php echo "0".$trader['trader_phone'] ?></td>
                    <td><?php echo $total_sum. " جنية"?></td>
                    <td><?php echo $paid_sum. " جنية"?></td>
                    <td><?php if($residual_sum == 0 && $total_sum == $paid_sum){echo "-";}else{echo $residual_sum. " جنية";}?></td>
                  
                    
                  </tr>
                  
                 <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info"></div>
</div>
<div class="d-flex">
  
  <a href="?page=invoicedetails" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;margin-right:0;"> تفاصيل فواتير التجار</a>
  <a href="?page=invoicepay" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;margin-left:0;"> سدادات فواتير التجار</a>
</div>