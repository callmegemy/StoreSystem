<?php 
$id_pro = $_GET['id'];
$select_product = $connect -> query("SELECT * FROM expenses WHERE id='$id_pro'");
$products = $select_product -> fetch_assoc();




?>
<div class="container">
    <div class="card card-login ml-auto mr-auto" style=" margin-bottom:2%;">
        <div class="card-header bg-info" style="text-align:center;">
        <b>تعديل المنتج</b>
        </div>
      <div class="card-body" style="margin-bottom:-35%;">
            <form action="functions/clause_edit.php" method="post" d-flex flex-row-reverse bg-secondary>
                <input type="hidden" value="<?php echo $products['id']?>" name="id">
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>اسم المنتج</b></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="clause" required  value="<?php echo $products['clause_name']?>">
                    </div>
                </div>
        
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>اللون</b></label>
                        <input type="color" class="form-control" id="exampleInputEmail1" name="color" required value="<?php echo $products['color']?>">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>الكمية</b></label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="quantity" required value="<?php echo $products['quantity']?>">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="exampleInputEmail1"><b>التاريخ</b></label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="date" required value="<?php echo $products['date']?>">
                    </div>
                </div>
                <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin-top:0%;font-size:20px;" value="تعديل">        
            </form>
        </div>
      </div>
    </div>
</div>