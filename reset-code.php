<?php

require_once "controller-user-data.php";

?>

<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
</head>

<body>
    <?php
    if (isset($_SESSION['info'])) {
        ?>

        <?php
        echo $_SESSION['info'];
        ?>

        <?php
    }
    ?>

    <?php
    if (count($errors) > 0) {
        ?>
        <div class="alert alert-danger text-center">
            <?php
            foreach ($errors as $showerror) {
                echo $showerror;
            }
            ?>
        </div>
        <?php
    }
    ?>

    <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
    <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">


</body>