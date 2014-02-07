

<html>
<body>
<?php
   $con=mysqli_connect("localhost","root","","book");
     if (mysqli_connect_errno())
      {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
$result = mysqli_query($con,"SELECT FirstName,LastName FROM students WHERE FirstName="rajan"");
$res = mysqli_query($con,"SELECT book_s FROM books );

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>book_s</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['book_s'] . "</td>";
  echo "</tr>";
  }

echo "</table>";




if (!mysqli_query($con,$result))
  {
   die('Error: ' . mysqli_error($con));
  }
 echo $sql;
 echo "1 record added";
 mysqli_close($con);
?>
</body>
</html>