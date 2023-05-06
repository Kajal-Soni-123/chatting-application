<?php
include '\xampp\htdocs\chat_app\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$user_email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$sql="SELECT * FROM `user` WHERE user_email='$user_email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo $num;
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];
$user_name=$row['user_name'];

if($num==1){
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['user_id']=$user_id;
    $_SESSION['user_name']=$user_name;
    header("location:login.php?success=true");
}
else{
  header("location:login.php?success=false");
}
}
?>