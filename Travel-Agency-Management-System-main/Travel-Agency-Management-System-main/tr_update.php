<?php
    $errors=array();
    
$tr_id = "";
$vehicle = "";
$class = "";
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");


if(isset($_POST['Update'])){

   
 
    $tr_id=mysqli_real_escape_string($db, $_POST['tr_id']);
    $vehicle=mysqli_real_escape_string($db, $_POST['vehicle']);
    $class=mysqli_real_escape_string($db, $_POST['class']);
    if(empty($tr_id))
    {    array_push($errors,"Transport Id is required");
    echo("tr_id");}
      if(empty($vehicle))
    {    array_push($errors,"Vehicle is required");
    echo("vehicle");}
    if(empty($class))
    {    array_push($errors,"Class is required");
    echo("class");}
    if(count($errors)==0){
       
        
        $query="select * from transport where tr_id='$tr_id' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             
             echo '<script type="text/JavaScript">  
      alert("Vehicle for the given ID Already Exists");
      window.location= "ahome.php"
     </script>'; 
          } 
        else{
            $query2 = "INSERT into transport (tr_id,vehicle,class) VALUES ('$tr_id','$vehicle','$class')";
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