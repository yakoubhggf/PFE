<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../loginPage/login.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"  />
    
    <title>Login</title>
  </head>
  <body>
  <?php
                include_once "../menuBar/menubar.php"
                ?>
    <main id="Login" class="container ms-auto me-auto mb-5">
      <div class="card">
        <div class="card-header text-center">Login Formulaire</div>
        <div class="card-body">
          <form action="../../../backend/backendscript/loginscript.php" method='post'>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >Email address</label
              >
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                name='email'
              />
              <div id="emailHelp" class="form-text">
                We'll never share your email with anyone else.
              </div>
            </div>
            <div class="mb-3" style="position: relative;">
              <label for="password" class="form-label"
                >Password</label
              >
              <i onclick='func()'><span class="material-symbols-outlined "
                style="position: absolute;left: 90%; top: 57%; cursor: pointer;">
                visibility
                </span></i>
              <input
                type="password"
                class="form-control "
                id="password"
                name='motdepasse'
                
              />
            </div>
            <div>
            <p>
            <small>
              Don't have an account? 
              <a href="../InscriptionPage/inscription.php">
              Create One
              </a>
            </small>
            </p>
            </div>
            <button type="submit" class="btn btn-primary" name='login' value='login' >Submit</button>
          </form>
        </div>
      </div>
    </main>
    <?php 
        include '../footer/footer.php'
    ?>
  </body>
  <script>
      function func(){
          if(document.getElementById('password').type=='password'){
            document.getElementsByTagName('span')[1].textContent='visibility_off';
            document.getElementById('password').type='text';
          }
          else{
            document.getElementsByTagName('span')[1].textContent='visibility';
            document.getElementById('password').type='password';
          }
      }
  </script>
  <script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
