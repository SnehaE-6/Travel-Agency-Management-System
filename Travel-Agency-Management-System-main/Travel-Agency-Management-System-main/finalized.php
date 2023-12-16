<?php
session_start();

//$email_id = "";
$package_id = "";
$price= "";
$no_of_tickets = "";
$total_price = "";


$errors=array();

$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
if(isset($_POST['book'])){
$email_id=$_SESSION["email_id"];
$package_id = mysqli_real_escape_string($db,$_POST['package_id']);
$price= mysqli_real_escape_string($db,$_POST['price']);
$no_of_tickets = mysqli_real_escape_string($db,$_POST['no_of_tickets']);
$total_price = mysqli_real_escape_string($db,$_POST['total_price']);


if(empty($email_id))array_push($errors,"email_id is required");
if(empty($package_id))array_push($errors,"package_id is required");
if(empty($price))array_push($errors,"price is required");
                       
if($no_of_tickets == "")array_push($errors,"no_of_tickets required");
                 
if($total_price == "")array_push($errors,"total_price required");
                      
        

    


if(count($errors)==0)
{
   
    $query="insert into bookings  (email_id,package_id,price,no_of_tickets,total_price) values ('$email_id','$package_id','$price','$no_of_tickets','$total_price')";
    mysqli_query($db,$query); 
    

   echo '<script type="text/JavaScript">  
      alert("Successfully Booked");
      window.location= "previousbookings.php"
     </script>';
    }
    else{
        echo '<script type="text/JavaScript">  
      alert("Failed. Try again");
//      window.location= "finalize.php"
     </script>';
        
        
        
    }
}

?>
