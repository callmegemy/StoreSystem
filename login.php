<?php
  
  session_start();

  if(isset($_SESSION['login'])){
    header("location:trade.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>تسجيل دخول</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/rtl.css" rel="stylesheet">

  <style>
    body {
      background-image: url(segad2.svg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: contain;
      background-position: left center; /* Change this line to position the image to the left */
      background-color: #343a40;
      margin-left: 35%;
      margin-top: 13%;
    }

    .button {

    background-color: #212529; 
    border: 2px solid red;
    border-radius: 8px;
    border: none;
    color: white;
    padding: 12px 32px;
    text-align: center;
    text-decoration:none;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;

    }

    .button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
 
   

  </style>

</head>

<body>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header bg-info" style="text-align:center;"><b>تسجيل دخول</b></div>
      <div class="card-body">
          <div class="<?php if(isset($_GET['error'])){echo "alert alert-danger";} ?>">
            <?php 
              if(isset($_GET['error'])){
                echo $_GET['error'];
              }
            ?>
            </div>
          <div class="<?php if(isset($_GET['success'])){echo "alert alert-success";} ?>" id="success-message">
            <?php 
              if(isset($_GET['success'])){
                echo $_GET['success'];
              }
            ?>
        </div>
        <form action="functions/login_confirm.php" method="post" d-flex flex-row-reverse bg-secondary>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Khalid@gmail.com" required="required" autofocus="autofocus" name="email">
              <label for="inputEmail">البريد الإلكتروني أو اسم المستخدم</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="123" required="required" name="pass">
              <label for="inputPassword">كلمة السر</label>
            </div>
          </div>
          <input class="button btn-primary btn-block" type="submit" value="تسجيل دخول">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">عمل حساب جديد</a>
          <!-- <a class="d-block small" href="forgot-password.php">هل نسيت كلمة السر؟</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
