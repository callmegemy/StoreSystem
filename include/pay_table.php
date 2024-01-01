
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
                    <th>اسم العميل</th>
                    <th> قيمة السداد </th>
                    <th> تاريخ السداد </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_pay = $connect -> query("SELECT * FROM pay");
                      $id_count = 1;
                      
                      foreach($select_pay as $pay){ 
                        $id_stat = $pay['client_statid'];
                        $value = $pay['pay_value'];
                        $date = $pay['pay_date'];

                        $select_clients = $connect -> query("SELECT * FROM invoice WHERE id='$id_stat'");
                        $clients = $select_clients -> fetch_assoc();
                        $name = $clients['client_name'];                   
                        $id_invoice = $clients['id'];                   

                    ?>
                  <tr>
                    <td><?php echo $id_invoice ?></td>
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
     

        

