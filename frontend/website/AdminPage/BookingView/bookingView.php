<?php 
 
    session_start();
   
    
    unset($_SESSION['']);
    

include_once('../../../../backend/database/database.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">
    
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    
    <script src="../../../../bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../bookingView/bookingView.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="w-100 ">
            <a href="#" class="border-bottom" ><h2>Car Rental Service</h2></a>
          <ul class=" ms-auto d-flex p-0">
              <li>
              <a href="../../../../backend/backendscript/logOutScript.php" type='submit'><button>
              <i>   
                    <small>Logout out</small>
                    <span class="material-symbols-outlined">
                        Logout
                    </span>
                </i>
                </button>
                </a>
              </li>
              
          </ul>  
        </nav>
    </header>
    <!-- the above code is about admin navigation -->
    <div class="contenu">
        <section class="admin-menu border-right">
            <div>
            <button class="button dashboard" onclick="window.location.href='../dashboard/admin.php';" >
                <i>
                    <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                        house
                    </span>
                </i>
                dashboard
            </button>
        </div>
        <div style='padding-left: 10px;'>
            <small class="title" style="text-transform: uppercase;">manage Booking</small>
        </div>
        <div class="manage-booking">
            <div class="booking">
                    <button class="button booking">
                        <i>
                            <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                                list
                            </span>
                        </i>
                        Booking 
                    </button>
            </div>
            <div class="booking-list" onclick="window.location.href='../bookingHistory/bookinghistory.php'">
                <button class="button booking history">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                            list
                        </span>
                    </i>
                    Booking History
                </button>
            </div>
        </div>
        <div style='padding-left: 10px;'>
            <small class="title" style="text-transform: uppercase;">Manage Service</small>
        </div>
        <div class="manage-car">
            <div class="booking-list">
                <button onclick="window.location.href='../carPage/car.php' " class="button cars">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                            directions_car
                        </span>
                    </i>
                    cars
                </button>
            </div>
        </div>
        <div class="manage-car">
            <div class="booking-list">
                <button onclick="window.location.href='../Client/client.php' " class="button cars">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                        person
                        </span>
                    </i>
                    Client
                </button>
            </div>
        </div>
     </section>
        <section class="admin-operation mt-3" style='width:60% ;margin-right:40px'>
        <?php 
         $sqlQuery=<<<Query
         SELECT * FROM voiture INNER JOIN reservation ON
            reservation.idVoiture=voiture.idVoiture Where reservation.idReservation='{$_GET['id']}'
         Query;
         $sql=$db->prepare($sqlQuery);
         $sql->execute();
         $result=$sql->fetch(PDO::FETCH_ASSOC)
    ?>  

                <article class='card border mt-0 mb-3'>
                <h4 class='card-header'>
                Booking Information
                </h4>
            <div class="card-body">
                <div class="card-text border-bottom mb-3" style='display: flex;
                    justify-content: space-between;
                    align-items: center;'>
                    <div>
                        <p>
                        <small>Booking Id:</small><strong><?php echo $result['idReservation'] ?></strong>
                        </p>
                    </div>
                    <div>
                    <p>
                        <small>Booking date:</small><strong><?php echo $result['dateDeDepart'] ?></strong>
                        </p>
                    </div>
                </div>
                <div class="card-text border-bottom mb-3" style='display: flex;
                justify-content: space-between;
                align-items: center;'>
                <?php  
                    function nombreJours() {
                        global $result;
                        
                        $dateTime1 = new DateTime($result['dateDeDepart']);
                        $dateTime2 = new DateTime($result['dateDeRetour']);
                        
                        $interval = $dateTime1->diff($dateTime2);
                      
                        $nombreJours = $interval->days;
                      
                        return $nombreJours;
                      }

                ?>
                    <div>
                        <p>
                        <small>Start Time:</small><strong><?php echo $result['dateDeDepart']." ".$result['heure_de_prise_en_charge'].":00" ?></strong>
                        </p>
                    </div>
                    <div>
                    <p>
                        <small>End Time:</small><strong id='end-time'><?php echo $result['dateDeRetour']." ".$result['heure_de_depot'].":00" ?></strong>
                        </p>
                    </div>
                </div>
                <div class="card-text border-bottom mb-3">
                    <div>
                        <p>
                        <small>Total Price:</small>$<strong id='payment'><?php echo $result['prix']*nombreJours() ?> </strong>
                        </p>
                    </div>
                </div>
        <div
                        class="reservation-status d-flex justify-content-between align-items-center mb-1"
                    >
                    <div style='align-self:end' class='d-flex flex-column'>
                            <small style='font-size:1rem; ' class='mb-1'>Payment status:</small>
                            <a><button class='btn btn-success ' >Complete</button></a>
                    </div>
                    <?php
global $result;


$sqlQuery="SELECT statutContrat FROM contrat WHERE EXISTS(SELECT * FROM reservation WHERE reservation.idReservation=contrat.idReservation AND reservation.idReservation='{$result['idReservation']}' )";
$sql=$db->prepare($sqlQuery);
$sql->execute();
$hggf=$sql->fetchColumn();
  if ($hggf== 'EnCours') {
    ?>
      <div class='d-flex flex-column'>
        <small style='font-size:1rem;' class='mb-1'>Booking status:</small>
        <button class='btn btn-warning color-light'>EnCours</button>
      </div>
    <?php
  } else {
    
    ?>
      <div class='d-flex flex-column'>
        <small style='font-size:1rem;' class='mb-1'>Booking status:</small>
        <button class='btn btn-danger'>
          <?php global $hggf; echo $hggf ?>
        </button>
      </div>
    <?php
    }?>

    </div>
                
            </div>
            </article>
            <form class='card border mt-0 ' action='bookingView.php' method='GET'>
                <h4 class='card-header'>
                Update
                </h4>
            <div class="card-body row">
                        <div class="col-md-6">
                            <label for="status" >
                            Select the Status
                            </label>
                            <select name="hggf" id="status" class='form-control'>
                            <option resul$result="Checking">Checking</option>
                            <option resul$result="EnCours">EnCours</option>
                            <option resul$result="Terminer">Terminer</option>
                            <option resul$result="Anuller">Anuller</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status" >
                            Select the Payment
                            </label>
                            <select  id="status" class='form-control'>
                            <option >Complete</option>
                            </select>
                        </div>
                        <?php 
                
                if (isset($_GET['id'])){?>


                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">


             <?php   }
                
                ?>
            </div>
                
                      <input type='submit' name='sumbit' value='envoyer' class='btn btn-primary w-25'>
            </form>
        </section>
    </div>
</body>



</html>

<?php

if(isset($_GET['sumbit'])){
    $_SESSION[$_GET['id']]=['bookingStatus'=>$_GET['hggf']];
    $sqlQuery=<<<sql
    UPDATE `contrat` SET statutContrat='{$_GET['hggf']}' WHERE contrat.idReservation='{$_GET['id']}'
sql;
$sql=$db->prepare($sqlQuery);
$sql->execute();
}
    

?>