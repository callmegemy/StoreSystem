<?php 
    $current = "invoice";
    include "design/header.php";
    include "design/sidebar.php";
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">فواتير التجار</li>
        </ol>

        <?php 
          if(!isset($_GET['page'])){
            include "include/trader_invoice_table.php";
          }elseif($_GET['page'] == "invoicetrade"){
            include "include/add_trader_invoice.php";
          }elseif($_GET['page'] == "invoicedetails"){
            include "include/details_trader_invoice.php";
          }elseif($_GET['page'] == "invoiceedit"){
            include "include/edit_trader_invoice.php";
          }elseif($_GET['page'] == "invoicepay"){
            include "include/pay_trader_invoice.php";
          }
        ?>
        


        


        
  <?php   
    include "design/footer.php";
  ?>

      