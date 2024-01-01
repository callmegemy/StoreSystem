<?php 
    $current = "bill";
    include "design/header.php";
    include "design/sidebar.php";
?>

<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
      <li class="breadcrumb-item">فواتير العملاء</li>
  </ol>


        <?php 
          if(!isset($_GET['page'])){
            include "include/invoice_table.php";
          }elseif($_GET['page'] == "invoice"){
            include "include/new_invoice.php";
          }elseif($_GET['page'] == "invoice_edit"){
            include "include/edit_invoice.php";
            }
        ?>
<?php 
    include "design/footer.php";
?>
        
  