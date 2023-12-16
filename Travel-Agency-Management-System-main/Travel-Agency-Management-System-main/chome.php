<?php
session_start();

if(!isset($_SESSION['email_id'])){
    echo '<script type="text/JavaScript">  
      alert("You Need To Login First");
      window.location= "login.html"
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
			background: url(images/chome4.jpg) no-repeat center center fixed; 
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

    </body>

</html>