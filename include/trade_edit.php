<?php
    $id_tader = $_GET['id'];
    $select_trader = $connect -> query("SELECT * FROM trader WHERE id='$id_tader'");
    $trader_select = $select_trader -> fetch_assoc();

    $trader_id = $trader_select['id'];
    $trader_name = $trader_select['trader_name'];
    $trader_phone = "0".$trader_select['trader_phone'];

?>

<div class="container">
        <div class="card card-login ml-auto mr-auto" style=" margin-bottom:2%;">
            <div class="card-header bg-info" style="text-align:center;"><b>تعديل التاجر</b></div>
            <div class="card-body">
        
                <form method="POST" action="functions/edit_trade.php">
                    <input type="hidden" value="<?php echo $trader_id?>" name="trader_id">
                    <div class="form-group">
                        <label for="trade_name"><b>اسم التاجر</b></label>
                        <input type="text" class="form-control" id="trade_name" name="trade_name" required value="<?php echo $trader_name?>">
                    </div>
                    <div class="form-group">
                            <label for="phone"><b>رقم الهاتف</b></label>
                                <input type="number" class="form-control" id="phone-number" name="phone" required maxlength="11" oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);" style="direction: ltr;" value="<?php echo $trader_phone?>">
                    </div>
                    <input type="submit" name="submit" class="button2 btn btn-primary" style="width: 100%; margin: 0% auto; font-size: 20px;" value="تعديل">
                </form>
            </div>
        </div>
    </div>
    