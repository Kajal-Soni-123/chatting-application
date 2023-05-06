<?php
session_start();
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']=="true"){
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
}
include '\xampp\htdocs\chat_app\db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Chat App!</title>
  </head>
  <body>
  <div style="width:600px" class="container border border-dark rounded my-5 p-0 align-items-center justify-content-center">
    <section class="bg-dark"><h4 class="text-light py-3 text-center">Here are some people with whom you can start chat</h4></section>
    <section class="d-flex">
   <img src="https://tse1.mm.bing.net/th?id=OIP.lsaqXiF1qoA0lNGxssv4dQHaFy&pid=Api&P=0" height="50px"width="70px" class="mr-3" alt="...">
    <h4 class="py-2"><?php echo $user_name ?></h4>
    </section>
    <section> <form class="form-inline my-2 my-lg-0" action="" method="get">
      <input style="width:500px" class="form-control mx-2" type="search" placeholder="Search" name="search" aria-label="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form></section>
<div class="search-name mt-2">    
<?php
if(isset($_GET['search'])){
  $name=$_GET['search'];
  $sql="SELECT * FROM `user` WHERE match(user_name) against ('$name')";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $name=$row['user_name'];
    $id=$row['user_id'];
  ?>
      <div class="card my-1">
    <div style="height:10px  background-color: rgb(212, 235, 233);"class="d-flex">
    <img src="https://tse1.mm.bing.net/th?id=OIP.lsaqXiF1qoA0lNGxssv4dQHaFy&pid=Api&P=0" height="50px"width="70px" class="mr-3" alt="...">
    <h5 class="py-2"><a class="text-dark" href="chat.php?user_id=<?php echo $id?>"><?php echo $name?></a></h5>
    </div>
    <div class="border border-secondary rounded mx-2">
    <p class="text-secondary px-2">text message</p>
    </div>
  </div>
  <?php
  }
}
else{
$sql="SELECT * FROM `user` WHERE NOT user_id='$user_id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
  $name=$row['user_name'];
  $id=$row['user_id'];
?>
    <div class="card my-1">
  <div style="height:10px  background-color: rgb(212, 235, 233);"class="d-flex">
  <img src="https://tse1.mm.bing.net/th?id=OIP.lsaqXiF1qoA0lNGxssv4dQHaFy&pid=Api&P=0" height="50px"width="70px" class="mr-3" alt="...">
  <h5 class="py-2"><a class="text-dark" href="chat.php?user_id=<?php echo $id?>"><?php echo $name?></a></h5>
  </div>
  <div class="border border-secondary rounded mx-2">
  <p class="text-secondary">text message</p>
  </div>
</div>
<?php
}
}?>
   </div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>