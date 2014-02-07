<html>
<body>
<?php
   $con=mysqli_connect("localhost","root","","book");
     if (mysqli_connect_errno())
      {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
$sql = "INSERT INTO books(book_s,book_name_for_c,Author_c,book_name_for_cplus,Author_cplus,book_name_for_java,Author_java) VALUES ('".$_POST['book_s']."','".$_POST['book_name_for_c']."','".$_POST['Author_c']."','".$_POST['book_name_for_cplus']."','".$_POST['Author_cplus']."','".$_POST['book_name_for_java']."','".$_POST['Author_java']."')";

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