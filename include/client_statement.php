
<div class="card mb-3" >
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
            حساب العملاء </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم الحساب</th>
                    <th>اسم العميل</th>
                    <th>إجمالي الرصيد</th>
                    <th>إجمالي عدد القطع</th>
                    <th>إجمالي المدفوع</th>
                    <th>إجمالي متبقي الفواتير</th>
                    <th>الحالة العامة </th>
                    


                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_clients = $connect -> query("SELECT * FROM client_statement");
                      $id_count = 1; 
                      
                      foreach($select_clients as $clients){ 
                        $total_sum =  $clients['client_total'];
                        $pieces_sum =  $clients['client_pieces'];
                        $paid_sum =  $clients['client_paid'];
                        $residual_sum =  $clients['client_residual'];

                        

                    ?>
                  <tr>
                    <td><?php echo $id_count++?></td>
                    <td><?php echo $clients['name'] ?></td>
                    <td><?php echo $total_sum ." جنية" ?></td>
                    <td><?php echo $pieces_sum ?></td>
                    <td><?php echo $paid_sum." جنية" ?></td>
                    <td><?php echo $residual_sum ." جنية" ?></td>
                    <td><?php if($paid_sum > $total_sum){echo "دائن";}elseif($paid_sum == $total_sum && $residual_sum == 0){echo "-";}else{echo "مدين";}?>
                    </td>
                    
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info"></div>
        </div>
     

        

