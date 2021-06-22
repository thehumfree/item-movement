<?php 
    $user = $_SESSION["fname"]." ". $_SESSION["lname"];
    $activePage = basename($_SERVER['PHP_SELF'], ".php"); 
 ?>
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
      <li class="nav-item <?= ($activePage == 'register_item') ? 'active' : '' ?>">
        <a class="nav-link" href="./register_item.php">Create Item</a>
      </li>
      <li class="nav-item <?= ($activePage == 'editPage') ? 'active' : '' ?>">
        <a class="nav-link" href="./editPage.php">Alter Item</a>
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