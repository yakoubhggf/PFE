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
    <link rel="stylesheet" href="../bookingCar/booking.css">
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
    <div class="contenu" style='gap:30px;'>
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
                    <button class="button booking"  onclick="window.location.href='../bookingCar/booking.php';">
                        <i>
                            <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                                list
                            </span>
                        </i>
                        Booking 
                    </button>
            </div>
            <div class="booking-list">
                <button class="button booking history" onclick="window.location.href='../bookingHistory/bookinghistory.php'">
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
        <section class="admin-operation " >
            <div class="card w"
            style="max-width: 95%;">
                <div class="card-header">
                    Les Reservation
                </div>
                <div class="card-body">
                    
                   <?php 
                    include '../../../../CRUD/reservation/index.php';
                   ?>
                </div>
            </div>
        </section>
    </div>

    <script>
    feather.replace();
    </script>
    <script>
    function show_add(){

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"

}
toastr["info"]("car added successfully", "Add car");



}
function show_del(){

    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    
    }
    toastr["error"]("car deleted successfully", "Delete car");
    
    
    
    }
    
    function show_update(){

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      
      }
      toastr["success"]("car update successfully", "Update car");
      
      
      
      }

function confirm_delete(id){


   let del=confirm("Do you want to delete the car ?");
   console.log(del)
   if(del==true){
        window.location.href="booking.php?action=del&&id="+id;
   }
  }

function edit(id){
       window.location.href="../../../../CRUD/reservation/add_reservation.php?action=edit&&id="+id;
}
</script>
</body>
</html>