<?php

if (isset($_POST['submit-btn'])){

require 'dbh.inc.php';


$username = $_POST['input-field'];
$email = $_POST['email id'];
$password = $_POST['password'];




else {

$sql = "select uidUsers from users where uisUsers=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepar($stmt)){

header("location: ../signup.php?error=sqlerror");
exit();


}


else {
mysqli_stmt_bind_param($stm,"s",$username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$resultcheck = mysqli_stmt_num_rows($stmt);
if ($resultcheck >0) {
   
    header("location: ../signup.php?error=usertaken&mail=".$email);
exit();

}
else {
$sql = "instert into users (uidUsers,emailUsers,PWDusers) values (?,?,?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepar($stmt)){

    header("location: ../signup.php?error=sqlerror");
    exit();
    }
else {
    $hashedPwd = password_hash($password, PASSWORD_DEAFAULT);
mysqli_stmt_bind_param($stm,"sss",$username,$email,);
mysqli_stmt_execute($stmt);


header("location: ../signup.php?signup=success");
exit();
}
}

}
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else {
    header("location: ../signup.php");
exit();
}





