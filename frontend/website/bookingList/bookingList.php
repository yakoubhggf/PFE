<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"  />
    <script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='../bookingList/booking.css'>
    <title>Booking List</title>
</head>
<body>
    <?php 
        include_once '../menuBar/menubar.php'
    ?>
    <main style='box-shadow:rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;' class='container border rounded mb-5'>
    <?php 
            
             include_once '../../../backend/database/database.php';
             
             $sqlQuery=<<<Query
             SELECT voiture.marque ,reservation.idReservation,reservation.dateDeDepart,reservation.dateDeRetour 
             FROM voiture,reservation,client 
             WHERE voiture.idVoiture=reservation.idVoiture AND client.idClient=reservation.idClient AND client.idClient='{$_SESSION['idClient']}'
             Query;
             $sql=$db->prepare($sqlQuery);
             $sql->execute();
             if($sql->rowCount()){
                 $valuee=$sql->fetchAll(PDO::FETCH_ASSOC);
                 
                 foreach($valuee as $value){
               ?>      
                        <div class="reservation-client mb-3">
            <div class='car-image '>
                <img src="../imageOfCars/<?php echo $value['marque'] ?>/clio1.jpg" class='w-100 border' alt="">
            </div>
    <div class='reservation-info card '>
        <div class="card-body">
                <div class='card-text border-bottom mb-2'>
                <p class='m-0'>
                        <small>idReservation: <strong class='PickUpTime'><?php  echo $value['idReservation']?></strong></small>
                    </p>
                    <p class='m-0'>
                        <small>PickUpTime: <strong class='PickUpTime'><?php echo $value['dateDeDepart'] ?></strong></small>
                    </p>
                    <p class='m-0'>
                        <small>EndUpTime: <strong class='EndUpTime'><?php echo $value['dateDeRetour']?></strong></small>
                    </p>
                </div>
                <div
                class="reservation-status d-flex justify-content-between align-items-center mb-1"
              >
              <?php
global $value;
$sqlQuery="SELECT statutContrat FROM contrat WHERE EXISTS(SELECT * FROM reservation WHERE reservation.idReservation=contrat.idReservation AND reservation.idReservation='{$value['idReservation']}' )";
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



        
              <a href="../reservationInformation/reservationInformation.php?id=<?php echo $value['idReservation'] ?>" style='align-self:end'><button class='btn btn-primary ' >View</button></a>
              </div>
        </div>
    </div>
            </div>

                <?php  }?>
            <?php }?>


            
         
    
    </main>
    <?php 
        include '../footer/footer.php'
    ?>
    
</body>

</html>