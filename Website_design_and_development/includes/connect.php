<?php
    // $host="sql307.epizy.com";
    // $username="epiz_28863518";
    // $password="uNesFd6QiGlIn";
    // $database="epiz_28863518_bkc_db";

    // $connect=mysqli_connect($host, $username, $password, $database);
    // if(!$connect){
    //     die("Error: " + mysqli_connect_error($connect));
    // }
    $host="localhost";
    $username="root";
    $password="";
    $database="bkc_a&a_db";

    $connect=mysqli_connect($host, $username, $password, $database);
    if(!$connect){
        die("Error: " + mysqli_connect_error($connect));
    }

    session_start();