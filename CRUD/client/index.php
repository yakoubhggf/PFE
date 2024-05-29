<?php


$action = false;
if (isset($_GET['action']) && $_GET['action'] == 'del') {
  echo "yakoub";
  $id = $_GET['id'];
  $del_sql ="DELETE FROM contrat WHERE idReservation IN (SELECT idReservation FROM reservation WHERE idClient='$id')";
  $res_del=$db->prepare($del_sql);
  $res_del->execute();
  $del_sql = "UPDATE voiture SET etat='disponible' WHERE voiture.idVoiture IN (SELECT idVoiture FROM reservation ) AND voiture.idVoiture=(SELECT idVoiture FROM reservation WHERE reservation.idClient='$id') ";
  $res_del=$db->prepare($del_sql);
  $res_del->execute();
  $del_sql ="DELETE FROM reservation WHERE idClient='$id'";
  $res_del=$db->prepare($del_sql);
  $res_del->execute();
  $del_sql = "DELETE FROM client WHERE idClient = $id";
  $res_del=$db->prepare($del_sql);
  $res_del->execute();

    $action = "del";
  
}
$client_sql = "SELECT * FROM client";
$all_client=$db->prepare($client_sql);
$all_client->execute();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users App</title>
</head>

<body>
  <div class="">
    <div class="wrapper">
      <div class="d-flex  justify-content-between mb-2">
        <h2>All Client</h2>
      </div>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">idClient</th>
            <th scope="col">nom</th>
            <th scope="col">prenom</th>
            <th scope="col">dDN</th>
            <th scope="col">aE</th>
            <th scope="col">nT</th>
            <th scope="col">Vill</th>
            <th scope="col">Rue</th>
            <th scope="col">cP</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($client = $all_client->fetch()) { ?>

            <tr>

              <td>
                <?php echo $client['idClient']; ?>
              </td>
              <td>
                <?php echo $client['nom']; ?>
              </td>
              <td>
                <?php echo $client['prenom']; ?>
              </td>
              <td >
                <?php echo $client['dateDeNaissance']; ?>
              </td><td>
                <?php echo $client['adressEmail']; ?>
              </td><td>
                <?php echo "0".$client['numeroDeTelphone']; ?>
              </td><td>
                <?php echo $client['Vill']; ?>
              </td>
              <td>
                <?php echo $client['rue']; ?>
              </td>
              <td>
                <?php echo $client['codepostal']; ?>
              </td>
              

              <td>
                <div class="d-flex p-2 justify-content-evenly mb-2">

                  <i onclick="confirm_delete(<?php echo $client['idClient']; ?>);" class="text-danger" data-feather="trash-2"></i>
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
  
  
</body>

</html>