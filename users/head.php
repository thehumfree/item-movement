<?php 
    session_start();
    ob_start();
    include("../admin/includes/db.php");
    include_once("../admin/includes/functions.php");
if(!$_SESSION["id"]){
    header("Location:../login.php");
}else{
   $activePage = basename($_SERVER['PHP_SELF'], ".php"); 
    $user = $_SESSION["fname"]." ". $_SESSION["lname"];
}
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HOOP TELECOMS</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/hubspot.ico" />
    
  <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="../addons/fontawesome-free/css/all.css" />
    <script type="text/javascript" src="../addons/fontawesome-free/js/all.js"></script>
    
    
  <!-- Start of datatable css and javascript -->
    <script type="text/javascript" src="../addons/datatables.js"></script> 
    <link rel="stylesheet" href="../addons/datatables.css" />
  <!-- End datatable css and javascript --> 
    
  <!-- Start of bootstrap css and javascript -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- End of datatable css and javascript -->  
    <!-- Adds the css if page is homepage -->
<link rel="stylesheet" type="text/css" href="<?= ($activePage == 'index') ? '../css/anime.css' : '' ?>" />
 <style>
    
    body{
        
        padding-top: 4.5rem;
        
    }
</style>
 </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="./index.php">Hoop Telecoms</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= ($activePage == 'index') ? 'active' : '' ?>">
        <a class="nav-link" href="./index.php">Home</a>
      </li>
      <li class="nav-item <?= ($activePage == 'preview') ? 'active' : '' ?>">
        <a class="nav-link" href="./preview.php">Database</a>
      </li>
      </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-white small"> <?php echo $user ?></span>
           <img class="img-profile rounded-circle" width="30px" height="30px" src="https://bootdey.com/img/Content/avatar/avatar1.png"> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./profile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
          </a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    <br>