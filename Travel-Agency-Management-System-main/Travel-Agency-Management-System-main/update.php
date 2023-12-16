<?php
session_start();

if(!isset($_SESSION['admin'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "alogin.html"
     </script>' ;
}


?>
<html>
<head>
    <title>Home</title>
    
    
<!--    CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="styles.css">
       <style type="text/css">
		
		body{
			background-image:url(images/upd2.jpg);  
			background-size: cover;
			background-attachment: fixed;
		}
           .upbg{
/*               background-image:url(images/Update5.jpg);  */
			background-size: cover;
			background-attachment: fixed;
           }
    
    </style>    
    
<!--    js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <div class="fixed-top">
<!--            NAVBAR-->
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="ahome.php"> <img src="images/logo3.PNG" class="logo" style="width:75px; height:40px"> Dream Tours </a>
      <li class="nav-item">
          <a class="nav-link " href="#Destination">Destination</a>
        </li>
      <li class="nav-item">
          <a class="nav-link " href="#Accommodation">Accommodation</a>
        </li>
      <li class="nav-item">
          <a class="nav-link " href="#Transportation">Transportation</a>
        </li>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="ahome.php">Home</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="update.php">Updates</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="package.php">Package</a> 
        </li>
              <li class="nav-item">
          <a class="nav-link" href="active_customers.php">Customers</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        
      </ul>
    
    </div>
  </div>
</nav>
                      
            </div>
        
        
<!--        Destination FORM-->
   <div class="upbg">   
   <div class="form-container" id="Destination">
        <form class="forms" action="dest_update.php" method="post">
            <center><h3>Destination</h3></center> 
  <div class="mb-3">
    <label for="city" class="form-label"> City</label>
    <input type="text" class="form-control" id="city" name="city">
  </div>
<h5>Availability</h5>
<div class="form-check">
  <input class="form-check-input" type="radio" name="available" id="available" value="yes">
  <label class="form-check-label" for="available">
   Yes
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="available" id="available1" value="no" >
  <label class="form-check-label" for="available1">
  No
  </label>
</div>
  <button type="submit" name="Update" class="btn btn-dark">Add/Update</button>
</form>
 </div>            
        
        
<!--        Accommodation FORM-->
        
        
        
        <div class="form-container" id="Accommodation">
    
              <form class="forms" action="acc_update.php" method="post">
                  <center><h3>Accommodation</h3></center> 
  <div class="mb-3">
    <label for="city" class="form-label"> Hotel Id</label>
    <input type="text" class="form-control" id="hotel_id" name="hotel_id">
  </div>
  <div class="mb-3">
    <label for="city" class="form-label"> Hotel Name</label>
    <input type="text" class="form-control" id="hotel_name" name="hotel_name">
  </div>
                  <div class="mb-3">
    <label for="city" class="form-label"> City</label>
    <input type="text" class="form-control" id="city" name="city">
  </div>
<h5>Category</h5>
<div class="form-check">
  <input class="form-check-input" type="radio" name="type" id="7-Star" value="7-Star">
  <label class="form-check-label" for="7-Star">
   ⭐⭐⭐⭐⭐⭐⭐
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="type" id="5-Star" value="5-Star">
  <label class="form-check-label" for="5-Star">
   ⭐⭐⭐⭐⭐
  </label>
</div> 
                  <div class="form-check">
  <input class="form-check-input" type="radio" name="type" id="4-Star" value="4-Star">
  <label class="form-check-label" for="4-Star">
   ⭐⭐⭐⭐
  </label>
</div>
  <button type="submit" name="Update" class="btn btn-dark">Add/Update</button>
</form>
 </div>            
   
        
<!--        Transport FORM-->
    <div class="form-container" id="Transportation">
        <form class="forms" action="tr_update.php" method="post">
           <center> <h3>Transportation</h3></center> 
  <div class="mb-3">
    <label for="tr_id" class="form-label "> <h5>Transport Id</h5> </label>
    <input type="text" class="form-control" id="tr_id" name="tr_id">
  </div>
  <h5>Mode of Transport</h5>
      <div class="form-check">
  <input class="form-check-input" type="radio" name="vehicle" id="Bus" value="Bus">
  <label class="form-check-label" for="Bus">
   Bus
  </label>
</div>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="vehicle" id="Train" value="Train">
  <label class="form-check-label" for="Train">
   Train
  </label>
</div>

 <h5>Class</h5>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="class" id="Non_AC" value="Non-AC">
  <label class="form-check-label" for="Non_AC">
   Non-AC
  </label>
</div>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="class" id="sleeper" value="Sleeper">
  <label class="form-check-label" for="sleeper">
   Sleeper
  </label>
</div>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="class" id="Non-Sleeper-AC" value="Non-Sleeper-AC">
  <label class="form-check-label" for="Non-Sleeper-AC">
   Non-Sleeper-AC
  </label>
</div>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="class" id="Sleeper-AC" value="Sleeper-AC">
  <label class="form-check-label" for="Sleeper-AC">
   Sleeper-AC
  </label>
</div>
  <button type="submit" name="Update" class="btn btn-dark">Add</button>
</form>
 </div>   
       </div>
        
    </body>

</html>
