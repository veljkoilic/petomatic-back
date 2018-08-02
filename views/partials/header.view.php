<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">

</head>
<body>
<section class="section">
    <div class="container">
    <?php if(isset($_SESSION['auth'])): ?>
    <?php
//        dd($_SESSION);
        ?>
        <p style="font-weight: bold">Hello, <?=ucfirst($_SESSION["auth"]->user_name);?> !</p>
        <br>
        <a href="/admin/logout">Log out</a>
<?php endif;?>
<?php require "nav.view.php"; ?>