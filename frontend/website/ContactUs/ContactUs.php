<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> contact us </title>
    <link rel="stylesheet" href="../ContactUs/ContactUs.css">
    
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <?php 
        include '../menuBar/menubar.php';
    ?>
  <div class="containerr" style='margin-bottom:40px;'>
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt text-primary"></i>
          <div class="topic">Address</div>
          <div class="text-one">Sidi Amar</div>
          <div class="text-two">Departement IT</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt text-primary"></i>
          <div class="topic">Phone</div>
          <div class="text-one">0663077875</div>
          <div class="text-two">0663077870</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope text-primary"></i>
          <div class="topic">Email</div>
          <div class="text-one">yakoubhamdane48@gmail.com</div>
          <div class="text-two">arslenben669@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text text-primary">Send us a message</div>
      <form action="ContactUs.php" method="GET">
        <div class="input-box">
          <input  class='form-control' type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input  class='form-control' type="text" placeholder="Enter your email">
        </div><div class="input-box">
          <input  class='form-control' type="text" placeholder="Subject">
        </div>
        <div class="input-box message-box">
        <textarea class='form-control' placeholder='Enter your message' rows="3"></textarea>
        </div>
        <div class="button">
          <input type="submit" class='bg-primary' value="Send Now" style="color: #fff;
          font-size: 18px;
          outline: none;
          border: none;
          padding: 8px 16px;
          border-radius: 6px;
          cursor: pointer;
          transition: all 0.3s ease;" >
        </div>
      </form>
    </div>
    </div>
  </div>
  <?php 
    include '../footer/footer.php'
  ?>
  
    <script src="../../../../bootstrap/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>