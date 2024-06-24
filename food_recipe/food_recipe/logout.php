<?php
session_start();
if(isset($_SESSION['admin_email'])){
    unset($_SESSION['admin_email']);
    echo "<script>window.location.assign('admin.php?msg=logout succesfully')</script>";
}else if(isset($_SESSION['user_email'])){
    unset($_SESSION['user_email']);
    echo "<script>window.location.assign('user_login.php?msg=logout succesfully')</script>";
    // echo header('location:login.php?msg=logout succesfully');
    
}


?>