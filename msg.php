<?php
session_start();
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']=="true"){
$sender_id=$_SESSION['user_id'];
}
if(isset($_GET['id'])){
    $receiver_id=$_GET['id'];
}
include '\xampp\htdocs\chat_app\db.php';
//fetching the receiver information from database
$rec_sql="SELECT * FROM `user` WHERE user_id='$receiver_id'";
$rec_result=mysqli_query($conn,$rec_sql);
$rec_row=mysqli_fetch_assoc($rec_result);
$rec_name=$rec_row['user_name'];
$rec_unique_id=$rec_row['user_unique_no'];
//fetching the sender information from database
$send_sql="SELECT * FROM `user` WHERE user_id='$sender_id'";
$send_result=mysqli_query($conn,$send_sql);
$send_row=mysqli_fetch_assoc($send_result);
$send_name=$send_row['user_name'];
$send_unique_id=$send_row['user_unique_no'];
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$msg=$_POST['msg'];
$sql='INSERT INTO `message` (`msg`, `send_unique_id`, `rec_unique_id`) VALUES("'.$msg.'", "'.$send_unique_id.'", "'.$rec_unique_id.'")';
$result=mysqli_query($conn,$sql);
if($result){
    header("location:chat.php?user_id=$receiver_id");
}
}
?>