  <?php 
    $current = "customer";
    include "design/header.php";
    include "design/sidebar.php";
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"> -->
            <li class="breadcrumb-item">العملاء</li>
          <!-- <li class="breadcrumb-item active">Charts</li> -->
        </ol>

        <?php 
          if(!isset($_GET['page'])){
            include "include/customer_table.php";
          }elseif($_GET['page'] == "add"){
            include "include/add_customer.php";
          }elseif($_GET['page'] == "edit"){
            include "include/edit_customer.php";
          }
          ?>


        


        
  <?php   
    include "design/footer.php";
  ?>

      