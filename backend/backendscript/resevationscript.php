<?php
 if(!isset($_SESSION))
 session_start();
include '../database/database.php';
function genererChaineAleatoire($longueur) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres) - 1;
    $chaine = '';
  
    for ($i = 0; $i < $longueur; $i++) {
      $chaine .= $caracteres[random_int(0, $longueurMax)];
    }
  
    return $chaine;
  }
  
$chaine = genererChaineAleatoire(7);

if(isset($_POST['submit'])){
    $dateDeDepart=$_POST['pick_up_date'];
    $dateDeRetour=$_POST['drop_off_date'];
    $pickUpTime=$_POST['pick_up_time'];
    $dropOffTime=$_POST['drop_off_time'];
    $idClient=$_SESSION['idClient'];
    $idVoiture=$_GET['brand'];
    
            $sqlQuery=<<<Query
            INSERT INTO `reservation`(`idReservation`, `dateDeDepart`, `dateDeRetour`, `idClient`, `idVoiture`,heure_de_depot,`heure_de_prise_en_charge`)
                                VALUES ('$chaine','$dateDeDepart','$dateDeRetour','$idClient','$idVoiture',' $dropOffTime','$pickUpTime');
            Query;
            $sql=$db->prepare($sqlQuery);
            $sql->execute();
            $sqlQuery=<<<Query
            SELECT idVoiture FROM voiture WHERE idVoiture IN (SELECT idVoiture FROM reservation  )
            Query;
            $sql=$db->prepare($sqlQuery);
            $sql->execute();
            if ($sql->rowCount()){
              $sqlQuery=<<<Query
              UPDATE `voiture` SET etat='non-disponible'WHERE `idVoiture`='$idVoiture' ;
              Query;
              $sql=$db->prepare($sqlQuery);
              $sql->execute();
            }
            $_COOKIE=null;
            $sqlQuery=<<<Query
            INSERT INTO `contrat`(`dateDebut`, `dateFin`, `statutContrat`,`idReservation`)
                                VALUES ('$dateDeDepart','$dateDeRetour','Checking','$chaine');
            Query;
            $sql=$db->prepare($sqlQuery);
            $sql->execute();
            $script=<<<script
            <script>
            
            window.location.href='../../frontend/website/bookingList/bookingList.php'
            </script>
            script;
            echo $script;

    
}
?>