<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../InscriptionPage/Inscription.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"  />
    <title>Inscription Page</title>
</head>
<body>
<?php
                include_once "../menuBar/menubar.php"
                ?>
                
<main id="inscription" class="container ms-auto me-auto mb-5">
  <div class="card"style="
    max-height: fit-content;
">
    <div class="card-header text-center">inscription</div>
      <div class="card-body">
      <form class="row g-3" action='../../../backend/backendscript/inscriptionscript.php' method='Post'>
            <div class="col-md-6">
              <label for="firstname" class="form-label">First name</label>
              <input name='firstname' type="text" class="form-control" id="firstname"  required>
            </div>
            <div class="col-md-6">
              <label for="lastname" class="form-label">Last name</label>
              <input  name='lastname' type="text" class="form-control" id="lastname" required>
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input  name='email' type="Email" class="form-control" id="email" required>
            </div>

            <div class="col-md-6 position-relative">
              <label for="password" class="form-label">Password</label>
              <i onclick='func()'><span class="material-symbols-outlined "
                          style="position: absolute;left: 90%; top: 57%; cursor: pointer;">
                          visibility
                          </span></i>
              <input  name='motdepasse' type="password" class="form-control" id="password" required>
            </div>

            <div class="col-md-6">
              <label for="birthday" class="form-label">Birth date</label>
              <input name='year' type="date" class="form-control" id="birthday" required>
            </div>
            <div class="col-md-6">
              <label for="phonenumber" class="form-label">Phone number</label>
              <input name='phonenumber' type="tel" class="form-control" id="phonenumber" required>
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">City</label>
              <select name='city' id="algerian_states" class='form-control' required>
                  <option>
                      Select City
                  </option>
            <option value="Adrar">Adrar</option>
            <option value="Chlef">Chlef</option>
            <option value="Laghouat">Laghouat</option>
            <option value="Oum El Bouaghi">Oum El Bouaghi</option>
            <option value="Batna">Batna</option>
            <option value="Béjaïa">Béjaïa</option>
            <option value="Biskra">Biskra</option>
            <option value="Béchar">Béchar</option>
            <option value="Blida">Blida</option>
            <option value="Bouira">Bouira</option>
            <option value="Tamanrasset">Tamanrasset</option>
            <option value="Tébessa">Tébessa</option>
            <option value="Tlemcen">Tlemcen</option>
            <option value="Tiaret">Tiaret</option>
            <option value="Tizi Ouzou">Tizi Ouzou</option>
            <option value="Algiers">Algiers</option>
            <option value="Djelfa">Djelfa</option>
            <option value="Jijel">Jijel</option>
            <option value="Sétif">Sétif</option>
            <option value="Saïda">Saïda</option>
            <option value="Skikda">Skikda</option>
            <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
            <option value="Annaba">Annaba</option>
            <option value="Guelma">Guelma</option>
            <option value="Constantine">Constantine</option>
            <option value="Médéa">Médéa</option>
            <option value="Mostaganem">Mostaganem</option>
            <option value="M'Sila">M'Sila</option>
            <option value="Mascara">Mascara</option>
            <option value="Ouargla">Ouargla</option>
            <option value="Oran">Oran</option>
            <option value="El Bayadh">El Bayadh</option>
            <option value="Illizi">Illizi</option>
            <option value="Bordj Bou Arréridj">Bordj Bou Arréridj</option>
            <option value="Boumerdès">Boumerdès</option>
            <option value="El Tarf">El Tarf</option>
            <option value="Tindouf">Tindouf</option>
            <option value="Tissemsilt">Tissemsilt</option>
            <option value="El Oued">El Oued</option>
            <option value="Khenchela">Khenchela</option>
            <option value="Souk Ahras">Souk Ahras</option>
            <option value="Tipaza">Tipaza</option>
            <option value="Mila">Mila</option>
            <option value="Aïn Defla">Aïn Defla</option>
            <option value="Naâma">Naâma</option>
            <option value="Aïn Témouchent">Aïn Témouchent</option>
            <option value="Ghardaïa">Ghardaïa</option>
            <option value="Relizane">Relizane</option>
          </select>
            </div>
            <div class="col-md-3">
              <label for="state" class="form-label">State</label>
              <input name='state' type="text" class="form-control" id="state" required>
            </div>
            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input name='zip' type="text" class="form-control" id="zip" required>
            </div>
            <div class='col-12'>
                      <p style='margin:0;'> 
                      <small>
                        Do you already have an account? 
                        <a href="../loginPage/login.php">
                        Login in
                        </a>
                      </small>
                      </p>
              </div>
            <div class="col-12">
              <button name='inscription' class="btn btn-primary" type="submit" value='envoyer'>Submit</button>
            </div>
      </div>
    </form>
      </div>
    </div>
  </div>
    </main>
    <?php 
        include '../footer/footer.php'
    ?>
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
</body>

</html>