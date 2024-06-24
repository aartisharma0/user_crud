<?php
    session_start();
    if(isset($_SESSION['admin_email'])){
    unset($_SESSION['admin_email']);
    echo "<script>window.location.assign('adminlogin.php?msg=Logout Successfully!!')</script>";
    }
    else if(isset($_SESSION['nanny_email'])){
        unset($_SESSION['nanny_email']);
        echo "<script>window.location.assign('nannylogin.php?msg=Logout Successfully!!')</script>";    
    }
    else if(isset($_SESSION['parent_email'])){
        unset($_SESSION['parent_email']);
        echo "<script>window.location.assign('parentlogin.php?msg=Logout Successfully!!')</script>";    
    }


?>
