<?php
    $errors=array();
    
$package_id = "";
$source = "";
$destination = "";
$acc_req = "";
$hotel_id = "";
$tr_id = "";
$db=mysqli_connect('localhost','root','','travels') or die("could not connect to database");


if(isset($_POST['Create'])){

   
 
    $package_id=mysqli_real_escape_string($db, $_POST['package_id']);
    $source=mysqli_real_escape_string($db, $_POST['source']);
    $destination=mysqli_real_escape_string($db, $_POST['destination']);
    $acc_req=mysqli_real_escape_string($db, $_POST['acc_req']);
    $hotel_id=mysqli_real_escape_string($db, $_POST['hotel_id']);
    $tr_id=mysqli_real_escape_string($db, $_POST['tr_id']);
    $price=mysqli_real_escape_string($db, $_POST['price']);
    
    if(empty($package_id))
    {    array_push($errors,"package_id is required");
    echo("package_id");}
      if(empty($source))
    {    array_push($errors,"Source is required");         //fk
    echo("source");}
    if(empty($destination))
    {    array_push($errors,"Destination is required");     //fk
    echo("destination");}
    if(empty($acc_req))
    {    array_push($errors,"Accommodation is required");
    echo("acc_req");}
    if(empty($hotel_id))
    {    array_push($errors,"Hotel ID is required");        //fk
    echo("hotel_id");} 
    if(empty($tr_id))
    {    array_push($errors,"Transport ID is required");    //fk
    echo("tr_id");}
    if(empty($price))
    {    array_push($errors,"Price is required");
    echo("price");}
    
//QUERIES 
    $q1="select * from destination where city='$source'";
    $r1=mysqli_query($db,$q1);
    if(!mysqli_num_rows($r1))
    {    array_push($errors,"City does not Exist in Database");
    echo('<script type="text/JavaScript">  
      alert("Source does not exist in database");
      window.location= "package.php"
     </script>');}
    
    
    
    $q2="select * from destination where city='$destination'";
    $r2=mysqli_query($db,$q2);
    if(!mysqli_num_rows($r2))
    {    array_push($errors,"City does not Exist in Database");
    echo('<script type="text/JavaScript">  
      alert("Destination does not exist in database");
      window.location= "package.php"
     </script>');}
    
    
   
    $q3="select * from accommodation where hotel_id='$hotel_id'";
    $r3=mysqli_query($db,$q3);
    if(!mysqli_num_rows($r3))
    {    array_push($errors,"Hotel does not exist");
    echo('<script type="text/JavaScript">  
      alert("Hotel does not exist in database");
      window.location= "package.php"
     </script>');}
    
    
    
    
    
    $q4="select * from transport where tr_id='$tr_id'";
    $r4=mysqli_query($db,$q4);
    if(!mysqli_num_rows($r4))
    {    array_push($errors,"Transport does not Exist in Database");
    echo('<script type="text/JavaScript">  
      alert("Transport_ID does not exist in database");
      window.location= "package.php"
     </script>');}

    
    
    
    
    
    if(count($errors)==0){
       
        
        $query="select * from package where package_id='$package_id' ";
          
          $results=mysqli_query($db,$query);
              
          if(mysqli_num_rows($results)) {
             $query1 = " UPDATE package SET price ='$price' WHERE package_id='$package_id'";
              mysqli_query($db,$query1);
             echo '<script type="text/JavaScript">  
      alert("Successfully Updated");
      window.location= "package.php"
     </script>'; 
          } 
        else{
            $query2 = "INSERT into package (package_id,source,destination,acc_req,hotel_id,tr_id,price) VALUES ('$package_id','$source','$destination','$acc_req','$hotel_id','$tr_id','$price')";
            mysqli_query($db,$query2);
              echo '<script type="text/JavaScript">  
      alert("Successfully Added");
      window.location= "package.php"
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