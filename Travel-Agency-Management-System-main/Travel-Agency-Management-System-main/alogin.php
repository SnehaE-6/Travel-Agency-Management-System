<?php
session_start();
$errors=array();


$admin="";
if(isset($_POST['login'])){

          $admin=$_POST['username'];
          $password=$_POST['password'];
    
    if(empty($admin))
    {    array_push($errors,"admin is required");}
      if(empty($password))
    {    array_push($errors,"password is required");}
   
    
    if(count($errors)==0){
              
          if($admin==="Admin" and $password==="Admin@46")
          {
              $_SESSION['admin']=$admin;
              header("location:ahome.php");
             echo ("Admin logged in!");
          } 
        else{
               echo '<script type="text/JavaScript">  
      alert("Incorrect Username or Password");  
     </script>';
        }      
              
          }else  {echo '<script type="text/JavaScript">  
      alert("Nope");  
     </script>';}
        
        
}
    
?>