<html>
<body>
<?php
   $con=mysqli_connect("localhost","root","","book");
     
$sql = "INSERT INTO students(FirstName, LastName,Phone,Street,City) VALUES ('".$_GET['FirstName']."','".$_GET['LastName']."','".$_GET['Phone']."','".$_GET['Street']."','".$_GET['City']."')";

if (!mysqli_query($con,$sql))
  {
   die('Error: ' . mysqli_error($con));
  }
 echo $sql;
 echo "1 record added";
 mysqli_close($con);
?>
</body>
</html>