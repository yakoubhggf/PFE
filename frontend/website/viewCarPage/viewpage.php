<?php
  if(isset($_SESSION)){
    session_start();
  }
  include_once "../../../backend/database/database.php";
  $sqlQuery=<<<Query
  SELECT * FROM voiture WHERE marque='{$_GET['brand']}'
  Query;
  $sql=$db->prepare($sqlQuery);
  $sql->execute();
  $result=$sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="../viewCarPage/viewpage.css" />
    <style>

    </style>
    <title>ViewPage</title>
  </head>
  <body>
    <?php 
      include_once "../menuBar/menubar.php"
    ?>
    <main class="container" style="min-height: 100%">
      <section id="car-view">
        <div id="slider" class="carousel slide border rounded-bottom-1" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#slider"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#slider"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <?php 
              $i=0;
              $image='';
              while($i<3){
              $htmlCode=<<<html
                <div class="carousel-item active c-item">
                  <img src="../imageOfCars/{$result['marque']}/clio$i.jpg" class="d-block w-100 c-img" alt="..." />
                </div>
                html;
                $image=$image.$htmlCode;
                $i++;
              }
              
              echo $image;
            ?>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#slider"
            data-bs-slide="prev"
          >
            <span
              class="carousel-control-prev-icon"
              aria-hidden="true"
              style="background-color: black"
            ></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#slider"
            data-bs-slide="next"
          >
            <span
              class="carousel-control-next-icon"
              aria-hidden="true"
              style="background-color: black"
            ></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div id="car-inforamtion" class="w-100 border rounded">
          <div class="row mb-4 mt-3">
            <div class="car-name col-12 mb-2">
              <h5><?php echo $result['marque'] ?></h5>
            </div>
            <div class="col-lg-4">
              <p>
                <small> brand:<strong><?php echo $result['marque'] ?></strong> </small>
              </p>
            </div>
            <div class="col-lg-4">
              <p>
                <small> body type:<strong><?php echo $result['type'] ?></strong> </small>
              </p>
            </div>
            <div class="col-lg-4">
              <p>
                <small> Transsimion:<strong><?php echo $result['transsmission'] ?></strong> </small>
              </p>
            </div>
            <div class="col-lg-4">
              <p>
                <small> Fuel:<strong><?php echo $result['fuel'] ?></strong> </small>
              </p>
            </div>
            <div class="col-lg-4">
              <p>
                <small> Car Registion:<strong><?php echo $result['numeroSequence'] ?></strong> </small>
              </p>
            </div>
          </div>
          <hr />

          <div class="booking-time row mb-4">
            <div class="car-name col-12 mb-2">
              <h5>booking time</h5>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col">
                  <small> PickUpTime </small>
                  <p id='PickUpTime'></p>
                </div>
                <div class="col"></div>
                <div class="col">
                  <small> EndUpTime </small>
                  <p id='EndUpTime'></p>
                </div>
              </div>
            </div>
          </div>
           
          <hr />
          <div class="car-caractristique row">
            <div class="col-12 mb-2">
              <h5>Car Feature / Details</h5>
            </div>
            <div class="col-12">
              <table class=" table table-striped rounded">
                <tbody>
                <?php 
                                                            foreach($result as $key =>$value){
                                                                if($key !='prix' && $key!='idVoiture'){
                                                                    $htmlCode=<<<html
                                                                    <tr>
                                                                     <td>$key</td>
                                                                    <td colspan="3">$value</td>
                                                                     </tr>
                                                                    html;
                                                                    echo $htmlCode;
                                                                }
                                                                    
                                                            }
                                                            
                                                        ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
      <article>
        <div class="card">
          <div class="card-body">
            <div class="card-title border-bottom">
              <h5 class="mb-3">Reservation</h5>
            </div>
            <div class="card-text">
              <div class="reservation-details border-bottom mb-2">
                <div class="Pricing-from">
                  <small> Pricing From </small>
                </div>
                <div
                  class="Per-hour d-flex justify-content-between align-items-center"
                >
                  <h3 style='font-size:1rem;'>Per Day</h3>
                  <h3 style='font-size:1rem;'>$<strong class='per-day'><?php echo $result['prix']?></strong></h3>
                </div>
                
                <div>
                  <div
                    class="Total-hours d-flex justify-content-between align-items-center mb-2"
                  >
                    <h3 style='font-size:1rem;'>Total Days</h3>
                    <h3  style='font-size:1rem;'><strong class='totaldays'></strong></h3>
                  </div>
                </div>
              </div>
              <div
                class="total-price d-flex justify-content-between align-items-center mb-1"
              >
                <h3 style='font-size:1rem;'>Total payment</h3>
                <h3 style='font-size:1rem;'>$<strong class='totalpayment'></strong></h3>
              </div>
              <div id="liveAlertPlaceholder"></div>
              <button type="button"  class="btn btn-primary w-100" id="liveAlertBtn">Continue</button>
            </div>
          </div>
        </div>
      </article>
    </main>
    <?php 
        include '../footer/footer.php'
    ?>
    <script>
    
            document.getElementById('PickUpTime').textContent=localStorage.getItem('Pick-up-date').concat(` ${localStorage.getItem('pick-up-time')}:00`);
            document.getElementById('EndUpTime').textContent=localStorage.getItem('Drop-off-date').concat(` ${localStorage.getItem('drop-off-time')}:00`);

                  const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                  const appendAlert = (message, type) => {
                  const wrapper = document.createElement('div')
                  wrapper.innerHTML = [
                  `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                  `   <div>you must login-><a href='../loginPage/login.php'>login</a></div>`,
                  '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                  '</div>'
                    ].join('');
                    alertPlaceholder.append(wrapper)
                  }

                const alertTrigger = document.getElementById('liveAlertBtn')
                if (alertTrigger) {
                  alertTrigger.addEventListener('click', () => {
                    <?php 
                  if(empty($_SESSION['adressEmail'])):
                  ?>
                    appendAlert('Nice, you triggered this alert message!', 'success');
                    <?php else:?>
                window.location.href='../reservationFormulaire/reservation.php?marque=<?php echo $result['marque'] ?>';
              <?php endif
              ?>
                  })
                }
               
        
                
                  document.querySelector(".totaldays").textContent=localStorage.getItem('totaldays');
                  document.querySelector(".totalpayment").textContent=Number(document.querySelector(".totaldays").textContent)*(Number(document.querySelector(".per-day").textContent))
    </script>
    <script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
