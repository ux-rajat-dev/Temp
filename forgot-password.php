<?php

include './connection.php';
include "controller-user-data.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot-password</title>
</head>

<body>

    <h1>Forgot Password</h1>

    Enter your email address : <input type="email" placeholder="enter your email" required>
    <br><br>

    <input type="submit" name="check-email" value="Continue">



</body>

</html>