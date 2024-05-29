<?php


$action = false;
if (isset($_POST['save'])) {
  
  $numeroSequence = $_POST['numeroSequence'];
  $marque = $_POST['marque'];
  $type = $_POST['type'];
  $anne = $_POST['anne'];
  $codeWilaya = $_POST['codeWilaya'];
  $etat = $_POST['etat'];
  $prix = $_POST['prix'];
  $transsmission = $_POST['transsmission'];
  $fuel = $_POST['fuel'];
  if ($_POST['save'] == "Save") {
    $save_sql = "INSERT INTO `voiture`(`numeroSequence`, `marque`, `type`, `anne`, `codeWilaya`, `etat`, `prix`, `transsmission`, `fuel`)
    VALUES ('$numeroSequence','$marque','$type','$anne','$codeWilaya','$etat','$prix','$transsmission','$fuel')";
  }else{
    $id= $_POST['id'] ;
    $save_sql = <<<sql
     UPDATE `voiture` SET `numeroSequence`='$numeroSequence',`marque`='$marque',`type`='$type',`anne`='$anne',`codeWilaya`='$codeWilaya',
    `etat`='$etat',`prix`='$prix',`transsmission`='$transsmission',`fuel`='$fuel' WHERE idVoiture ='$id'
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
  $del_sql = "DELETE FROM voiture WHERE idVoiture = $id";
  $res_del=$db->prepare($del_sql);
  $res_del->execute();

    $action = "del";
  
}
$voiture_sql = "SELECT * FROM voiture";
$all_cars=$db->prepare($voiture_sql);
$all_cars->execute();


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
        <h2>All Cars</h2>
        <div><a href="../../../../CRUD/car/add_car.php"><i data-feather="plus-circle"></i></a></div>

      </div>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">idVoiture</th>
            <th scope="col">numeroSequence</th>
            <th scope="col">marque</th>
            <th scope="col">Mobile</th>
            <th scope="col">anne</th>
            <th scope="col">codeWilaya</th>
            <th scope="col">etat</th>
            <th scope="col">prix</th>
            <th scope="col">transsmission</th>
            <th scope="col">fuel</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($car = $all_cars->fetch()) { ?>

            <tr>

              <td>
                <?php echo $car['idVoiture']; ?>
              </td>
              <td>
                <?php echo $car['numeroSequence']; ?>
              </td>
              <td>
                <?php echo $car['marque']; ?>
              </td><td>
                <?php echo $car['type']; ?>
              </td><td>
                <?php echo $car['anne']; ?>
              </td><td>
                <?php echo $car['codeWilaya']; ?>
              </td><td>
                <?php echo $car['etat']; ?>
              </td>
              <td>
                <?php echo $car['prix']; ?>
              </td>
              <td>
                <?php echo $car['transsmission']; ?>
              </td>
              <td>
                <?php echo $car['fuel']; ?>
              </td>

              <td>
                <div class="d-flex p-2 justify-content-evenly mb-2">

                  <i onclick="confirm_delete(<?php echo $car['idVoiture']; ?>);" class="text-danger" data-feather="trash-2"></i>
                  <i onclick="edit(<?php echo $car['idVoiture']; ?>);" class="text-success" data-feather="edit"></i>
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