<div class="container">
        <div class="card card-login ml-auto mr-auto" style="margin-bottom:2%;">
            <div class="card-header bg-info" style="text-align:center;">
            <b>اضافة فاتورة</b>
            </div>
            <div class="card-body">
                <div class="<?php if(isset($_GET['notfound'])){echo "alert alert-danger";}?>">
                    <?php
                        if(isset($_GET['notfound'])){
                            echo $_GET['notfound'];
                        }
                    ?>
                </div>
                <form action="functions/invoice.php" method="post">
                <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="search"><b>اسم العميل</b></label>
                                <input type="text" class="form-control" id="search" name="search" required>
                                <div id="search-results"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail10"><b>التاريخ</b></label>
                                <input type="date" class="form-control" id="exampleInputEmail10" name="date" required>
                            </div>
                        </div>
                    </div>
                
                    <div id="productContainer">
                    </div>

                    <input type="button" id="addProductBtn" class="btn btn-success" style="margin:0 45%;" value="&#43;"><br>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="result"><b>الإجمالي</b></label>
                                <input type="text" class="form-control result1" id="result" name="result" readonly onkeyup="sum()" required >
                            </div>
                            <div class="col-md-6">
                                <label for="cost"><b>خصم</b></label>
                                <input type="number" class="form-control cost" id="cost" name="cost" onkeyup="sum()" required value="0">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="num3"><b>المدفوع</b></label>
                                <input type="number" class="form-control" id="num3" name="paid" onkeyup="subtract()" required>
                            </div>
                            <div class="col-md-6">
                                <label for="result2"><b>المتبقي</b></label>
                                <input type="text" class="form-control" id="result2" name="residual" readonly required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="result3"><b>الحالة</b></label>
                        <input type="text" name="debt" id="result3" class="form-control" readonly>
                    </div>

                    <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%;margin:0% auto;font-size:20px;" value="اضافة">
                </form>
            </div>
        </div>
    </div>


