<?php
    include_once 'config.php';
    $donarlist="";
    $reqlist="";
    $count = 1;
    $q1 = 'SELECT * FROM `donar_receiver` where isRegisterAsDonar=1';
    $res1 = mysqli_query($conn, $q1);
    while ($data1 = mysqli_fetch_array($res1)) {      
        $donarlist .= '<option value="'.$data1['id'].'">'.$data1['name'].'</option>';   
    }
    $q3 = 'SELECT * FROM `donar_receiver` where isRegisterAsReceiver=1';
    $res3 = mysqli_query($conn, $q3);
    while ($data2 = mysqli_fetch_array($res3)) {      
        $reqlist .= '<option value="'.$data2['id'].'">'.$data2['name'].'</option>';   
    }
?>