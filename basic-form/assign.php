<?php
  
    $con=mysqli_connect("localhost","root","","book");
    ?>
<html>
<body>
  <?php

     if (mysqli_connect_errno())
      {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

       $S_id=$_POST['student'];
       $B_id=$_POST['book_name'];
       echo $S_id;
       echo $B_id;

      $sql = mysqli_query($con,"UPDATE books 
       SET S_id = ".$S_id."
       WHERE B_id = ".$B_id."");
      $result=mysqli_query($con,$sql);
      

      if($result){
        echo "working";
      }
      else{
        echo "not working";
      }

    
    mysqli_close($con);
  ?>
</body>
</html>