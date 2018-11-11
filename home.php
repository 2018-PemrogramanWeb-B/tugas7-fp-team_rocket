<?php
    include("config.php");
    session_start();

    function greet($username) {
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H');
        if ($time < "12") {
            echo "Selamat Pagi $username!!";
        } else
        if ($time >= "12" && $time < "17") {
            echo "Selamat Siang $username!!";
        } else
        if ($time >= "17" && $time < "19") {
            echo "Selamat Sore $username!!";
        } else
        if ($time >= "19") {
            echo "Selamat Malam $username!!";
        }
    }

    if ($_SESSION["username"]){
        greet($_SESSION["username"]);
    } else {
        header('location:index.php');
    }
?>