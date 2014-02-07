<?php
$con=mysqli_connect("localhost","root","","book");
?>
<html>
<head>
<title>assign book</title>
 <style type="text/css">
 

 body, html {
    color: #373C40;
    font-family: Verdana,Arial, Helvetica, sans-serif;
    height: 100%;
    background-color: #f0f0f0;
    margin:10px;
}
form {
    padding: 100px 0 100px 0;
    font-weight: 500;
    font-size: 10pt;
    border:5px solid black;

}
select{
       

      }

</style>
</head>
<body>
  <?php
     if(isset($_POST['submit'])){ 
    
      
      $aid=$_POST['student'];
       $bid=$_POST['book_name'];

      
      
     
      $sql = mysqli_query($con,"UPDATE books 
       SET S_id = ".$aid."
       WHERE B_id = ".$bid."");
      
      }
      ?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">	
<label>student</label>
<select name="student">
<option value="">Select</option>
<?php
 
      $result = mysqli_query($con,"SELECT * FROM students");
while($row = mysqli_fetch_array($result))
{
  ?>
	 <option value="<?php echo $row['S_id'];?>"><?php echo $row['FirstName'].$row['LastName']; ?></option>
	<?php
}
  ?>

	</select><br><br>
	<label>book_name</label>

	<select name="book_name">
  <option value="">Select</option> 
     <?php
      $res=mysqli_query($con,"SELECT * FROM books");
while($row = mysqli_fetch_array($res))
     {
      ?>
     <option value="<?php echo $row ['B_id'];?>"><?php echo $row ['book_s'];?></option>
	 <?php
  }
  ?>
	</select><br>
	
<input type="submit" name="submit" value="Assign">
</form>
<?php
 mysqli_close($con);
?>
</body>
</html>