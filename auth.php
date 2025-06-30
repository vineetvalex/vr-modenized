<?php
session_start();
if(!isset($_SESSION['username'])){
echo "<script type='text/javascript'>alert('Please Login to Continue')</script>";
header("Location: index.php");
echo "<script type='text/javascript'> document.location = 'index.php#login'; </script>";
exit(); }
?>