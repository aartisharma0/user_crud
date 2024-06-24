<?php
    session_start();
    if(isset($_SESSION['admin_email'])){
    unset($_SESSION['admin_email']);
    echo "<script>window.location.assign('adminlogin.php?msg=Logout Successfully!!')</script>";
    }
    else if(isset($_SESSION['stu_email'])){
        unset($_SESSION['stu_email']);
        echo "<script>window.location.assign('studentlogin.php?msg=Logout Successfully!!')</script>";    
    }
    else if(isset($_SESSION['hod_email'])){
        unset($_SESSION['hod_email']);
        echo "<script>window.location.assign('hodlogin.php?msg=Logout Successfully!!')</script>";    
    }


?>
