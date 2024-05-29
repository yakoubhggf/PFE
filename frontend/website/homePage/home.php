
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../homePage/home.css" />
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sen:wght@400..800&display=swap"
      rel="stylesheet"
    />
    <title>Home</title>
    <style>
      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      }
    </style>
  </head>
  <body>
   <?php 
    include '../menuBar/menubar.php'
   ?>
    <main class="mb-5" style='margin-top:-47px'>
      <div class="container">
        <div id='yakoub' class="form-floating" >
          <div style="text-align: left">
            <h3
              style="
                color: white;
                font-size: 48px;
                font-family: 'Sen', sans-serif;
                font-optical-sizing: auto;
              "
            >
              Car Rental – Search & Save
            </h3>
          </div>

          <div class="reservation-options bg-light border rounded">
            <div class="datedepart-selector">
              <label for="Pick-up-date" class="form-label">
                Pick-up date
              </label>
              <input type="date" class="form-control" id="Pick-up-date" />
            </div>
            <div class="reservation-time">
              <label for="time-pick-up" class="form-label">Pick-up time</label>
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
              <label for="Drop-off-date" class="form-label"> Drop-off date </label>
              <input type="date" class="form-control" id="Drop-off-date" value='<?php echo date("Y-m-d",strtotime("tomorrow")); ?>'/>
            </div>
            <div class="reservation-time">
              <label for="time-drop-off" class="form-label"
                >Drop-off time</label
              >
              <select name="hours" class="form-control" id="drop-off-time">
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
              class="search-button d-flex justify-content-center align-items-end"
            >
              <input
                type="button"
                class="btn btn-success w-100 align-self-end"
                value="Search"
                name='search'
                onclick='Movepage();'
                
              />
            </div>
          </div>
    </div>
      </div>
    </main>
    <section id="reservation-step " class="container mb-3">
      <h2 class="mb-4">Get started with 3 simple steps</h2>
      <ul class="steps">
        <li class="rounded border">
          <div class="get-start-card">
            <div class="card-icon icon-1">
              <i>
                <span
                  class="material-symbols-outlined"
                  style="font-weight: bolder; font-size: 40px"
                >
                  person_add
                </span>
              </i>
            </div>
            <h3 style="font-size: 18px" class="card-title">Create a Profile</h3>
            <p class="card-text">
              If you are going to use a passage of AgenceX, you need to be
              sure.<br />
              <a href="../InscriptionPage/Inscription.php" class="card-link">Get Started</a>
            </p>
          </div>
        </li>
        <li class="rounded border">
          <div class="get-start-card">
            <div class="card-icon icon-1">
              <i>
                <span
                  class="material-symbols-outlined"
                  style="font-weight: bolder; font-size: 40px"
                >
                  directions_car
                </span>
              </i>
            </div>
            <h3 style="font-size: 18px" class="card-title">
              Tell us what car you want
            </h3>
            <p class="card-text">
              Various versions have evolved over the years, sometimes by
              accident, sometimes on purpose<br />
            </p>
          </div>
        </li>
        <li class="rounded border">
          <div class="get-start-card">
            <div class="card-icon icon-1">
              <i>
                <span
                  class="material-symbols-outlined"
                  style="font-weight: bolder; font-size: 40px"
                >
                  credit_card
                </span>
              </i>
            </div>
            <h3 style="font-size: 18px" class="card-title">Make a deal</h3>
            <p class="card-text">
              There are many variations of passages of AgenceX available, but the
              majority have suffered alteration<br />
            </p>
          </div>
        </li>
      </ul>
    </section>
    <?php 
        include '../footer/footer.php'
    ?>
    <script>
       let date = new Date();
    
    let hour=date.getHours();
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    
    
    let currentDate = `${year}-0${month}-${day}`;
    let tommrowDate = `${year}-0${month}-${day+1}`;

    

let pickUpTimeSelect = document.getElementById('pick-up-time');
let desiredPickUpTime = localStorage.getItem('pick-up-time') || hour.toString().padStart(2, '0').concat(':00'); // Default to current hour


let matchingOption = Array.from(pickUpTimeSelect.options).find(option => option.value === desiredPickUpTime);
pickUpTimeSelect.value = desiredPickUpTime;

 pickUpTimeSelect = document.getElementById('drop-off-time');
 desiredPickUpTime = localStorage.getItem('drop-off-time') || (hour+1).toString().padStart(2, '0').concat(':00'); // Default to current hour


matchingOption = Array.from(pickUpTimeSelect.options).find(option => option.value === desiredPickUpTime);

pickUpTimeSelect.value = desiredPickUpTime;


      
        document.getElementById('Pick-up-date').value= localStorage.getItem('Pick-up-date')||currentDate;
        document.getElementById('Drop-off-date').value= localStorage.getItem('Drop-off-date')||tommrowDate;
      
      function Movepage(){
            let datedepart=new Date(document.getElementById('Pick-up-date').value);
            let datereturn=new Date(document.getElementById('Drop-off-date').value);
            let milli=1000*60*60*24;
        if((datereturn.getTime()-datedepart.getTime())/milli>1){
          localStorage.setItem('Pick-up-date',document.getElementById('Pick-up-date').value);
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
