<?php
session_start();
session_unset();
if ( ! isset($_SESSION['user_id']) ) {
    header("Location:index.php");
} else {
    echo 'Eroare la deautentificare.';
}