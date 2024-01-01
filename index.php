<?php 
  $current = "report";
  include "design/header.php";
  include "design/sidebar.php";
?>
 
 <div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <!-- <li class="breadcrumb-item"> -->
      <li class="breadcrumb-item">التقارير</li>
    <!-- <li class="breadcrumb-item active">Charts</li> -->
  </ol>


<?php 
  if(!isset($_GET['page'])){
    include "include/report_view.php";
  }elseif($_GET['page']=="month"){
    include "include/month_report.php";
  }elseif($_GET['page']=="jan"){
    include "include/jan.php";
  }elseif($_GET['page']=="feb"){
    include "include/feb.php";
  }elseif($_GET['page']=="march"){
    include "include/march.php";
  }elseif($_GET['page']=="april"){
    include "include/april.php";
  }elseif($_GET['page']=="may"){
    include "include/may.php";
  }elseif($_GET['page']=="june"){
    include "include/june.php";
  }elseif($_GET['page']=="july"){
    include "include/july.php";
  }elseif($_GET['page']=="august"){
    include "include/august.php";
  }elseif($_GET['page']=="sep"){
    include "include/sep.php";
  }elseif($_GET['page']=="oct"){
    include "include/oct.php";
  }elseif($_GET['page']=="nov"){
    include "include/nov.php";
  }elseif($_GET['page']=="dec"){
    include "include/dec.php";
  }
?>





<?php   
  include "design/footer.php";
?>