<?php
	include('connection.php');
	$a="SELECT * FROM registration";
	$b = mysqli_query($conn,$a);
	$count=0;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration List</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="login-box">
		<table id="register">
			<tr>
				<th colspan="8">Register Data</th>
			</tr>
			<tr>
				<th>SrNo</th>
				<th>Name</th>	
				<th>Email ID</th>
				<th>City</th>
				<th>Gender</th>
				<th>Hobby</th>
				<th>Edit</th>
				<th>Delete</th>
						
			</tr>
			<?php
				while($row = mysqli_fetch_array($b))
				{
					$count++;
			?>
			<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $row['name']; ?></td>	
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['city']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td><?php echo $row['hobby']; ?></td>
				<td><a href="register_edit.php?id=<?php echo $row['id'];?>">Edit</td>
				<td><a href="register_delete.php?id=<?php echo $row['id']; ?>">Delete</td>
			</tr>
			<?php 
				}
			?>
		</table>
	</div>
</body>
</html>