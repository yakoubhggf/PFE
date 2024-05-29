<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
    unset($_SESSION['departdate']);
    unset($_SESSION['returndate']);
    unset($_SESSION['pick_up_time']);
    unset($_SESSION['drop_off_time']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../getCarPage/getCar.css">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <title>Document</title>
    <style>
      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 300, "GRAD" 0, "opsz" 20;
      }

      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
    </style>
</head>
<body>
<?php
                include "../menuBar/menubar.php"
                ?>
                
    <main class='mt-5 mb-1 ms-4' style='display:block;height:auto ;'>
        <div id='yakoub' class='m-0' >

          <div class="p-1 reservation-options " style=' display: grid;
  grid-template-columns: repeat(5,1fr);
  column-gap: 10px;' >
            
            <div class="datedepart-selector">
              <label for="pick-up-date" class="form-label" style='white-space:nowrap;'>
                Pick-up date
              </label>
              <input type="date" class="form-control" id="pick-up-date"  />
            </div>
            <div class="reservation-time">
              <label for="time-pick-up" class="form-label" style='white-space:nowrap;'>pick-up time</label>
              <select name="hours" id="pick-up-time" class="form-control">
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
            <div class="returndate-selector">
              <label for=" Drop-off-date" class="form-label" style='white-space:nowrap;'> Drop-off date </label>
              <input type="date" class="form-control" id="Drop-off-date" />
            </div>
            <div class="reservation-time">
              <label for="drop-off-time" class="form-label" style='white-space:nowrap;'
                >Drop-off time</label
              >
              <select name="hours" class="form-control" id="drop-off-time" style='white-space:nowrap;'>
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
            <div
              class="search-button d-flex justify-content-start align-items-end"
            >
              <input
                type="button"
                class="btn btn-success  align-self-end"
                style='width:48%'
                value="Search"
                name='search'
                onclick='func();'
                
                
              >
            </div>
    </div>
    </div>
