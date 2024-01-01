<div id="wrapper" >

<!-- Sidebar -->
<ul class="sidebar navbar-nav " >
<li class="nav-item <?php if($current == "trade"){echo "active";}?>">
    <a class="nav-link" href="trade.php">
      <i class="fas fa-chalkboard-teacher	"></i>
      <span>التجار</span></a>
  </li>
<li class="nav-item <?php if($current == "invoice"){echo "active";}?>">
    <a class="nav-link" href="trader_invoice.php">
      <i class="fas fa-file-invoice"></i>
      <span>فواتير التجار</span></a>
  </li>
  <li class="nav-item <?php if($current == "expenses"){echo "active";}?>" >
      <a class="nav-link" href="expenses.php">
        <i class="fab fa-product-hunt"></i>
        <span>المنتجات</span></a>
    </li>
    
<li class="nav-item <?php if($current == "customer"){echo "active";}?>">
    <a class="nav-link" href="customer.php">
      <i class="fas fa-user-alt"></i>
      <span>العملاء</span></a>
  </li>
  <li class="nav-item <?php if($current == "bill"){echo "active";}?>">
    <a class="nav-link" href="bill.php">
      <i class="fas fa-file-invoice"></i>
      <span>فواتير العملاء</span>
    </a>
  </li>
  <li class="nav-item <?php if($current == "customer2"){echo "active";}?>">
    <a class="nav-link" href="client.php">
      <i class="fas fa-user-check"></i>
      <span>كشف حساب العملاء</span></a>
  </li>
  <li class="nav-item <?php if($current == "pay"){echo "active";}?>">
    <a class="nav-link" href="pay.php">
      <i class="fas fa-check-double"></i>
      <span>سدادات فواتير العملاء</span>
    </a>
  </li>
  <!-- <li class="nav-item <?php if($current == "report"){echo "active";}?>">
    <a class="nav-link" href="index.php">
      <i class="fas fa-clipboard"></i>
      <span>التقارير</span>
    </a>
  </li> -->

</ul>