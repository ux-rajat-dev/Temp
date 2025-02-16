<?php

include './connection.php';

if(isset($_POST) && isset($_POST['submit'])){

    if($_POST['submit'] == 'Update'){
                //taking out  data from the form
                $id = $_POST['id']; 
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $dob = $_POST['dob'];

    
                $updateQuery =  "UPDATE `users` SET name = '$name', gender = '$gender', dob = '$dob' WHERE id = '$id'";

                $result =  mysqli_query($connection,$updateQuery);
                
                if($result){
                    echo "<script>
                    alert('The user has been deleted');
                    </script>";
                    header('location:dashboard.php?success-message=The user info have been updated successfully!!');
                }else{
                    header('location:dashboard.php?error-message=Updation failed');
                }
    }
}

?>