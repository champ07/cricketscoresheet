<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cricket Score Sheet </title>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <?php if ($page_name === "score_sheet"){
        ?>
</head>

<body>

    <div class="navbar">

        <div class="logo">
            <img src="assets/images/logo.png" alt="Avatar" class="symbol">
        </div>

        <a class="btn1">
            <span></span>
            <span></span>
            <span></span>
        </a>

        <div class="menu">
            <a href="index.php">Home</a>
            <a href="#">How to use</a>
            <a href="#">About us</a>

            <?php if (isset($_SESSION['email'])) {
                echo '<a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </div>
    </div>