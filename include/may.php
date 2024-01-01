<div class="card mb-3">
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
                      مايو          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم الفاتورة</th>
                    <th>اسم العميل</th>
                    <th>التاريخ</th>
                    <th>عدد القطع</th>
                    <th>المدفوع</th>
                    <th>الإجمالي</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_bill = $connect -> query("SELECT * FROM invoice WHERE MONTH(date) = 5");
                      $id_ = 1;
                      $total_paid = 0;
                      foreach ($select_bill as $bill) {
                        $total_paid += $bill['paid'];
                    ?>
                  <tr>
                    <td><?php echo $id_++?></td>
                    <td><?php echo $bill['client_name']?></td>
                    <td><?php echo $bill['date']?></td>
                    <td><?php echo $bill['pieces']?></td>
                    <td><?php echo $bill['paid']." جنية"?></td>
                    <td><?php echo $bill['total']." جنية"?></td>
                  </tr>
                 <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info">
            <div>
              <?php echo "  إجمالي المدفوع: " . $total_paid. " جنية "?>
            </div>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header bg-success" style="text-align:center;">
            <i class="fas fa-table"></i>
              المنتجات 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم المنتج</th>
                    <th>اسم المنتج</th>
                    <th>اللون</th>
                    <th>الكمية</th>
                    <th>التاريخ</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_clause = $connect -> query("SELECT * FROM expenses WHERE MONTH(date) = 5");
                      $id_counter = 1;
                      $total_ = 0;
                        foreach ($select_clause as $clause) {
                    ?>
                  <tr>
                    <td><?php echo $id_counter++ ?></td>
                    <td><?php echo $clause['clause_name']?></td>
                    <td><input type="color"  value="<?php echo $clause['color']?>"></td>
                    <td><?php echo $clause['quantity']?></td>
                    <td><?php echo $clause['date']?></td>
                    
                  </tr>
                 <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-success">
         
          </div>
</div>
        
    
