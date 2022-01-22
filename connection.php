<?php
   $dbhost="localhost";
   $dbuser="root";
   $dbpassword="";
   $dbname="Apollo";
   $con=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
   if($con->connect_error){
       die("Connection failed: " . $conn->connect_error);
   }
?>
