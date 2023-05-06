<?php
session_start();
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']=="true"){
$sender_id=$_SESSION['user_id'];
$time=date("y/m/d");
}
if(isset($_GET['user_id'])){
    $receiver_id=$_GET['user_id'];
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
<!--writing code to store message in data-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Chat App</title>
  </head>
  <body>
<div class="container border border-dark rounded my-5 p-0 align-items-center justify-content-center">
<section class="bg-dark py-0"><h3 class="text-light text-center py-3">ChitChat</h3></section>
<section class="border-bottom border-dark my-2 py-2">
<div class="d-flex">
<img src="https://tse1.mm.bing.net/th?id=OIP.1nWRQ7r_1nEVJ6sdz_zwkwHaE8&pid=Api&rs=1&c=1&qlt=95&w=165&h=110" height="50px" width="70px" alt="">
<h5 class="py-2"><?php echo $rec_name?></h5>
<a href="logout.php" class="btn btn-dark text-light mx-5 float-right">logout</a>
</div>
</section>
<div class="container">
<?php
$sql="SELECT * FROM `message` WHERE (send_unique_id='$send_unique_id' AND rec_unique_id='$rec_unique_id') OR (send_unique_id='$rec_unique_id' AND rec_unique_id='$send_unique_id') ORDER BY msg_id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  if($row['send_unique_id']==$send_unique_id){
    $send_msg=$row['msg'];
  echo'
  <div style="clear:both" class="my-1 float-right">
    <div style="height:10px  background-color: rgb(212, 235, 233);"class="d-flex">
    <img src="https://tse1.mm.bing.net/th?id=OIP.lsaqXiF1qoA0lNGxssv4dQHaFy&pid=Api&P=0" height="50px"width="70px" class="mr-3" alt="...">
    <div class="border border-secondary rounded">
    <p class="text-secondary px-2">'.$send_msg.'</p>
    </div>
    </div>
    </div>
  ';
  }
  elseif($row['rec_unique_id']==$send_unique_id){
    $rec_msg=$row['msg'];
    echo'
  <div style="clear:both" class="my-1">
    <div style="height:10px  background-color: rgb(212, 235, 233);"class="d-flex">
    <img src="https://tse1.mm.bing.net/th?id=OIP.1nWRQ7r_1nEVJ6sdz_zwkwHaE8&pid=Api&rs=1&c=1&qlt=95&w=165&h=110" height="50px"width="70px" class="mr-3" alt="...">
    <div class="border border-secondary bg-dark rounded">
    <p class="text-light px-2">'.$rec_msg.'</p>
    </div>
    </div>
    </div>
  
  ';
  }
}
?>
</div>
<section style="clear:both">
<form class="my-3 d-flex" action="msg.php?id=<?php echo $receiver_id?>" method="post">
<input style="width:1700px" type="text" id=msg name="msg" class="mx-1" placeholder="Enter your message" required>
<input type="submit" value="send" class="btn btn-dark text-light mx-1">
</form>
</section>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>