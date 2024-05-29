<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../menuBar/menubar.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      
    <title>Home</title>
    <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>
  </head>
  <body>
    <?php if (empty($_SESSION['adressEmail'])):?>
    <nav class="navbar navbar-expand-md
    shadow p-3 mb-5 bg-body-tertiary rounded ">
      <div class="container ">
        <a class="navbar-brand" href="#">AgenceX</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav ms-auto w-50 mb-lg-0 d-flex justify-content-around"
          >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../homePage/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../getCarPage/getCar.php">Get Car</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../ContactUs/ContactUs.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../loginPage/login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php else:?>
      <nav class="navbar navbar-expand-md
    shadow p-3 mb-5 bg-body-tertiary rounded">
      <div class="container">
        <a class="navbar-brand" href="#">AgenceX</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav ms-auto w-50 mb-lg-0 d-flex justify-content-around"
          >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../homePage/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../getCarPage/getCar.php">Get Car</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../ContactUs/ContactUs.php">Contact Us</a>
            </li>

            <li class="nav-item">
            <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle d-flex justify-content-center align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    >
                      <i>
                        <span class='material-symbols-outlined'>
                        person
                        </span>
                      </i>
                      <small >
                        Profile
                      </small>
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../bookingList/bookingList.php">My Booking Car</a></li>
                      <li><a class="dropdown-item" href="../../../backend/backendscript/logOutScript.php" type='sumbit'>Log Out</a></li>
                    </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php endif ?>
  </body>
</html>
