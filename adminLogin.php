<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="css\signin.css" rel="stylesheet">
<style>
body{
background-color: #03a9f4;
background-image: url("../images/Clouds.png");
background-repeat: repeat;
}
</style>

  <body class="text-center">
    <section class="form-signin">
      <div class= "card"  >

        <img class="mb-4" src="../images/Logo1.png"  alt="Mario Vapes Logo"  width="auto" height="auto" >
        <h2>Admin Log In</h2>
        <form action="includes/adminLogin.php" method="post">
          <input type="text" class="form-control" name="email" placeholder="Email...">
          <br>
          <input type="password" class="form-control" name="pwd" placeholder="Password...">
          <br>
          <button type="submit" class="btn btn-lg btn-primary btn-bg" name="submit">Sign In</button>
        </form>

      <?php
        // Error messages
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
          }
          else if ($_GET["error"] == "wronglogin") {
            echo "<p>Wrong login!</p>";
          }
        }
      ?>

   <a class="hm-ic" href="index.php">
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/> <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
     </svg>
     <p> Home Page </p>
   </a>
   </section>
  </div>
 </body>
