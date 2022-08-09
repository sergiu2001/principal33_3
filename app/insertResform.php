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
        <h1>Create a reservation</h1>
        <form action="insertRes.php" method="post" enctype="multipart/form-data">
            <div class="form__field">
                <input type="text" name="title" id="title" required>
                <span></span>
                <label for="title">Subject</label>
            </div>
            <div class="form__field">
                <input type="text" name="date" id="date" onfocus="(this.type='date')" onblur="(this.type='text')"
                       required>
                <span></span>
                <label for="date">Date</label>
            </div>
            <div class="form__field">
                <input type="text" name="time" id="time" onfocus="(this.type='time')" onblur="(this.type='text')" required>
                <span></span>
                <label for="time">Time</label>
            </div>
            <input class="form__button" type="submit" value="Submit">
        </form>
    </div>
</main>
</body>
