<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Center</title>
</head>

<style>
    body{
        font-family: sans-serif;
    }

    .navbar {
        height: 100px;
        white-space: nowrap;
        background-color: #333333;
        display: flex; 
    }

    #logo {
        font-style: italic;
        font-family:sans-serif;
        font-weight: bold;
        color: #FFCC33;
        background-color: #FFFFFF;
        float: left;
        padding-top: 5px;
        padding-left: 20px;
        padding-right: 20px;
    }

    #title {
        font-family:sans-serif;
        text-transform: uppercase;
        font-size: 45px;
        top: 0px;
        left: 35%;
        float: left;
        position: absolute;
        color: #FFFFFF;
    }
</style>

<body onload="carSelection()">
    <div class="navbar">
        <h1 id="logo">Hertz-UTS</h1>
        <h1 id="title">Car Rental Center</h1>
    </div>
    <h1>Thank you for the booking. </h1>
    <h2>The car rental center will email you to confirm. Please pick up the rented car according to the time and place on the email.</h2>
    
    <?php
    session_start();
    $to = $_REQUEST['email'];
    $subject = 'Your Reservation Details';
    $message = '<h1>Reservation Details</h1>
                <h2>Thanks For Renting Cars From Hertz-UTS, total amount of your consumption is : $' . $_SESSION["sum"] .
    $headers .= 'From: <westlifeloving@gmail.com>' . "\r\n";
    $headers .= "Return-Path: <westlifeloving@gmail.com>\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($to, $subject, $message, $headers);
    ?>
</body>

</html>
<?php
session_destroy();
?>