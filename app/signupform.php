<?php
include 'connection.php';
include 'headertype.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="formstyle.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="functions.js"></script>
</head>
<body>
<main>
    <div class="form__wrapper">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <div class="form__field">
                <input type="text" name="name" id="name" required>
                <span></span>
                <label for="name">Name</label>
            </div>
            <div class="form__field">
                <input type="email" name="email" id="email" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            <div class="form__field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>
            <div class="form__field">
                <input type="url" name="image" id="image" required>
                <span></span>
                <label for="image">Image</label>
            </div>
            <input class="form__button" type="submit" value="Submit">
        </form>
    </div>
    </div>
</main>
</body>