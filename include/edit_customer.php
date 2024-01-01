<?php
    $id_customer = $_GET['id'];
    $select_customer = $connect -> query ("SELECT * FROM clients WHERE id='$id_customer'");
    $customers = $select_customer -> fetch_assoc();
?>
<div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header bg-info" style="text-align:center;">
            <b>تعديل العميل</b>        
        </div>
            <div class="card-body" style="margin-bottom:-35%;">
                <form action="functions/customer_edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $customers['id']?>">
                    <div class="form-group">
                        <div>
                            <label for="exampleInputEmail1"><b>الاسم</b></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required value="<?php echo $customers['name']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone"><b>رقم الهاتف</b></label>
                        <input type="number" class="form-control" id="phone-number" name="phone" required maxlength="11" oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);" style="direction: ltr;" value="<?php echo "0".$customers['phone']?>">
                    </div>
                    <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%; margin-top:0%; font-size:20px;" value="تعديل">        
                </form>
            </div>
        </div>
    </div>