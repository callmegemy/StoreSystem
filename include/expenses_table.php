<div class="card mb-3">
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
              المنتجات 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم المنتج</th>
                    <th>اسم المنتج</th>
                    <th>اللون</th>
                    <th>الكمية</th>
                    <th>التاريخ</th>
                    <th>تعديل المنتج</th>
                    <th>حذف المنتج</th>

                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_clause = $connect -> query("SELECT * FROM expenses");
                      $id_counter = 1;
                      foreach($select_clause as $clause){                 
                    ?>
                  <tr>
                    <td><?php echo $id_counter++ ?></td>
                    <td><?php echo $clause['clause_name']?></td>
                    <td><input type="color"  value="<?php echo $clause['color']?>"></td>
                    <td><?php echo $clause['quantity']?></td>
                    <td><?php echo $clause['date']?></td>
                    <td><a href="?page=editproduct&id=<?php echo $clause['id']?> " class="btn btn-info">تعديل</a></td>
                    <td>
                                  <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#secoseco<?php echo $clause['id'] ?>">
 حذف
</button>

<!-- Modal -->
<div class="modal fade" id="secoseco<?php echo $clause['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="text-dark">حذف </span> <span class="text-danger"><?php echo$clause['clause_name'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="text-dark">هل تريد مسح </span>  <span class="text-danger"><?php echo $clause['clause_name'] ?></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <a href="functions/delete_expenses.php?id=<?php echo $clause['id'] ?>" class="btn btn-danger">حذف</a>
    </div>
    </div>
  </div>
</div>
                    </td>
                    
                  </tr>
                  
                 <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer bg-info"></div>
</div>
        <a href="?page=show" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;"> اضافة منتج</a>
    
