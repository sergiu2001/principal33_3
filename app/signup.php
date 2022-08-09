<?php
include 'connection.php';
global $pdo;

$name = $_POST['name'];
$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signupform.php");
} else {
    $options = [
        'cost' => 13,
    ];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    $img = $_POST['image'];

    $try = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $try->bindParam(":email", $email);
    $try->execute();
    if ($try->rowCount())
        header("Location:index.php");
    else {
        $sql = $pdo->prepare("INSERT INTO users (name, email, password, img) VALUES (:name, :email, :pass, :img)");
        $sql->bindParam(":name", $name);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":pass", $pass);
        $sql->bindParam(":img", $img);
        $sql->execute();
        if ($sql->fetch()) {
            header("Location:index.php");
        } else {
            echo 'ERROR: Could not able to execute ' . $try->error;
        }
    }
}