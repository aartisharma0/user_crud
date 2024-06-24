<?php
    session_start();
    unset($_SESSION['email']);
    echo "<script>window.location.assign('userlogin.php?msg=Logout Successfully!!')</script>";
?>