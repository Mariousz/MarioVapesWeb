<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sign in page for Mario Vapes">
    <meta name="author" content="Mariusz">

    <title>Sign Up Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/signin.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    body{
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #03a9f4;
      background-image: url("../images/Clouds.png");
      background-repeat: repeat;
    }
    form {
      padding: 10px;
    }
    p{
      color: red;
      font-size: 25;
    }


</style>


</head>
<body>
  <div class="text-center">
    <section class="form-signin">
      <div class= "card"  >
        <img class="mb-4" src="../images/Logo1.png"  alt="Mario Vapes Logo"  width="auto" height="auto" >
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
          <input type="text" class="form-control" name="name" placeholder="Name...">
          <br>
          <input type="text" class="form-control" name="surname" placeholder="Surname...">
          <br>
          <input type="text" class="form-control" name="contact" placeholder="Contact number...">
          <br>
          <input type="text" class="form-control" name="email" placeholder="Email...">
          <br>
          <input type="password" class="form-control" name="pwd" placeholder="Password...">
          <br>
          <input type="password" class="form-control" name="pwdrepeat" placeholder="Repeat password...">
          <br>
          <button type="submit" class="btn btn-lg btn-primary btn-bg" name="submit">Sign up</button>
        </form>

      <?php
        // Error messages
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
          }
          else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
          }
          else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords doesn't match!</p>";
          }
          else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong!</p>";
          }
          else if ($_GET["error"] == "emailtaken") {
            echo "<p>Email already in use!</p>";
          }
          else if ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
          }
        }
      ?>
      <a class="hm-ic" href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/> <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg>
        <h4> Home Page </h4>
      </a>
    </section>
  </div>
</body>
