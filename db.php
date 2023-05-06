<?php
$servername="localhost";
$username="root";
$password="";
$database="chat";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
die("cannot connect to the server".mysqli_connect_error());
}

?>