<!--LOGOUT FUNCTIONALITY-->
<?php
session_start();
if(isset($_SESSION['email_id'])){
       session_unset();
       session_destroy();
       header("location:login.html");
   }
else if(isset($_SESSION['admin'])){
       session_unset();
       session_destroy();
       header("location:alogin.html");
   }
else if(isset($_SESSION['admin']) and isset($_SESSION['email_id'])){
       session_unset();
       session_destroy();
       header("location:home.html");
   }

else
   {  echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "home.html"
     </script>' ;
   }
?>