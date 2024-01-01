<div class="card mb-3">
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
            تفاصيل فواتير التجار  
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم الفاتورة</th>
                    <th>اسم التاجر</th>
                    <th>رقم الهاتف</th>
                    <th>إجمالي</th>
                    <th>المدفوع</th>
                    <th>المتبقي</th>
                    <th>سداد</th>
                    <th>طباعة</th>

                  </tr>
                </thead>
                <tbody>
                <?php
                      $select_trade = $connect -> query("SELECT * FROM trader_invoice");
                      $id_counter = 1;
                      foreach($select_trade as $trade){   
                      $names = $trade['trader_name'];
                      $select_trader = $connect -> query ("SELECT * FROM trader WHERE trader_name='$names'");
                      $trader = $select_trader -> fetch_assoc();
                    ?>
                  <tr>
                    <td><?php echo $trade['id'] ?></td>
                    <td><?php echo $trade['trader_name']?></td>
                    <td><?php echo "0".$trader['trader_phone'] ?></td>
                    <td><?php echo $trade['total_trade']. " جنية"?></td>
                    <td><?php echo $trade['paid_trade']. " جنية"?></td>
                    <td><?php if($trade['residual_trade'] == 0 && $trade['total_trade'] == $trade['paid_trade']){echo "-";}else{echo $trade['residual_trade']. " جنية";}?></td>
                    <td>
                      <a <?php if($trade['residual_trade'] == 0){echo "hidden";}?> href="?page=invoiceedit&id=<?php echo $trade['id'];?>" class=" btn btn-success" style="color:white;text-decoration:none;">سداد </a>
                      </td>
                    <td>
                      <a href="print2.php?print=<?php echo $trade['id']?>" class=" btn btn-danger" style="color:white;text-decoration:none;">طباعة</a>
                      </td>
                    </tr>
                  
                 <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info"></div>
</div>
<div class="d-flex">
    <a href="?page=invoicetrade" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;margin-right:0;"> اضافة فاتورة</a>
    <a href="trader_invoice.php" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;margin-left:0;">  العودة</a>
</div>