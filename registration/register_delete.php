<?php
 include('connection.php');
 $id=$_GET['id'];
 $q="DELETE FROM `registration` WHERE id=$id";
 $b = mysqli_query($conn,$q);
 if($b)
 {
 	echo "Record Deleted..";
 	header('location:registrationlist.php');
 }
 else
 {
 	echo "error ..";
 }

 ?>
