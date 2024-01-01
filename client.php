<?php 
      $current = "customer2";
      include "design/header.php";
      include "design/sidebar.php";
    ?>
 
 <div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
      <li class="breadcrumb-item">كشف حساب العملاء</li>
  </ol>


<?php 
  if(!isset($_GET['page'])){
    include "include/client_statement.php";
  }elseif($_GET['page'] == "edit"){
    include "include/edit_client.php";
  }
  
  
?>





<?php   
  include "design/footer.php";
?>