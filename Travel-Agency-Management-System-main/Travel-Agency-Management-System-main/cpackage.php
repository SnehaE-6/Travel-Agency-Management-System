<?php
session_start();

if(!isset($_SESSION['email_id'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "login.html"
     </script>' ;
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Available Packages</title>
    <!--    CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
     <link href='tables1.css' rel='stylesheet' >


    
<!--    js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
/*        BACKGROUND*/
     body{
        background: url(images/cpackage5.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
         
    
		}
        .input1{
            background-color: black;
            color: white;
            border: 0;
        }
        
    
    
    </style>
</head>
<body>
<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="chome.php"> <img src="images/logo3.PNG" class="logo" style="width:75px; height:40px"> Dream Tours</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="chome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookings.php">Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="previousbookings.php">Previous Bookings</a>
        </li>
                  <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
         
 

<!-- PHP   -->
<?php
 $_SESSION["email_id"];

$source="";
$destinatiom="";
    $errors=array();

if(isset($_POST['package'])){
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");

$source=mysqli_real_escape_string($db, $_POST['source']);
$destination=mysqli_real_escape_string($db, $_POST['destination']);
    
    if(empty($source))
    {    array_push($errors,"Source is required");}
    
      if(empty($destination))
    {    array_push($errors,"Destination is required");}
     if(count($errors)==0){
$sql="select p.package_id, p.source, p.destination, t.vehicle, t.class, a.hotel_name, a.type, p.price from package p, transport t, accommodation a where p.hotel_id=a.hotel_id and p.tr_id=t.tr_id and source='$source' and destination='$destination'";
$records=mysqli_query($db,$sql);
?>

<div class="input-box">
    <table class="table1 table ">
<!--TABLE-->
   
    <tr class="tr">
        <th>Package Name</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Vehicle</th>
        <th>Vehicle Class</th>
        <th>Hotel Name</th>
        <th>Hotel Category</th>
        <th>Price </th>
        <th>Select Package</th>
        
        
        <tr>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
         ?>
         <tbody>  
             
             <form action="finalize.php" method="post">
             <?php
         echo"<tr>"; ?>
         <td><input type="text" class="input1" name="package_id" id="package_id" value="<?php echo($logs['package_id']);?>" disabled> </td>
        <?php
         echo"<td>".$logs['source']."</td>";
         echo"<td>".$logs['destination']."</td>";        
         echo"<td>".$logs['vehicle']."</td>";
         echo"<td>".$logs['class']."</td>";
         echo"<td>".$logs['hotel_name']."</td>";
         echo"<td>".$logs['type']."</td>";
         echo"<td>".$logs['price']."</td>"; 
                 
        $_SESSION['package_id']=$logs['package_id'];
        $_SESSION['price']=$logs['price'];
         ?>
           <td> <button class="btn btn-outline-light btn-md" name="package" id="package">Select </button></td></form>
       <?php   
         echo"<tr>";    
       }
     }}
        ?> 
             </tbody> 
    </table>
   </div>


    

</body>
        <script src="main.js"></script>

</html>