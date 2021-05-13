<?php
include 'config.php';
session_start(); //starts session

$myusername = $_SESSION['login_user']; //gets usernmae from the logged in user

$sql = "SELECT * FROM admins WHERE adminEmail = '$myusername'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['user_level'] = $row['userlvl']; //gets user level
$_SESSION['user_name'] = $row['usernam']; //gets username


if($_SESSION['user_level'] != 0 ){ //if user isn't admin don't allow them to access, redirect to index
  header("location:index.php");
  die();
}

?>
