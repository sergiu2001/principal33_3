<?php
include 'connection.php';
global $pdo;
session_start();

$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: loginform.php");
} else {
    $password = $_POST['password'];

    $sql = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $sql->bindParam(":email", $email);
    if ($sql->execute()) {
        if ($sql->rowCount() === 1) {
            while ($row = $sql->fetch()) {


                $_SESSION['login_key'] = "ouies";
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];

                $hash = $row['password'];
                if (password_verify($password, $hash)) {
                    header("Location: index.php");
                } else {
                    echo 'Wrong password';
                }
            }
        }
    } else {
        echo 'ERROR: Could not able to execute ' . $sql . $pdo->error;
    }
}