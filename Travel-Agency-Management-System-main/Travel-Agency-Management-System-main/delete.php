<!--DELETION OF PREVIOUS BOOKINGS-->
<?php
session_start();
if(!isset($_SESSION['email_id'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "login.html"
     </script>' ;}
    
$booking_id = "";


$errors=array();

$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
//$database = mysql_select_db('placement',$db);

$booking_id= mysqli_real_escape_string($db,$_POST['booking_id']);


if(empty($booking_id))array_push($errors,"booking_id is required");

                       
    if(count($errors)==0){
       
        
       $query="select * from bookings where booking_id='$booking_id'";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
              $query1 ="Delete from bookings where booking_id='$booking_id'";
              $results = mysqli_query($db,$query1);
                echo '<script type="text/JavaScript">  
      alert("Booking Deleted"); 
     window.location= "previousbookings.php"
     </script>' ;
            
          } 
        else{echo '<script type="text/JavaScript">  
      alert("Something went wrong");  
     </script>' ;
               
        }     
        
        
    }
    

?>