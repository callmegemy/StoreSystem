<div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header bg-info" style="text-align:center;">
            <b>اضافة عميل</b>        
        </div>
            <div class="card-body" style="margin-bottom:-35%;">
                <div class="<?php if(isset($_GET['clientuse'])){echo "alert alert-danger";} ?>">
                    <?php 
                      if(isset($_GET['clientuse'])){
                        echo $_GET['clientuse'];
                      }
                    ?>
                </div>
                <form action="functions/client_add.php" method="post">
                    <div class="form-group">
                        <div>
                            <label for="exampleInputEmail1"><b>الاسم</b></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                                    <label for="phone"><b>رقم الهاتف</b></label>
                                    <div class="input-group">
                                    <input type="number" class="form-control" id="phone-number" name="phone" required maxlength="8" oninput="if(this.value.length > 8) this.value = this.value.slice(0, 8);" style="direction: ltr; width: 250px;">
                                        <select class="custom-select" id="phone-prefix" name="prefix" required style="direction:ltr;">
                                            <option value="010">010</option>
                                            <option value="011">011</option>
                                            <option value="012">012</option>
                                            <option value="015">015</option>
                                        </select>
                                    </div>
                                </div>
                    </div>
                    <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%; margin-top:0%; font-size:20px;" value="اضافة">        
                </form>
            </div>
        </div>
    </div>