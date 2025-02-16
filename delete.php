<?php

include './connection.php';

$id = $_GET['id'];

//delete query
$deleteQuery = "DELETE FROM users WHERE id = '$id'";

//executing the query

$result =  mysqli_query($connection,$deleteQuery);


if($result){
    echo "<script>
    alert('The user has been deleted');
    </script>";
    header('location:dashboard.php?success-message=The user has been deleted');
}else{
    header('location:dashboard.php?error-message=The user has not been deleted');
}

?>