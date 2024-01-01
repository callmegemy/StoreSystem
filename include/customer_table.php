<div class="card mb-3" >
          <div class="card-header bg-info" style="text-align:center;">
            <i class="fas fa-table"></i>
            جميع العملاء </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>رقم العميل</th>
                    <th>اسم العميل</th>
                    <th>رقم الهاتف</th>
                    <th>تعديل العميل </th>
                    <th>حذف العميل </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      $select_client = $connect -> query("SELECT * FROM clients");
                      $id_count = 1;
                      foreach($select_client as $client){  
                    
                    ?>
                  <tr>
                    <td><?php echo $id_count++ ?></td>
                    <td><?php echo $client['name'] ?></td>
                    <td><?php echo "0" .$client['phone'] ?></td>
                    <td><a href="?page=edit&id=<?php echo $client['id']?>" class="btn btn-info" >تعديل </a></td>
                    <td>
                                  <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#secoseco<?php echo$client['id'] ?>">
 حذف 
</button>

<!-- Modal -->
<div class="modal fade" id="secoseco<?php echo $client['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span class="text-dark">حذف </span> <span class="text-danger"><?php echo $client['name'] ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="text-dark">هل تريد مسح </span>  <span class="text-danger"><?php echo $client['name'] ?></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delete_user.php?id=<?php echo $client['id'] ?>" class="btn btn-danger">حذف</a>
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
        <a <?php if($priveleges > 1){echo "hidden";}?> href="?page=add" class="button2 btn btn-primary" style="color:white;text-decoration:none;width: 30%;font-size:20px;margin:2% auto;">اضافة عميل</a>


