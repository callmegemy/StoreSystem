<?php
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require "connect.php";

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $select_user = $connect -> query("SELECT * FROM user WHERE email='$email' OR username='$email'");
        $log = $select_user -> fetch_assoc();
        
        $id = $log['id'];
        $password = $log['password'];
        $priv = $log['priv'];

        $count = $select_user -> num_rows;

        if($count > 0){
            if($pass === $password){
                $_SESSION['login'] = $id;
                header("location:../trade.php");
            }else{
                header("location:../login.php?error=كلمة السر خاطئة..من فضلك حاول مرة اخرى");
            }
        }else{
            header("location:../login.php?error=البريد الإلكتروني أو اسم المستخدم خاطئ..من فضلك حاول مرة اخرى");
        }
    }
?>