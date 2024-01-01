
<div class="card mb-3" >
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
           السدادات</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم الفاتورة</th>
                    <th>اسم التاجر</th>
                    <th> قيمة السداد له</th>
                    <th>تاريخ السداد له</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_pay = $connect -> query("SELECT * FROM trader_total_pay");
                      $id_count = 1;
                      
                      foreach($select_pay as $pay){ 
                        $id_stat = $pay['trader_bill_id'];
                        $value = $pay['pay_value'];
                        $date = $pay['pay_date'];

                        $select_trader_total_bills= $connect -> query("SELECT * FROM trader_invoice WHERE id='$id_stat'");
                        $trader_total_bills = $select_trader_total_bills -> fetch_assoc();
                        $name = $trader_total_bills['trader_name'];                   
                        $id = $trader_total_bills['id'];                   

                    ?>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $value." جنية" ?></td>
                    <td><?php echo $date ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info"></div>
        </div>
     
        <div class="d-flex">
          <a href="trader_invoice.php" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;margin-left:0;">العودة</a>
         </div>
        

