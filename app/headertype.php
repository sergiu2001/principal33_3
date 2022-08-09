<?php
session_start();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ) {
    include 'headerL.php';
} else {
//    if ((!isset($_SESSION['login_key'])) && $_SESSION['login_key'] != 'ouies')
//        header("Location:index.php");
    include 'header.php';
}
session_write_close();
