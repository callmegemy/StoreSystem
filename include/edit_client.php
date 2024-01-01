<?php
    $id = $_GET['id'];
    $select_user = $connect -> query("SELECT * FROM client_statement WHERE id = '$id'");
    $user_id = $select_user -> fetch_assoc();
?>
<div class="container">
<div class="card card-login mx-auto mt-5"style=" margin-bottom:2%;">
        <div class="card-header bg-info" style="text-align:center;">سداد</div>
        <div class="card-body">
            <form action="functions/client_edit.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="id" name="id" required  value="<?php echo $user_id['id']?>" hidden>
                </div>
                <div class="form-group">
                    <label for="namee"><b>اسم العميل</b></label>
                    <input type="text" class="form-control" id="namee" name="namee" required  value="<?php echo $user_id['name']?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="pay3"><b>إجمالي الفواتير</b></label>
                    <input type="number" class="form-control" id="pay3" name="total" readonly  value="<?php echo $user_id['client_total']?>" >
                </div>
                <div class="form-group">
                    <label for="pieces"><b> إجمالي عدد القطع</b></label>
                    <input type="text" class="form-control" id="pieces" name="pieces" required  value="<?php echo $user_id['client_pieces']?>" readonly>
                </div>

                <div class="form-group">
                    <label for="pay"><b>إجمالي المدفوع</b></label>
                    <input type="number" class="form-control" id="pay" class="pay" name="paid" readonly  value="<?php echo $user_id['client_paid'] ?>"  >
                </div>
              
                <div class="form-group">
                    <label for="pay2"><b>إجمالي المتبقي</b></label>
                    <input type="number" class="form-control" id="pay2" class="pay2" name="rest" readonly  value="<?php echo $user_id['client_residual'] ?>" >
                </div>

                <div class="form-group">
                    <label for="pay1"><b>قيمة السداد</b></label>
                    <input type="number" class="form-control" id="pay1" name="value" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail10"><b>التاريخ</b></label>
                    <input type="date" class="form-control" id="exampleInputEmail10" name="date" required >
                </div>                
                    <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin:0% auto;font-size:20px;" value="سداد">       
            </form>
        </div>
      </div>
    </div>
  </div>
