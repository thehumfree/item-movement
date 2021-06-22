
<?php session_start();
    //including the database file
    include("admin/includes/db.php");
    //including the function files 
    include("admin/includes/functions.php");
    //login system validation
    if(isset($_POST["login"])){
        login($_POST["email"],$_POST["passwrd"]);
    }//end of login system

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/hubspot.ico" />
  </head>
  <body class="text-center">
    <form class="form-signin" action="" method="post">
  <img class="mb-4" src="images/hubspot.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="passwrd" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
    <div class="text-center">
    <a class="small" href="./register.php">Dont have an account? Sign up!</a>
</div>
</form>

</body>
</html>
