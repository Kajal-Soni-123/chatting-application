
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylrsheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@500&display=swap" rel="stylesheet">

    <title>Chat App!</title>
  </head>
  <body>
  <div class="container border border-dark rounded my-5 p-0 align-items-center justify-content-center">
  <section class="bg-dark"><h2 class="text-light text-center my-0 py-2">Registration</h2></section>
  <section class="my-0">
    <?php
    if(isset($_GET['success']) && $_GET['success']=="true"){
      echo '<div class="alert alert-secondary text-dark text-center my-0 alert-dismissible fade show" role="alert">
      you have been registered successfully
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    if(isset($_GET['error'])){
    $error=$_GET['error'];
    echo '<div class="alert alert-secondary text-dark  m-0 text-center alert-dismissible fade show" role="alert">
    '.$error.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }  
    ?>
</section>
<div class="p-2">
<form action="register_handle.php" method='post'>
<div class="form-group">
    <label for="name">Name</label>
   <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">E-mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="cpassword" required>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
<input type="submit" class="btn btn-dark text-light" value="Submit">
</form>   
</div>
<div class="d-flex algin-items-center justify-content-center py-2">
<span class="mx-2 text-primary">Already registered? </span>
<button type="submit" class="btn btn-dark"><a class="text-light" href="login.php">Login</a></button>
</div>
 <div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>