<?php
session_start();
session_unset();
session_destroy();
echo'<script>alert("you have been logged out successfully")</script>';
header("location:login.php");
?>