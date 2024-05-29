<?php 

    include '../database/database.php';
    $id = $_GET['id'];
    $del_sql ="DELETE FROM contrat WHERE  idReservation ='$id'";
    $res_del=$db->prepare($del_sql);
    $res_del->execute();
    $del_sql = "UPDATE voiture SET etat='disponible' WHERE voiture.idVoiture IN (SELECT idVoiture FROM reservation ) AND voiture.idVoiture=(SELECT idVoiture FROM reservation WHERE reservation.idReservation='$id') ";
    $res_del=$db->prepare($del_sql);
    $res_del->execute();
    $del_sql = "DELETE FROM reservation WHERE idReservation = '$id'";
    $res_del=$db->prepare($del_sql);
    $res_del->execute();
    $script=<<<Script
    <script>
    window.location.href='../../frontend/website/BookingList/BookingList.php';
    </script>
Script;
echo $script;


?>