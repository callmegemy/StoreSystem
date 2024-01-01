    <?php 
      $current = "expenses";
      include "design/header.php";
      include "design/sidebar.php";
    ?>



   

    <div id="content-wrapper" style="overflow: hidden;">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"> -->
            <li class="breadcrumb-item">المنتجات</li>
          <!-- <li class="breadcrumb-item active">Charts</li> -->
        </ol>



        <?php 
          if(!isset($_GET['page'])){
            include "include/expenses_table.php";
          }elseif($_GET['page'] == "show"){
            include "include/expenses_view.php";
          }elseif($_GET['page'] == "editproduct"){
            include "include/expenses_edit.php";
          }
        ?>
        



      <?php   
        include "design/footer.php";
       ?>