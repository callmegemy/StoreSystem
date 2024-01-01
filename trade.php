<?php 
    $current = "trade";
    include "design/header.php";
    include "design/sidebar.php";
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">التجار</li>
        </ol>

        <?php 
          if(!isset($_GET['page'])){
            include "include/trade_view.php";
          }elseif($_GET['page'] == "trader"){
            include "include/trade_add.php";
          }elseif($_GET['page'] == "traderedit"){
            include "include/trade_edit.php";
          }
        ?>
        


        


        
  <?php   
    include "design/footer.php";
  ?>

      