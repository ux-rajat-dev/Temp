

<?php 

include "./header.php";
include "./connection.php";

?>


    <h1>Register Page</h1>

    <form action="?sid=5" method="POST">
        Name : <input type="text" name="name" placeholder="enter name" required >
        <br><br>
        Email : <input type="email" name="email" placeholder="enter email" required>
        <br><br>
        Passowrd : <input type="password" name="password" placeholder="enter password" required>
        <br><br>
        Gender : <input type="radio" name="gender" value="m" required> male <input type="radio" name="gender" value="f" required> female
        <br><br>
        DOB : <input type="date" name="dob" required>
        <br><br>
        <input type="hidden" name="role" value="user">
        <?php
        $userRole = 1;
        if($userRole==1){
        ?>
        <input type="submit" value="Register" name="submit">
        <?php
        }
        ?>
    </form>
    


    
<?php 

include "./footer.php";

?>

<?php




// echo "<pre>";
// var_dump($_POST);
// var_dump($_REQUEST);
// var_dump($_SERVER);
// var_dump($_GET);

// echo $_POST['name'];
// exit;


if(isset($_POST) && isset($_POST['submit'])){

    if($_POST['submit'] == 'Register'){
        //taking out  data from the form 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        //select query to check existing email
        $selectQuery = "SELECT * FROM `users` WHERE email = '$email' ";

        $userExist =  mysqli_query($connection,$selectQuery);

        if(mysqli_num_rows($userExist)>0){
            echo " <script>
            alert('user have been with the same email id go to the login page!!');
            </script> ";
        }else{
        // insert query
        $insertQuery = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `gender`, `dob`) VALUES('','$name','$email','$password','$gender','$dob')";

        // executing query
        $result = mysqli_query($connection,$insertQuery);

        if($result){
            echo " <script>
            alert('user have been regisered successfully!!');
            </script> ";
            // session management
            // url parameter
            // cookie management 
            header('location:login.php?success-message=true');
        }else{
            echo " <script>
            alert('user have not been regisered successfully!!');
            </script> ";
            header('location:login.php?error-message=true');
        }

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



