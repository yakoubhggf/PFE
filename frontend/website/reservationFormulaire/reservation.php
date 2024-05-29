<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

            
    


    
include_once "../../../backend/database/database.php";
  $sqlQuery=<<<Query
  SELECT * FROM voiture WHERE marque='{$_GET['marque']}'
  Query;
  $sql=$db->prepare($sqlQuery);
  $sql->execute();
  $result=$sql->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation</title>
</head>
<body>
    <link rel="stylesheet" href="../reservationFormulaire/reservation.css"  />  
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"  />
    
</body>
<?php 
    include '../menuBar/menubar.php'
    ?>
    <form class='container mb-5' style='display: grid;
    grid-template-columns: 1fr 400px;
    padding-top: 10px;
    column-gap: 10px;'method='post' action='../../../backend/backendscript/resevationscript.php?brand=<?php echo $result['idVoiture']?>'>
       
        <article class='payment'>
        <div class="card mb-3">
    <div class="card-header text-center">Informations sur le Client</div>
      <div class="card-body">
      <div class="row g-3">
            <div class="col-md-6">
              <label for="validationDefault01" class="form-label">First name</label>
              <input name='firstname' value=<?php echo $_SESSION['nom']?> type="text" class="form-control" id="validationDefault01"  >
            </div>
            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Last name</label>
              <input  name='lastname' value=<?php echo $_SESSION['prenom']?> type="text" class="form-control" id="validationDefault02" >
            </div>

            <div class="col-md-6">
              <label for="validationDefault02" class="form-label">Email</label>
              <input  name='email' value=<?php echo $_SESSION['adressEmail']?> type="Email" class="form-control" id="validationDefault02" >
            </div>

            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">Phone number</label>
              <input name='phonenumber' value=<?php echo "0".$_SESSION['numeroDeTelphone']?> type="tel" class="form-control" id="validationDefault03" >
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">City</label>
              <select name='city'  id="algerian_states" class='form-control' >
                  <option>
                  <?php echo $_SESSION['Vill']?>
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
              <label for="validationDefault04" class="form-label">State</label>
              
              <input name='state' value="<?php echo htmlspecialchars($_SESSION['rue'])?>" type="text" class="form-control" id="validationDefault03" >
              
            </div>
            <div class="col-md-3">
              <label for="validationDefault05" class="form-label">Zip</label>
              <input name='zip' value=<?php echo $_SESSION['codepostal']?> type="text" class="form-control" id="validationDefault05" >
            </div>
      </div>
</div>
      </div>
    </div>
  </div>
  <div class="card mb-5">
    
      <div class="card-body">
      <div class="row g-3">
          <h3 class='col-md-12 card-title' style='font-size:18px'>
          Comment souhaitez-vous payer ?
          </h3>
          <div class="card-text">
              
<a style='cursor:pointer'><img alt="Credit Card Logos" title="Credit Card Logos" src="https://www.shift4shop.com/images/credit-card-logos/cc-sm-5.png" width="249" height="28" border="0" /></a>

          </div>
            <div class="col-md-12 ">
              <label for="validationDefault01" class="form-label">Nom du titulaire de la carte</label>
              <input name='firstname' type="text" class="form-control" id="validationDefault01"  >
            </div>

            <div class="col-md-12">
              <label for="validationDefault02" class="form-label">Numéro de carte</label>
              <input  name='num' type="Email" class="form-control" id="validationDefault02" >
            </div>

            <div class="col-md-5">
              <label for="validationDefault02" class="form-label">Date d'expiration</label>
              <input 
    type="text"
    pattern="(?:0[1-9]|1[0-2])/[0-9]{2}"
    title="Enter a date in this format MM/YY"
    class='form-control'
    
  />
            </div>

            <div class="col-md-5">
              <label for="validationDefault02" class="form-label">CVC</label>
              <input  name='email' type="Email" class="form-control" id="validationDefault02" >
            </div>            

        
      </div>
</div>
      </div>
    </div>
  </div>
        </article>
        <section id='booking-formulaire' class='border card' style='height:340px;position:sticky;top:10px'>
            <div class="card-header">
                Booking Details
            </div>
        <div class="card-body">
                <h3 style='font-size:20px' class="card-title border-bottom mb-1">
                <?php echo $result['marque'] ?>
                </h3>
        
            <div class="card-text border-bottom m-1">
                <p class='m-0'>
                    <small>brandType:<strong><?php echo  $result['type'] ?></strong> </small>
                </p>
                <p class='mb-1'>
                    <small>transsmission:<strong><?php echo $result['transsmission'] ?></strong></small>
                </p>
                <p class='mb-1'>
                    <small>fuel:<strong><?php echo $result['fuel'] ?></strong></small>
                </p>
                <p class='m-0'>
                    <small>Model:<strong><?php echo $result['anne'] ?></strong> </small>
                </p>
            </div>
            <div class='card-text border-bottom mb-2'>
                <p class='m-0'>
                    <small>PickUpTime: <strong class='PickUpTime'></strong></small>
                </p>
                <p class='m-0'>
                    <small>EndUpTime: <strong class='EndUpTime'></strong></small>
                </p>
            </div>
            <div class='card-text'>
                <div
                class="total-price d-flex justify-content-between align-items-center mt-3"
              >
                <h3 style='font-size:1rem;'>Total payment</h3>
                <h3 style='font-size:1rem;'>$<strong class='totalpayment'></strong></h3>
              </div>

  <input type="hidden" id="pick_up_time" name="pick_up_time" value="">
  <input type="hidden" id="drop_off_time" name="drop_off_time" value="">
  <input type="hidden" id="pick_up_date" name="pick_up_date" value="">
  <input type="hidden" id="drop_off_date" name="drop_off_date" value="">
  <input type="hidden" id="totaldays" name="totaldays" value="">

              <input style='font-size:1.25rem;' type="submit" name='submit' class="btn btn-primary w-100" value='reserver'>
            </div>
        </div>
        
        </section>
</form>
    <?php 
        include '../footer/footer.php'
    ?>
    
    <script>
        document.querySelector(".PickUpTime").textContent=String(new Date(localStorage.getItem('Pick-up-date'))).slice(0,16);
        document.querySelector(".EndUpTime").textContent=String(new Date(localStorage.getItem('Drop-off-date'))).slice(0,16);
        document.querySelector(".totalpayment").textContent=Number(localStorage.getItem('totaldays'))*Number(<?php echo $result['prix'] ?>);
        document.getElementById('pick_up_time').value = localStorage.getItem('pick-up-time') || '';
        document.getElementById('drop_off_time').value = localStorage.getItem('drop-off-time') || '';
        document.getElementById('pick_up_date').value = localStorage.getItem('Pick-up-date') || '';
        document.getElementById('drop_off_date').value = localStorage.getItem('Drop-off-date') || '';
  
                
        
       
    </script>
   <script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
<?php 
