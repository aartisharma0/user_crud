<?php
    session_start();
    unset($_SESSION['email']);
    echo "<script>window.location.assign('adminlogin.php?msg=Logout Successfully!!')</script>";
?>