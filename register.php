
<?php session_start();
    //importing function file
    include_once("admin/includes/functions.php");
    //register a user 
    if(isset($_POST["register"])){
        registerUser($_POST["fname"], $_POST["lname"], $_POST["emailadd"], $_POST["passwrd"], $_POST["role"]);
    }

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
  <h1 class="h3 mb-3 font-weight-normal">Create Account</h1>
  <label for="Fname" class="sr-only">First Name</label>
  <input type="text" id="Fname" class="form-control" placeholder="First Name"  name="fname" required>
    <label for="Lname" class="sr-only">Last Name</label>
  <input type="text" id="Lname" class="form-control" placeholder="Last Name"  name="lname" required>
    <label for="Email" class="sr-only">Email Address</label>
  <input type="email" id="Email" class="form-control" placeholder="Email Address"  name="emailadd" required>
  <label for="passwrd" class="sr-only">Password</label>
  <input type="password" id="passwrd" class="form-control" placeholder="Password"  name="passwrd" required>
    <label for="rPasswrd" class="sr-only">Retype Password</label>
  <input type="password" id="rPassword" class="form-control" placeholder="Repeat Password"  name="rpasswrd" required>
        <input type="text"  class="form-control" name="role" value="Admin" hidden>
  <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="return Validate()" name="register">Create Account</button>
    <div class="text-center">
    <a class="small" href="./login.php">Already have an account? Login!</a>
</div>
</form>
<script>
    function Validate(){
        var pass = document.getElementById("passwrd").value;
        var conpass = document.getElementById("rPassword").value;
        if(pass != conpass){
            alert("Password doesnt match!!");
            return false;
        }
        return true;
    }
</script>
</body>
</html>
