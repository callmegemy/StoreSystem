<?php 
    $current = "pay";
    include "design/header.php";
    include "design/sidebar.php";
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">سدادات فواتير العملاء</li>
        </ol>

        <?php 
          if(!isset($_GET['page'])){
            include "include/pay_table.php";
          }
        ?>


        


        
  <?php   
    include "design/footer.php";
  ?>

      