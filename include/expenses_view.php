<div class="container">
    <div class="card card-login ml-auto mr-auto" style=" margin-bottom:2%;">
        <div class="card-header bg-info" style="text-align:center;">
        <b>اضافة منتج</b>
        </div>
      <div class="card-body" style="margin-bottom:-35%;">
      <div class="<?php if(isset($_GET['clauseuse'])){echo "alert alert-danger";} ?>">
                    <?php 
                      if(isset($_GET['clauseuse'])){
                        echo $_GET['clauseuse'];
                      }
                    ?>
            </div>
            <form action="functions/clause_add.php" method="post" d-flex flex-row-reverse bg-secondary>
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>اسم المنتج</b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="clause" required>
                    </div>
                </div>
        
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>اللون</b></label>
                        <input type="color" class="form-control" id="exampleInputEmail1" name="color" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>الكمية</b></label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="quantity" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>التاريخ</b></label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="date" required>
                    </div>
                </div>
                <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin-top:0%;font-size:20px;" value="اضافة">        
            </form>
        </div>
      </div>
    </div>
</div>