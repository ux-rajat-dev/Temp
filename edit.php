<?php

require './connection.php';
$id = $_GET['id'];

//select query

$selectQuery =  "SELECT * FROM users WHERE id ='$id'";

//exectuting the query

$result = mysqli_query($connection,$selectQuery);
$user = mysqli_fetch_assoc($result);

?>

<?php
include './header.php';
 ?>

<h1>Update User Page</h1>

    <form action="update.php" method="POST">
        <input type="text" name="id" value="<?php echo $user['id'] ?>" hidden>
        Name : <input type="text" name="name" placeholder="enter name" value="<?php echo $user['name'] ?>" required >
        <br><br>
        Gender : <input type="radio" name="gender" value="m" <?php if($user['gender']=='m'){ ?> checked <?php }?>  required > male <input type="radio" name="gender" value="f" <?php if($user['gender']=='f'){ ?> checked <?php }?> required> female
        <br><br>
        DOB : <input type="date" name="dob" value="<?php echo $user['dob'] ?>" required>
        <br><br>
        <?php
        $userRole = 1;
        if($userRole==1){
        ?>
        <input type="submit" value="Update" name="submit">
        <?php
        }
        ?>
    </form>

<?php 

include './footer.php';

?>