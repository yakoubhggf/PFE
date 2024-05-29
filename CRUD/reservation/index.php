<?php


$action = false;
if (isset($_POST['save'])) {
  
  $dateDeDepart = $_POST['dateDeDepart'];
  $dateDeRetour = $_POST['dateDeRetour'];
  $statut	 = $_POST['statut'];
  $idVoiture = $_POST['idVoiture'];
  $heure_de_prise_en_charge = $_POST['heure_de_prise_en_charge'];
  $heure_de_depot = $_POST['heure_de_depot'];
  if ($_POST['save'] == "Save") {
    $save_sql = "INSERT INTO `reservation`( `dateDeDepart`, `dateDeRetour`, `statut`, `idVoiture`, `heure_de_prise_en_charge`, `heure_de_depot`)
    VALUES  ('$dateDeDepart','$dateDeRetour','$statut','$idVoiture','$heure_de_prise_en_charge','$heure_de_depot')";
  }else{
    $id= $_POST['id'] ;
    $save_sql = <<<sql
    UPDATE `reservation` SET `dateDeDepart`="$dateDeDepart",`dateDeRetour`="$dateDeRetour",`statut`='$statut',
    `idVoiture`='$idVoiture',`heure_de_prise_en_charge`='$heure_de_prise_en_charge',`heure_de_depot`='$heure_de_depot' WHERE idReservation='$id'
    sql;
    }
  

  $res_save=$db->prepare($save_sql);
  $res_save->execute();
    if (isset($_POST['id'])){
      $action = "edit";
    }else{
      $action = "add";
    }



}
if (isset($_GET['action']) && $_GET['action'] == 'del') {
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

  $action = "del";
  
}
$res_sql = "SELECT * FROM reservation WHERE NOT EXISTS (SELECT * FROM contrat WHERE contrat.idReservation=reservation.idReservation AND contrat.statutContrat='EnCours')";
$all_res=$db->prepare($res_sql);
$all_res->execute();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation App</title>
</head>

<body>
  <div class="">
    <div class="wrapper">
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">idReservation</th>
            <th scope="col">dateDeDepart</th>
            <th scope="col">dateDeRetour</th>
            <th scope="col">statut</th>
            <th scope="col">idClient</th>
            <th scope="col">idVoiture</th>
            <th scope="col">HP</th>
            <th scope="col">HD</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($res = $all_res->fetch()) { ?>

            <tr>

              <td>
                <?php echo $res['idReservation']; ?>
              </td>
              <td>
                <?php echo $res['dateDeDepart']; ?>
              </td>
              <td>
                <?php echo $res['dateDeRetour']; ?>
              </td><td>
                <?php echo $res['statut']; ?>
              </td><td>

                <?php 
                $sqlQ="SELECT nom FROM client WHERE EXISTS (SELECT * FROM reservation WHERE reservation.idClient=client.idClient AND reservation.idReservation='{$res['idReservation']}')";
                $sql=$db->prepare($sqlQ);
                $sql->execute();
                echo $sql->fetchColumn() ?>
              </td><td>
                 
                <?php
                  
                 echo $res['idVoiture']; ?>
              </td>
              <td>
                <?php echo $res['heure_de_prise_en_charge']; ?>
              </td>
              <td>
                <?php echo $res['heure_de_depot']; ?>
              </td>
              <td>
                <button class='btn btn-primary' onclick="func('<?php echo $res['idReservation'] ?>')">
                    View
                </button>
              </td>
              <td>
                <div class="d-flex p-2 justify-content-evenly mb-2">

                  <i onclick="confirm_delete('<?php echo $res['idReservation']; ?>');" class="text-danger" data-feather="trash-2"></i>
                  <i onclick="edit('<?php echo $res['idReservation']; ?>');" class="text-success" data-feather="edit"></i>
                </div>
              </td>

            </tr>
          <?php }

          ?>

        </tbody>
      </table>
    </div>

  </div>
            
  <?php
  if ($action != false) {
    if ($action == 'add') { ?>
      <script>
        show_add()
      </script>


      <?php
    }
    if ($action == 'del') { ?>
      <script>
        show_del()
      </script>


      <?php
    }
    if ($action == 'edit') { ?>
      <script>
        show_update()
      </script>


      <?php
    }
  }
  ?>
  <script>
  function func(id){
    window.location.href='../bookingView/bookingView.php?id='+id;
  }
  </script>
  
</body>
</html>