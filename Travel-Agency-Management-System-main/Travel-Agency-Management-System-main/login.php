<?php
session_start();
$errors=array();
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");

$email_id="";
if(isset($_POST['login'])){

          $email_id=mysqli_real_escape_string($db, $_POST['email']);
          $password=mysqli_real_escape_string($db, $_POST['password']);
    
    if(empty($email_id))
    {    array_push($errors,"email_id is required");}
      if(empty($password))
    {    array_push($errors,"password is required");}
   
    
    if(count($errors)==0){
       
        
        $query="select * from registration where email_id='$email_id' and password='$password' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
              $_SESSION['email_id']=$email_id;
             echo '<script type="text/JavaScript">
      alert("Successfully Logged In");
      window.location= "chome.php"
     </script>' ;
              
          } 
        else{
               echo '<script type="text/JavaScript">  
      alert("Incorrect email_id or Password"); 
            window.location= "login.html"

     </script>' ;
        }      
              
          }
        
        
        
    }
?>