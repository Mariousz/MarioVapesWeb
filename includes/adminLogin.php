<?php

if (isset($_POST["submit"])) {

  // First we get the form data from the URL
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  // Then we run a bunch of error handlers to catch any user mistakes
  

  require_once "config.php";
  require_once 'adminFunctions.php';

  // Left inputs empty
  if (emptyInputLogin($email, $pwd) === true) {
    header("location: ../adminLogin.php?error=emptyinput");
		exit();
  }

  // If we get to here, it means there are no user errors

  // Now we insert the user into the database
  loginAdmin($conn, $email, $pwd);

} else {
	header("location: ../adminLogin.php");
    exit();
}
