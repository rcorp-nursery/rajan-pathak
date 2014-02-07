<html>
	<head>
		<title>view</title>
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
		</style>
	</head>
	<body>
		<?php
		$con=mysqli_connect("localhost","root","","book");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	?>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
		<?php

		$result = mysqli_query($con,"SELECT * FROM students");
		
		?>
		<label>student</label>
		<select name="student">
			<option value="0"></option>
			<?php

			while($row = mysqli_fetch_array($result)){
				?>
			 	<option value="<?php echo $row['S_id']; ?>"><?php echo $row['FirstName'].$row['LastName']; ?></option>
				<?php 
			}
			?>
		</select>
		<input type="submit" name="view" value="view">
		<?php
		if(isset($_POST['view'])){
			$pos=$_POST['student'];
			
			$results = mysqli_query($con,"SELECT * FROM students WHERE S_id=".$pos."");
				?>
				<table border='1'>
					<tr>
						<th>S_id</th>
						<th>FirstName</th>
						<th>LastName</th>
						<th>Phone</th>
						<th>Street</th>
						<th>City</th>
	        		</tr>
	        		<?php
					while($s=mysqli_fetch_array($results)){
						?>
						<tr>
							<td><?php echo $s['S_id']?></td>
							<td><?php echo $s['FirstName']?></td>
							<td><?php echo $s['LastName']?></td>
				 			<td><?php echo $s['Phone']?></td>
							<td><?php echo $s['Street']?></td>
							<td><?php echo $s['City']?></td>
						</tr>
						<?php
					}
					?>
				</table>

			<?php $res=mysqli_query($con,"SELECT * FROM books LEFT JOIN students ON (students.S_id=books.S_id) WHERE books.S_id=".$pos."");

			?>
			<table border='1'>
				<tr>
					<th>B_id</th>
					<th>S_id</th>
					<th>book_s</th>
	        	</tr>
			<?php		 
			 while($p=mysqli_fetch_array($res)){ ?>
			
				<tr>
					<td><?php echo $p['B_id']?></td>
					<td><?php echo $p['book_s']?></td>
					<td><?php echo $p['S_id']?></td>
				</tr>
			<?php
			}?>
		<?php
		}
		?>
	</form>
	<?php
	 mysqli_close($con);
	?>
	</body>
</html>