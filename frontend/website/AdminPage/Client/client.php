<?php 
include_once('../../../../backend/database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../bootstrap/css/toster.css">
    <script src="../../../../bootstrap/js/icons.js"></script>
    <script src="../../../../bootstrap/js/jq.js"></script>
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../bootstrap/js/icons.js"></script>
    <script src="../../../../bootstrap/js/toster.js"></script>
    <script src="../../../../bootstrap/js/bootstrap.bundle.min.js"></script>
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../Client/client.css">
    <title>Document</title>
</head>
<body>
<header>
        <nav class="w-100 ">
            <a href="#" class="border-bottom" ><h2>Car Rental Service</h2></a>
          <ul class=" ms-auto d-flex p-0">
              <li>
              <a href="../../../../backend/backendscript/logOutScript.php" type='submit'><button>
              <i>   
                    <small>Logout out</small>
                    <span class="material-symbols-outlined">
                        Logout
                    </span>
                </i>
                </button>
                </a>
              </li>
              
          </ul>  
        </nav>
    </header>
    <!-- the above code is about admin navigation -->
    <div class="contenu">
        <section class="admin-menu border-right">
            <div>
            <button class="button dashboard" onclick="window.location.href='../dashboard/admin.php';" >
                <i>
                    <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                        house
                    </span>
                </i>
                dashboard
            </button>
        </div>
        <div style='padding-left: 10px;'>
            <small class="title" style="text-transform: uppercase;">manage Booking</small>
        </div>
        <div class="manage-booking">
            <div class="booking">
                    <button class="button booking" onclick="window.location.href='../bookingCar/booking.php';">
                        <i>
                            <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                                list
                            </span>
                        </i>
                        Booking 
                    </button>
            </div>
            <div class="booking-list">
                <button class="button booking history"onclick="window.location.href='../bookingHistory/bookinghistory.php'">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                            list
                        </span>
                    </i>
                Booking-H
                </button>
            </div>
        </div>
        <div style='padding-left: 10px;'>
            <small class="title" style="text-transform: uppercase;">Manage Service</small>
        </div>
        <div class="manage-car">
            <div class="booking-list">
                <button onclick="window.location.href='../carPage/car.php' " class="button cars">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                            directions_car
                        </span>
                    </i>
                    cars
                </button>
            </div>
        </div>
        <div class="manage-car">
            <div class="booking-list">
                <button onclick="window.location.href='../Client/client.php' " class="button cars">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                        person
                        </span>
                    </i>
                    Client
                </button>
            </div>
        </div>
     </section>
        <section class="admin-operation d-flex  " >
            <div class="card "
            style="width: 95%;overflow-y:scroll;">
                
                <div class="card-body">
                   
                    <?php 
                    include '../../../../CRUD/client/index.php';
                   ?>
                    
                </div>
            </div>
        </section>
    </div>
    <script>
    feather.replace();
    </script>
    <script>
let buttons=document.querySelectorAll("button");
buttons.forEach((elment)=>{
    elment.addEventListener('mouseover',()=>{
        let i =elment.getElementsByTagName('i')[0];
        let span =i.getElementsByTagName('span')[0];
        span.style.color='black';
        elment.classList.add('hover');
    })
});
buttons.forEach((elment)=>{
    elment.addEventListener('mouseout',()=>{
        elment.classList.remove('hover');
        let i =elment.getElementsByTagName('i')[0];
        let span =i.getElementsByTagName('span')[0];
        span.style.color='grey';
    })
})
function show_del() {
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
  toastr["error"]("Client deleted successfully", "Delete client");
}



function confirm_delete(id) {
  let del = confirm("Do you want to delete the Client ?");
  console.log(del);
  if (del == true) {
    window.location.href = "client.php?action=del&&id=" + id;
  }
}



</script>

</body>
</html>