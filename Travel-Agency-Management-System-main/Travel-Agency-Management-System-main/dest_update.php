<!--UPDATION OF DESTINATIONS-->
<?php
    $errors=array();
    
$city = "";
$availability = "";
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");


if(isset($_POST['Update'])){

   
 
    $city=mysqli_real_escape_string($db, $_POST['city']);
    $availability=mysqli_real_escape_string($db, $_POST['available']);
    if(empty($city))
    {    array_push($errors,"city is required");
    echo("city");}
      if(empty($availability))
    {    array_push($errors,"availability is required");
    echo("availability");}
    if(count($errors)==0){
       
        
        $query="select * from destination where city='$city' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             $query1 = " UPDATE destination SET available ='$availability' WHERE city='$city'";
              mysqli_query($db,$query1);
             echo '<script type="text/JavaScript">  
      alert("Successfully Updated");
      window.location= "ahome.php"
     </script>'; 
          } 
        else{
            $query2 = "INSERT into destination (city,available) VALUES ('$city','$availability')";
            mysqli_query($db,$query2);
              echo '<script type="text/JavaScript">  
      alert("Successfully Added");
      window.location= "update.php"
     </script>';
        }      
              
          }
    else{
        echo '<script type="text/JavaScript">  
      alert("not Happening");
     </script>';
    }
        
        
        
    }




?>