</main >    
    <section class="hggf mb-5">
        <article class="ms-4" style="height: auto;" class='rounded-top'>
                <form class="card" action="" method='post'>
                    <div class="card-header bg-primary " style="color: white;font-size: 1.5rem;">
                        <h4>
                            Filter
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="brand-selector">
                            <label for="brand" class="form-label">
                                Select Brand
                            </label>
                            <select name='marque' class="form-select" id="brand" aria-label="Default select example">
                                <option selected>Select Brand</option>
                                <option value="NISSAN">NISSAN</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Renault">Renault</option>
                                <option value="Land Rover">Land Rover</option>
                              </select>
                        </div>
                        <div class="brandtype-selector">
                                <label for="brandtype" class="form-label">
                                    Select brand type
                                </label>
                                <select name='type' class="form-select" id="branddtype" aria-label="Default select example">
                                    <option selected>Select brand type</option>
                                    <option value="touristique">touristique</option>
                                    <option value="transport">transport</option>
                                    <option value="commercial">commercial</option>
                                  </select>
                        </div>
                        <div class="transmission-selector">
                            <label for="transmission" class="form-label">
                                Select the transmission
                            </label>
                            <select name='transsmission' class="form-select" id="transmission" aria-label="Default select example">
                                <option selected>Select transmission</option>
                                <option value="manuel">manuel</option>
                                <option value="auto">auto</option>
                              </select>
                        </div>
                        <div class="fuel-selector">
                        <label for="fueltype" class="form-label">
                            Select the type of fuel
                        </label>
                        <select name='fuel' class="form-select" id="fueltype" aria-label="Default select example">
                            <option selected>Select fuel type</option>
                            <option value="carosil">carosil</option>
                            <option value="electrique">electrique</option>
                            <option value="hybrid">hybrid</option>
                          </select>
                    </div>
                    <div class="serach-type-car">
                        <input type='submit' class="mt-1 btn btn-primary w-100" name="search" value="search">
                    </div>  
                </form>
    </div>
        </article>
        <section class="cars-listing row gy-2">
        <?php           
                        include_once '../../../backend/database/database.php';
                        $sqlQuery='';
                        if(empty($_POST)){
                            $query=<<<Query
                            SELECT * FROM voiture WHERE etat='disponible';
                            Query;
                            $sqlQuery=$query;
                        }
                        else{
                            if(isset($_POST['search'])){
                                foreach($_POST as $key=> $element){
                                    if(strrpos($element,'Select')===0){
                                        unset($_POST[$key]);
                                    }
                                }
                                $result="";
                                foreach($_POST as $key=> $element){
                                    if($_POST[$key]!='search'){
                                        $result=$result." AND $key LIKE '{$element}%'";
                                    }
                                }
                            
                                $query=<<<Query
                                Select * FROM VOITURE WHERE etat='disponible' {$result}
                                Query;
                                $sqlQuery=$query;
                        }
                    }
                        $sql=$db->prepare($sqlQuery);
                        $sql->execute();
                        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $car){
                            $content=<<<content
                            <div class="col-lg-12">
                                <div class="card w-auto car-card">
                                    <div class="row h-100">
                                        <div class="car-image  col-md-3 ">
                                            <img src="../imageOfCars/{$car['marque']}/clio1.jpg" class="card-img rounded-start "
                                            alt="fiat" style='height:150px;object-fit: cover'>
                                        </div>
                                        <div class="col-6 col-md-7 flex-grow-1">
                                            <div class="card-body d-flex flex-column">
                                                <div>
                                                    <h2 class="card-title h-25 border-bottom">{$car['marque']}</h2>
                                                    <div class="card-text car-info border-bottom mb-3">
                                                        <ul class="row g-2" style="list-style:none outside;padding: 0;">
                                                            <li class="col-6">
                                                                <i>
                                                                    <span class="material-symbols-outlined">group</span>
                                                                    <span style="vertical-align: top;font-weight: bolder;">
                                                                        four personne
                                                                    </span>
                                                                </i>
                                                            </li>
                                                            <li class="col-6">
                                                                <i>
                                                                    <span class="material-symbols-outlined"> bolt </span>
                                                                    <span style="vertical-align: top;font-weight: bolder;">
                                                                        {$car['fuel']}
                                                                    </span>
                                                                </i>
                                                            </li>
                                                            <li class="col-6">
                                                                <i>
                                                                    <span class="material-symbols-outlined"> auto_transmission </span>
                                                                    <span style="vertical-align: top;font-weight: bolder;">
                                                                        {$car['transsmission']} Transmission 
                                                                    </span>
                                                                </i>
                                                            </li>
                                                            <li class="col-6">
                                                                <i>
                                                                    <span class="material-symbols-outlined"> calendar_month </span>
                                                                    <span style="vertical-align: top;font-weight: bolder;">
                                                                    {$car['anne']}
                                                                    </span>
                                                                </i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                </div>
                                                <div class=" d-flex justify-content-between w-100"
                                                >
                                                <div class="car-price">
                                                    <small>
                                                        Pricing for day :
                                                    </small>
                                                    <h4 class="card-title ">
                                                        $<strong>{$car['prix']}</strong>
                                                    </h4>
                                                </div>
                                                    <a type="button" class="btn btn-dark"
                                                    style="align-self: center;padding: 10px 15px;" href='../viewCarPage/viewpage.php?brand={$car['marque']}' style='text-decoration:none;color:white;'>
                                                       View
                                                       </a>
                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>   
                    content;
                            echo $content;
                            
                        }
                        
                        
        ?>
        </section>
    </section>
    <?php 
        include '../footer/footer.php'
    ?>
    <script>
    const date = new Date();
    
    let hour=date.getHours();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    
    
    let currentDate = `${year}-0${month}-${day}`;
    let tommrowDate = `${year}-0${month}-${day+1}`;

        document.getElementById('pick-up-time').value= localStorage.getItem('pick-up-time')||hour;
        document.getElementById('drop-off-time').value= localStorage.getItem('drop-off-time')||hour+1;
        document.getElementById('pick-up-date').value= localStorage.getItem('Pick-up-date')||currentDate;
        document.getElementById('Drop-off-date').value= localStorage.getItem('Drop-off-date')||tommrowDate;
        function func() {
         let datedepart=new Date(document.getElementById('pick-up-date').value);
            let datereturn=new Date(document.getElementById('Drop-off-date').value);
            let milli=1000*60*60*24;
        if((datereturn.getTime()-datedepart.getTime())/milli>1){
          localStorage.setItem('Pick-up-date',document.getElementById('pick-up-date').value);
        localStorage.setItem('Drop-off-date',document.getElementById('Drop-off-date').value);
        localStorage.setItem('pick-up-time',document.getElementById('pick-up-time').value);
        localStorage.setItem('drop-off-time',document.getElementById('drop-off-time').value);
        localStorage.setItem('totaldays',(datereturn.getTime()-datedepart.getTime())/milli);
        
        window.location.href='../getCarPage/getCar.php';
        }
        else{
          window.alert("you can reserve a minimum 1 day");
        }
       
            }
        
            
    </script>
    <script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
