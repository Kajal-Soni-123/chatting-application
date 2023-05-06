<?php
include '\xampp\htdocs\chat_app\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$user_name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$unique=mt_rand();
$hash=password_hash($password,PASSWORD_DEFAULT);
$cpassword=$_POST['cpassword'];
$sql="SELECT * FROM `user` WHERE user_email='$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==0){
    $insert_sql="INSERT INTO `user` (`user_name`, `user_email`, `user_password`, `user_unique_no`) VALUES ('$user_name', '$email', '$hash', '$unique')";
    $insert_result=mysqli_query($conn,$insert_sql);
    if($insert_result){
        header("location:register.php?success=true");
        exit();
    }
}

elseif($num>0){
    $showError="this emial id already exist try to register with new email id";
    header("location:register.php?error=$showError");
   exit();
}
else{
    $showError="password do not matches";
   header("location:register.php?error=$showError");
    exit();
}
}

?>