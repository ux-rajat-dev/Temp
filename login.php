<?php

include "./header.php";

?>

<?php

if (isset($_GET['success-message'])) {
    if ($_GET['success-message'] == 'true') {

        ?>

        <p style="color: white; background-color:green;">User have been registerd!!</p>

        <?php
    }
}

?>

<?php

if (isset($_GET['error-message'])) {
    if ($_GET['error-message'] == 'true') {

        ?>

        <p style="color: white; background-color:red;">User have not been registerd successfully!!</p>

        <?php
    }
}

?>

<?php

if (isset($_GET['error-message'])) {
    if ($_GET['error-message'] == 'login-error') {

        ?>

        <p style="color: white; background-color:red;">Invalid email and password!!</p>

        <?php
    }
}

?>

<h1>Login Form</h1>
<form action="./success.php" method="POST">
    <input type="email" name="user-login-email" placeholder="enter email" required><br><br>
    <input type="password" name="user-login-password" placeholder="enter password" required>
    <br><br>
    <input type="submit" name="login" value="Login">
    <br><br>
    <a href="./register.php">sign-up</a> <span> / </span> <a href="./forgot-password.php">forgot password</a>

</form>


<?php

include "./footer.php";

?>