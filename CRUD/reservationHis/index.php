<?php

$res_sql = "SELECT * FROM reservation WHERE EXISTS(SELECT * FROM contrat WHERE reservation.idReservation=contrat.idReservation AND contrat.statutContrat!='Checking')";
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
            <th scope="col">statut</th>
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
                <?php echo $res['idClient']; ?>
              </td><td>
                <?php echo $res['idVoiture']; ?>
              </td>
              <td>
                <?php echo $res['heure_de_prise_en_charge']; ?>
              </td>
              <td>
                <?php echo $res['heure_de_depot']; ?>
              </td>
              <td>
              <?php 
              global $result;


$sqlQuery="SELECT statutContrat FROM contrat WHERE EXISTS(SELECT * FROM reservation WHERE reservation.idReservation=contrat.idReservation AND reservation.idReservation='{$res['idReservation']}' )";
$sql=$db->prepare($sqlQuery);
$sql->execute();
$hggf=$sql->fetchColumn();
  if ($hggf== 'EnCours') {
    ?>
      
        
        <button class='btn btn-warning color-light'>EnCours</button>
      
    <?php
  } else {
    
    ?>
      
        
        <button class='btn btn-danger'>
          <?php global $hggf; echo $hggf ?>
        </button>
      
    <?php
    }?>
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

 
  <script>
    function func(id){
    window.location.href='../bookingView/bookingView.php?id='+id;
  }
  </script>
</body>

</html>