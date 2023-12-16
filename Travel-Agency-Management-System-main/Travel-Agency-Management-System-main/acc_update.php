<?php
    $errors=array();    
$hotel_id = "";
$hotel_name = "";
$city = "";
$type = "";

$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");


if(isset($_POST['Update'])){

   
 
    $hotel_id=mysqli_real_escape_string($db, $_POST['hotel_id']);
    $hotel_name=mysqli_real_escape_string($db, $_POST['hotel_name']);
    $city=mysqli_real_escape_string($db, $_POST['city']);
    $type=mysqli_real_escape_string($db, $_POST['type']);
    if(empty($hotel_id))
    {    array_push($errors,"Hotel Id is required");
    echo("hotel_id");}
      if(empty($hotel_name))
    {    array_push($errors,"Hotel Name is required");
    echo("hotel_name");}
     if(empty($city))
    {    array_push($errors,"City is required");
    echo("city");}
      if(empty($type))
    {    array_push($errors,"Type is required");
    echo("type");}
    if(count($errors)==0){
       
        
        $query="select * from accommodation where hotel_id='$hotel_id' ";
          
          $results=mysqli_query($db,$query);
        //QUERIES          
          if(mysqli_num_rows($results)) {
             $query1 = " UPDATE accommodation SET hotel_name ='$hotel_name', city='$city', type='$type' WHERE hotel_id='$hotel_id'";
              mysqli_query($db,$query1);
             echo '<script type="text/JavaScript">  
      alert("Successfully Updated");
      window.location= "ahome.php"
     </script>'; 
          } 
        else{
            $query2 = "INSERT into accommodation (hotel_id,hotel_name,city,type) VALUES ('$hotel_id','$hotel_name','$city','$type')";
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