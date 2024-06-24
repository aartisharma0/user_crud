<?php
    session_start();
    if(isset($_SESSION['admin_email'])){
    unset($_SESSION['admin_email']);
    echo "<script>window.location.assign('adminlogin.php?msg=Logout Successfully!!')</script>";
    }
    else if(isset($_SESSION['user_email'])){
        unset($_SESSION['user_email']);
        echo "<script>window.location.assign('userlogin.php?msg=Logout Successfully!!')</script>";    
    }
    else if(isset($_SESSION['pho_email'])){
        unset($_SESSION['pho_email']);
        echo "<script>window.location.assign('photographerlogin.php?msg=Logout Successfully!!')</script>";    
    }


?>
