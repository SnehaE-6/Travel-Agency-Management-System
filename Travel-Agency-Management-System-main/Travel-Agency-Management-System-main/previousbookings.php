<?php
session_start();

if(!isset($_SESSION['email_id'])){
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
      <link rel="stylesheet" href="style.css">

    
<!--    js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css">
/*        BACKGROUND*/
    body{
			background: url(images/bookings1.png) no-repeat center center fixed; 
             -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
		}
    
    </style>
    </head>
    <body>
<!--        NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="chome.php"><img src="images/logo3.PNG" class="logo" style="width:75px; height:40px"> Dream Tours</a>
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
        
<?php
        
 $email_id=$_SESSION["email_id"];
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
$sql="select b.booking_id, b.package_id, p.source, p.destination, t.vehicle, t.class, a.hotel_name, a.type, p.price, b.no_of_tickets, b.total_price from bookings b, package p, transport t, accommodation a where b.package_id=p.package_id and p.hotel_id=a.hotel_id and p.tr_id=t.tr_id and email_id='$email_id'";
$records=mysqli_query($db,$sql);
?>

     
<div class="input-box">
<!--    TABLE-->
    <table class="table table-dark table-hover" id="table3">
   
    <tr>
        <th>Booking Id </th>
        <th>Package Id </th>
        <th>Source</th>
        <th>Destination</th>
        <th>Vehicle</th>
        <th>Class</th>
        <th>Hotel Name</th>
        <th>Hotel Type</th>
        <th>Price</th>
        <th>No_of_Tickets</th>
        <th>Total Price</th>
        <th>Delete</th>
        <tr>
    
    <?php 
       while($logs=mysqli_fetch_assoc($records)){
          echo"<tbody>" ?> 
             <form action="delete.php" method="post"> 
           <?php      
          echo"<tr>"; 
        ?>
            <td><input type="text" class="readonly" name="booking_id" id="booking_id" value="<?php echo($logs['booking_id']); ?>" readonly >  </td>
                 <?php 
        
         echo"<td>".$logs['package_id']."</td>";        
         echo"<td>".$logs['source']."</td>";        
         echo"<td>".$logs['destination']."</td>";        
         echo"<td>".$logs['vehicle']."</td>";        
         echo"<td>".$logs['class']."</td>";        
         echo"<td>".$logs['hotel_name']."</td>";        
         echo"<td>".$logs['type']."</td>";        
         echo"<td>".$logs['price']."</td>";        
         echo"<td>".$logs['no_of_tickets']."</td>";        
         echo"<td>".$logs['total_price']."</td>";
        ?>
            <td>
                <button type="submit" class="ntm btn-outline-dark btn-md" style="border-radius:30%" name="delete" id="delete" value="<?php $booking_id ?>">Delete</button>
                
                </td>
         <?php
            echo"</tr>";
    ?> </form>
            <?php
        echo"</tbody>" ;
            
       }
        ?> 
    </table>
        </div>        

    </body>

</html>