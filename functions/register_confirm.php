<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $passconfirm = $_POST['passconfirm'];

        $select_user = $connect -> query("SELECT * FROM user WHERE email='$email' OR username='$name'");
        $check_user = $select_user -> num_rows;

        if($check_user == 0){
            if($pass === $passconfirm){
            $insert_user = $connect -> query("INSERT INTO user
            (username,email,password,priv)
            VALUES
            ('$name','$email','$pass','1')");
            header("location:../login.php?success=تم تسجيل الحساب الجديد بنجاح");
            }
        }else{
            header("location:../register.php?used=  هذا الحساب مستخدم..حاول مرة اخرى");

        }
        

    }


