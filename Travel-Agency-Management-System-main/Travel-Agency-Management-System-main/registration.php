<?php
session_start();

$email_id = "";
$name = "";
$phno= "";
$address = "";
$password_1 = "";
$password_2 ="";

$errors=array();

//REGISTRATION FORM FIELDS
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");
if(isset($_POST['register'])){
$email_id = mysqli_real_escape_string($db,$_POST['email']);
$name = mysqli_real_escape_string($db,$_POST['name']);
$phno = mysqli_real_escape_string($db,$_POST['phone']);
$address = mysqli_real_escape_string($db,$_POST['address']);
$password_1 = mysqli_real_escape_string($db,$_POST['password']);
$password_2 = mysqli_real_escape_string($db,$_POST['confirmPassword']);

//ERRORS
if(empty($email_id))array_push($errors,"email_id is required");
if(empty($name))array_push($errors,"name is required");
if(empty($password_1))array_push($errors,"password is required");
                       
if($password_1!=$password_2){array_push($errors,"passwords should match");
                       echo '<script type="text/JavaScript">  
      alert("Passwords do not match");  
     </script>' ; 
        ;}
if($phno == ""){array_push($errors,"phone_no required");
                       echo '<script type="text/JavaScript">  
      alert("Please enter your phone number");  
     </script>' ; 
        ;}
    if($address == ""){array_push($errors,"address required");
                       echo '<script type="text/JavaScript">  
      alert("Please enter Your address ");  
     </script>' ; 
        ;}

//QUEIRES    
$login_check_query="select * from registration where email_id = '$email_id' or phno='$phno' LIMIT 1";
$results=mysqli_query($db,$login_check_query);
$login=mysqli_fetch_assoc($results);
    

if($login){
    if($login['email_id']==$email_id){array_push($errors,"email_id already exists");
                               echo '<script type="text/JavaScript">  
      alert("email_id already registered");  
     </script>' ;}
}



if(count($errors)==0)
{
   
    $query="insert into registration  (email_id,name,phno,address,password) values ('$email_id','$name','$phno','$address','$password_1')";
    mysqli_query($db,$query);
    $_SESSION['email_id']=$email_id;

   echo '<script type="text/JavaScript">  
      alert("Successfully Registered");
     window.location= "chome.php"
     </script>';
    }
    else{
        echo '<script type="text/JavaScript">  
      alert("Failed. Try again");
     window.location= "registration.html"
     </script>';
        
        
        
    }
}

?>
