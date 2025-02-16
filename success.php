<?php

include './connection.php';

if(isset($_POST) && isset($_POST['login'])){

    if($_POST['login'] == 'Login'){
        //taking out  data from the form 
        $email = $_POST['user-login-email'];
        $password = $_POST['user-login-password'];

        //select query to check existing email
        $selectQuery = "SELECT * FROM `users` WHERE email = '$email' AND `password` = '$password'";

        $userExist =  mysqli_query($connection,$selectQuery);

        if(mysqli_num_rows($userExist)>0){
            $user = mysqli_fetch_assoc($userExist);
            session_start();
            $_SESSION['userData'] = $user;
            echo " <script>
            alert('Logged in successfully!!');
            </script> ";
            header('location:dashboard.php');
        }else{
            header('location:login.php?error-message=login-error');
        }

        // mysql 
        // YYYY-MM-DD

        // orcale 

        // DD-MM-YYYY 


        // MM-DD-YYYY

        // echo "<pre>";
        // var_dump($result);
        // exit;


    }
}

?>