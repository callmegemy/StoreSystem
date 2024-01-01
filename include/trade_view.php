<div class="card mb-3">
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
              التجار 
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم التاجر</th>
                    <th>اسم التاجر</th>
                    <th>رقم الهاتف</th>
                    <th>تعديل التاجر</th>
                    <th>حذف التاجر</th>

                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_trade = $connect -> query("SELECT * FROM trader");
                      $id_counter = 1;
                      foreach($select_trade as $trade){                 
                    ?>
                  <tr>
                    <td><?php echo $id_counter++ ?></td>
                    <td><?php echo $trade['trader_name']?></td>
                    <td><?php echo "0".$trade['trader_phone']?></td>
                    <td><a class="btn btn-info" href="?page=traderedit&id=<?php echo$trade['id']?>">تعديل</a></td>

                    <td>
                                  <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#secoseco<?php echo$trade['id'] ?>">
                                حذف
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="secoseco<?php echo$trade['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><span class="text-dark">حذف </span> <span class="text-danger"><?php echo$trade['trader_name'] ?></span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="text-dark">هل تريد مسح </span>  <span class="text-danger"><?php echo$trade['trader_name'] ?></span> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <a href="functions/delete_trader.php?id=<?php echo$trade['id'] ?>" class="btn btn-danger">حذف</a>
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
<a href="?page=trader" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto"> اضافة تاجر</a>
