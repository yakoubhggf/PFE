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
    <link rel="stylesheet" href="../reservationInformation/reservationInformation.css"  />  
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"  />
    
    <title>reservationInformation</title>
</head>
<body>
<?php 
      include_once "../menuBar/menubar.php"
    ?>
    <?php 
         include_once '../../../backend/database/database.php';
         $sqlQuery=<<<Query
         SELECT * FROM voiture INNER JOIN reservation ON
            reservation.idVoiture=voiture.idVoiture Where reservation.idReservation='{$_GET['id']}'
         Query;
         $sql=$db->prepare($sqlQuery);
         $sql->execute();
         $result=$sql->fetch(PDO::FETCH_ASSOC)
    ?>
    <div class='container mb-5' style='display: grid;
                                grid-template-columns: 1fr 400px;
                                padding-top: 10px;
                                column-gap: 10px;'>
                        <section>
                                            <article class='card border mb-5'>
                                            <h4 class='card-header'>
                                            Booking Information
                                            </h4>
                                        <div class="card-body">
                                            <div class="card-text border-bottom mb-3">
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
                                            <div class="card-text border-bottom mb-3">
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
                                            <article class='border mb-5 rounded p-2'>
                                            <div class="car-caractristique row p-1">
                                                <div class="col-12 mb-2">
                                                    <h5>Car Feature / Details</h5>
                                                </div>
                                                <div class="col-12">
                                                    <table class=" table table-striped rounded">
                                                        <tbody>
                                                        <?php 
                                                            $sqlQuery=<<<Query
                                                            SELECT * FROM voiture WHERE EXISTS
                                                            (SELECT * FROM reservation WHERE voiture.idVoiture=reservation.idVoiture AND reservation.idReservation='{$_GET['id']}')
                                                            Query;
                                                            $sql=$db->prepare($sqlQuery);
                                                            $sql->execute();
                                                            $resultt=$sql->fetch(PDO::FETCH_ASSOC);
                                                            
                                                            foreach($resultt as $key =>$value){
                                                                if($key !='prix'){
                                                                    if($key!='idVoiture'){
                                                                        $htmlCode=<<<html
                                                                    <tr>
                                                                     <td>$key</td>
                                                                    <td colspan="3">$value</td>
                                                                     </tr>
                                                                    html;
                                                                    echo $htmlCode;
                                                                    }
                                                                    
                                                                }
               
                                                            }
                                                            
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            </article>
                                            
                                            <div class='annulerLaReservation' >
                                                            <label for="cancel" >Do you want cancel this reservation:</label><br>
                                                            <button type='button' id='cancel' class='btn btn-primary w-25' onclick='func()'>cancel</button>
                                            </div>
                    </section>
                                        <section id='booking-formulaire' class='border card' style='height:300px;position:sticky;top:10px'>
                                                <img src="../imageOfCars/<?php echo $result['marque'] ?>/clio0.jpg" alt="">
                                        </section>
    </div>
    <?php 
        include '../footer/footer.php'
    ?>
    <script>
        function func(){
            let del =confirm('do you want cancele the reservation?');
            console.log(del);
            if(del==true){
                window.location.href=`../../../backend/backendscript/cancledReservation.php?id=<?php echo $result['idReservation'] ?>`;
            }
        }
    </script>
    <script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
