<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../dashboard/admin.css">
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
            <button class="button dashboard" onclick="
                        window.location.href='../dashboard/admin.php';
                    ">
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
                    <button class="button booking" onclick="
                        window.location.href='../bookingCar/booking.php';
                    ">
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
        
            <div class="booking-list">
                <button class="button cars"  onclick="window.location.href='../carPage/car.php'">
                    <i>
                        <span class="material-symbols-outlined shadow  bg-body-tertiary rounded">
                            directions_car
                        </span>
                    </i>
                    cars
                </button>
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
        <section class="admin-operation overflow-hidden ps-3">
            <?php 
                include_once '../../../../backend/database/database.php';
            ?>
            <div class="row "
            style="display: flex;
            gap: 10px;">
                <div class="col-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <p style="font-weight: 400;margin-bottom: 0;">
                        Total Booking
                    </p>
                    <p class="m-0">
                        <?php 
                        global $db;
                        $sqlQuery=<<<Query
                            SELECT COUNT(*) FROM reservation
                        Query;
                        $sql=$db->prepare($sqlQuery);
                        $sql->execute();
                        echo $sql->fetchColumn();
                        ?>
                        
                    </p>
                </div>
                <div class="col-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <p style="font-weight: 400;margin-bottom: 0;">
                        Total Brands
                    </p>
                    <p class="m-0">
                        <?php 
                        $sqlQuery=<<<Query
                        SELECT COUNT(DISTINCT SUBSTRING_INDEX(marque, ' ', 1)) AS nb_marques FROM voiture
                        Query;
                        $sql=$db->prepare($sqlQuery);
                        $sql->execute();
                        echo $sql->fetchColumn();
                    ?>
                        
                    </p>
                </div>
                <div class="col-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <p style="font-weight: 400;margin-bottom: 0;">
                        Total BrandTypes
                    </p>
                    <p class="m-0">
                    <?php 
                        $sqlQuery=<<<Query
                        SELECT COUNT(DISTINCT type) AS nb_marques FROM voiture;

                        Query;
                        $sql=$db->prepare($sqlQuery);
                        $sql->execute();
                        echo $sql->fetchColumn();
                    ?>
                    </p>
                </div>
                <div class="col-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <p style="font-weight: 400;margin-bottom: 0;">
                        Total Cars
                    </p>
                    <p class="m-0">
                    <?php
                         $sqlQuery=<<<Query
                         SELECT COUNT(*) FROM voiture;
 
                         Query;
                         $sql=$db->prepare($sqlQuery);
                         $sql->execute();
                         echo $sql->fetchColumn();
                     ?>
                    
                    </p>
                </div>
                <div class="col-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <p style="font-weight: 400;margin-bottom: 0;">
                        Total Admin
                    </p>
                    <p class="m-0">
                    <?php
                         $sqlQuery=<<<Query
                         SELECT COUNT(*) FROM `administrateur`;
 
                         Query;
                         $sql=$db->prepare($sqlQuery);
                         $sql->execute();
                         echo $sql->fetchColumn();
                     ?>
                    </p>
                </div>
            </div>
        </section>
    </div>
</body>
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

    <script src="../../../../bootstrap/js/bootstrap.bundle.min.js"></script>
</script>
</html>