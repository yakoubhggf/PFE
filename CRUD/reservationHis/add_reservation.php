<?php 
include_once('../../backend/database/database.php');
$title="Add";

$dateDeDepart ="";
$dateDeRetour ="";
$statut ="";
$idVoiture ="";
$heure_de_prise_en_charge ="";
$heure_de_depot ="";
$btn_title="Save";
if(isset($_GET['action']) && $_GET['action']=='edit'){
    
    $id=$_GET['id'];
    $sql="SELECT * FROM reservation WHERE idReservation = '$id' ";
    $res=$db->prepare($sql);
    $res->execute();
    if($res){
       $title="Update" ;
       $current_res=$res->fetch();
       $dateDeDepart=$current_res['dateDeDepart'];
       $dateDeRetour=$current_res['dateDeRetour'];
       $statut=$current_res['statut'];
       $idVoiture=$current_res['idVoiture'];
       $heure_de_prise_en_charge=$current_res['heure_de_prise_en_charge'];
       $heure_de_depot=$current_res['heure_de_depot'];
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
    <title>ress App</title>
</head>

<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2><?php echo $title; ?> reservation</h2>
                <div><a href="../../frontend/website/AdminPage/resPage/res.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="../../frontend/website/AdminPage/resPage/res.php" method="post" >
                <div class="mb-3">
                    <label class="form-label">dateDeDepart</label>
                    
                    <input type="date" class="form-control" value="<?php echo $dateDeDepart; ?>"
                    name="dateDeDepart"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">dateDeRetour</label>
                    <input type="date" class="form-control"  value="<?php echo $dateDeRetour; ?>"
                      name="dateDeRetour"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">idVoiture</label>
                    <input type="number" class="form-control"  value="<?php echo $idVoiture; ?>"
                     name="idVoiture"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">heure_de_prise_en_charge</label>
                    <select  class="form-control"  
                     name="heure_de_prise_en_charge"
                    >
                    <option value="00"><?php echo $heure_de_prise_en_charge.":00"; ?></option>
                <option value="00">00:00</option>
                <option value="01">01:00</option>
                <option value="02">02:00</option>
                <option value="03">03:00</option>
                <option value="04">04:00</option>
                <option value="05">05:00</option>
                <option value="06">06:00</option>
                <option value="07">07:00</option>
                <option value="08">08:00</option>
                <option value="09">09:00</option>
                <option value="10">10:00</option>
                <option value="11">11:00</option>
                <option value="12">12:00</option>
                <option value="13">13:00</option>
                <option value="14">14:00</option>
                <option value="15">15:00</option>
                <option value="16">16:00</option>
                <option value="17">17:00</option>
                <option value="18">18:00</option>
                <option value="19">19:00</option>
                <option value="20">20:00</option>
                <option value="21">21:00</option>
                <option value="22">22:00</option>
                <option value="23">23:00</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">heure_de_depot</label>
                    <select type="text" class="form-control"  
                     name="heure_de_depot"
                    >
                    <option value="00"><?php echo $heure_de_depot.':00'; ?></option>
                    <option value="00">00:00</option>
                <option value="01">01:00</option>
                <option value="02">02:00</option>
                <option value="03">03:00</option>
                <option value="04">04:00</option>
                <option value="05">05:00</option>
                <option value="06">06:00</option>
                <option value="07">07:00</option>
                <option value="08">08:00</option>
                <option value="09">09:00</option>
                <option value="10">10:00</option>
                <option value="11">11:00</option>
                <option value="12">12:00</option>
                <option value="13">13:00</option>
                <option value="14">14:00</option>
                <option value="15">15:00</option>
                <option value="16">16:00</option>
                <option value="17">17:00</option>
                <option value="18">18:00</option>
                <option value="19">19:00</option>
                <option value="20">20:00</option>
                <option value="21">21:00</option>
                <option value="22">22:00</option>
                <option value="23">23:00</option>
                    </select>
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