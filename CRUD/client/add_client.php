<?php 
include_once('../../backend/database/database.php');
$title="Add";
$nom ="";
$prenom ="";
$dDN ="";
$aE ="";
$codeWilaya ="";
$etat ="";
$prix ="";
$transsmission ="";
$fuel ="";
$btn_title="Save";
if(isset($_GET['action']) && $_GET['action']=='edit'){
    
    $id=$_GET['id'];
    $sql="SELECT * FROM voiture WHERE idVoiture = ".$id;
    $car=$db->prepare($sql);
    $car->execute();
    if($car){
       $title="Update" ;
       $current_car=$car->fetch();
       $numeroSequence=$current_car['numeroSequence'];
       $marque=$current_car['marque'];
       $type=$current_car['type'];
       $anne=$current_car['anne'];
       $codeWilaya=$current_car['codeWilaya'];
       $etat=$current_car['etat'];
       $prix=$current_car['prix'];
       $transsmission=$current_car['transsmission'];
       $fuel=$current_car['fuel'];
       $btn_title="Update";

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Cars App</title>
</head>

<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2><?php echo $title; ?> Client</h2>
                <div><a href="../../frontend/website/AdminPage/carPage/car.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="../../frontend/website/AdminPage/carPage/car.php" method="post" >
                <div class="mb-3">
                    <label class="form-label">nom</label>
                    <input type="text" class="form-control" value="<?php echo $numeroSequence; ?>"
                    name="numeroSequence"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">marque</label>
                    <input type="text" class="form-control"  value="<?php echo $marque; ?>"
                      name="marque"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">type</label>
                    <input type="tel" class="form-control"  value="<?php echo $type; ?>"
                     name="type"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">anne</label>
                    <input type="year" class="form-control"  value="<?php echo $anne; ?>"
                     name="anne"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">codeWilaya</label>
                    <input type="number" class="form-control"  value="<?php echo $codeWilaya; ?>"
                     name="codeWilaya"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">etat</label>
                    <input type="text" class="form-control"  value="<?php echo $etat; ?>"
                     name="etat"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">prix</label>
                    <input type="number" class="form-control"  value="<?php echo $prix; ?>"
                     name="prix"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">transsmission</label>
                    <input type="text" class="form-control"  value="<?php echo $transsmission; ?>"
                     name="transsmission"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">fuel</label>
                    <input type="text" class="form-control"  value="<?php echo $fuel; ?>"
                     name="fuel"
                    autocomplete="false">
                </div>
                <?php 
                
                if (isset($_GET['id'])){?>


                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">


             <?php   }
                
                ?>
                <input type="submit" class="btn btn-primary" value="<?php echo $btn_title; ?>" name="save">
            </form>
        </div>

    </div>

    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/js/icons.js"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>