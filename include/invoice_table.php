<div class="card mb-3">
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
              فواتير العملاء 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم الفاتورة</th>
                    <th>اسم العميل</th>
                    <th>التاريخ</th>
                    <th>اسماء المنتجات</th>
                    <th>سعر المنتجات</th>
                    <th id="pieces-header">عدد القطع</th>
                    <th id="total-header">الإجمالي</th>
                    <th>خصم</th>
                    <th>المدفوع</th>
                    <th>المتبقي</th>
                    <th>الحالة</th>
                    <th>سداد</th>
                    <th>طباعة</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_bill = $connect -> query("SELECT * FROM invoice");
                      $id_ = 1;
                      foreach($select_bill as $bill){                 
                    ?>
                  <tr>
                    <td><?php echo $bill['id']?></td>
                    <td><?php echo $bill['client_name']?></td>
                    <td><?php echo $bill['date']?></td>
                    <td><?php echo $bill['product']?></td>
                    <td><?php echo $bill['price']." جنية"?></td>
                    <td class="pieces"id="total-1"><?php echo $bill['pieces']?></td>
                    <td class="total" id="total-1"><?php echo $bill['total']." جنية" ?></td>
                    <td><?php echo $bill['cost']." جنية"?></td>
                    <td><?php echo $bill['paid']." جنية"?></td>
                    <td><?php echo $bill['residual']." جنية"?></td>
                    <td><?php if($bill['residual'] < 0){echo "دائن";}elseif($bill['residual'] > 0){echo "مدين";}else{echo "-";}?></td>
                    <td>
                    <a <?php if($bill['residual'] == 0){echo "hidden";}?> href="?page=invoice_edit&id=<?php echo $bill['id'];?>" class=" btn btn-success" style="color:white;text-decoration:none;">سداد </a>
                    </td>
                    <td><a href="print.php?print=<?php echo $bill['id']?>" class=" btn btn-danger" style="color:white;text-decoration:none;">طباعة</a>
                    </td>                    
                  </tr>
                 <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info"><div id="resultt"></div><div id="resultt2"></div></div>
</div>
        <a href="?page=invoice" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;">اضافة فاتورة</a>