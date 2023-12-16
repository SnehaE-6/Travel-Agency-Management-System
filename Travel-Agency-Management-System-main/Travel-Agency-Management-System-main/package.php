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
      <link href='tables1.css' rel='stylesheet' >
    
<!--    js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
    li{
    list-style: none; 
        }
        .nav-link{
        color: black;
        }

    
    </style>
    </head>
    <body>
<!--        FIXED TOP NAVBAR-->
        <div class="fixed-top">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="ahome.php"> <img src="images/logo3.PNG" class="logo" style="width:75px; height:40px"> Dream Tours </a>
      <li class="nav-item">
          <a class="nav-link " href="#Package">Create Package</a>
        </li>
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
            </nav></div>
        
        
        
        
           <div class="form-container" id="Package">
        
    
        <form class="form" action="apackage.php" method="post"> <center><h2>Create Package</h2></center>

  <div class="mb-3">
    <label for="package_id" class="form-label">Package ID</label>
    <input type="text" class="form-control" id="package_id" name="package_id">
 
  </div>
    <div class="mb-3">
    <label for="source" class="form-label">Source</label>
    <input type="text" class="form-control" id="source" name="source">
  </div>
    <div class="mb-3">
    <label for="phone" class="form-label">Destination</label>
    <input type="text" class="form-control" id="destination" name="destination">
  </div>
            
            
            
            
  <h5>Accommodation</h5>          
    <div class="form-check">
  <input class="form-check-input" type="radio" name="acc_req" id="yes" value="yes">
  <label class="form-check-label" for="yes">
   Yes
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="acc_req" id="no" value="no" >
  <label class="form-check-label" for="no">
  No
  </label>
</div>
         
            
            
            
            
            
  <div class="mb-3">
    <label for="hotel_id" class="form-label">Hotel ID</label>
    <input type="text" class="form-control" id="hotel_id" name="hotel_id">
  </div>
<div class="mb-3">
    <label for="tr_id" class="form-label">Transport ID</label>
    <input type="text" class="form-control" id="tr_id" name="tr_id">
  </div>
<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>
  
  <br>    
            <br>
  <button type="submit" class="btn btn-outline-light btn-lg" id="Create" name="Create">Create Package</button>
</form>
    </div>
<div class="tables"> 
<!--    STORED PROCEDURES-->
        <?php
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
$sql="Call destinations();";
$records=mysqli_query($db,$sql);
?>


    <div >
       <center> <h5 id="Destination">Destinations</h5></center>
    <table class="table table-dark table-hover" id="table1" >
   
    <tr>
        <th>City</th>
        <th>Available</th>

        <tr>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
          echo"<tbody>" ;
          echo"<tr>"; 
        
        
         echo"<td>".$logs['city']."</td>";
         echo"<td>".$logs['available']."</td>";        
   
         echo"</tr>";
        echo"</tbody>" ;
            
       }
        ?> 
    </table>
    </div>
    
     <?php
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
$sql1="Call	accomodations() ";
$records=mysqli_query($db,$sql1);
?>
    <div >
       <center> <h5 id="Accommodation">Accomodations</h5></center>
    
     <table class="table table-dark table-hover" id="table2">
   
    <tr>
        <th>Hotel ID</th>
        <th>Hotel Name</th>
        <th>Category</th>
        <tr>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
          echo"<tbody>" ;
          echo"<tr>"; 
        
        
         echo"<td>".$logs['hotel_id']."</td>";
         echo"<td>".$logs['hotel_name']."</td>";        
         echo"<td>".$logs['type']."</td>";
         echo"</tr>";
        echo"</tbody>" ;
            
       }
        ?> 
    </table>
    </div>
             <?php
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
$sql2="Call transportations() ";
$records=mysqli_query($db,$sql2);
?>
    <div>
    <center><h5 id="Transportation">Transportation</h5></center>
    
     <table class="table table-dark table-hover" id="table3">
   
    <tr>
        <th>Transport ID</th>
        <th>Vehicle Class</th>
        <tr>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
          echo"<tbody>" ;
          echo"<tr>"; 
        
        
         echo"<td>".$logs['tr_id']."</td>";
         echo"<td>".$logs['class']."</td>";        
         echo"</tr>";
        echo"</tbody>" ;
            
       }
        ?> 
    </table>
    
    
    </div>
    
    </div>        
   
  
    </body>

</html>