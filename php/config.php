<?php 

    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','birds');

    $con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD, DB_NAME);
    // if ($conn == false) {
    //     die("err");
    // }else{
    //     die("done");
    // }
    function change_registration_Id ($con, $uid){
        $new_regid = rand(1000,9999).date("Ymdhis");
        $get_name = "SELECT * FROM `users` WHERE `uid` = '$uid'";
        $name = mysqli_query($con, $get_name);
        if (mysqli_num_rows($name) > 0) {
            $got = mysqli_fetch_assoc($name);
            $us = $got['username'];
            $update_id = "UPDATE `users` SET `registeration_id`='$new_regid' WHERE `username` = '$us'";
            mysqli_query($con, $update_id);
        }

    }
?>