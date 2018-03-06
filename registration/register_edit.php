<?php 
  include('connection.php');
  $id=$_GET['id'];
  $q="select * from registration where id=$id";
  $b = mysqli_query($conn,$q);

  // $row = mysqli_fetch_array($b);
  // print_r($row);die;
  //update code
  if(isset($_POST['submit']))
  {
    //echo "start";
    $name = $_POST['name'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $gender1=$_POST['gender1'];
    $hobby= implode(",",$_POST['hobby']);

    //$query ="insert into registration('name','email') values('$name','$email')";
    //$a = "INSERT INTO registration('name') values($name)";
    $a = "UPDATE registration SET `name`='$name',`email`='$email',`city`='$city',`gender`='$gender1',`hobby`='$hobby' WHERE id=$id";
    // print_r($a);
    $x = mysqli_query($conn,$a);
    // print_r($x);
    if($x)
    {
      echo "record updated";
      header('location:registrationlist.php');
    }
    else
    {
      echo "Error !..";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="login-box">
    <div class="left">
      <h1>Edit Registration</h1>
      <form method="post" action="#" name="">
        <?php
        while ($row = mysqli_fetch_array($b))
        {  
        ?>   
          <input type="text" name="name" placeholder="Username" value="<?php echo $row['name']; ?>" />
          <input type="text" name="email" placeholder="E-mail" value="<?php echo $row['email']; ?>" />
          <select name="city">
          <option value="<?php echo $row['city'] ?>"><?php echo $row['city'] ?></option>
          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Surat">Surat</option>
          <option value="Mehsana">Mehsana</option>
          <option value="Visnagar">Visnagar</option>
        </select>

        <?php
          $hobby_new=explode(",",$row['hobby']);

        ?>

        <br/><br/><br/>
        <label> Hobies</label><br/><br/>
        <input type="checkbox" name="hobby[]" value="Cricket" 
        <?php echo (in_array('Cricket', $hobby_new))?'checked':''; ?>>Cricket
        <input type="checkbox" name="hobby[]" value="Football"
         <?php echo (in_array('Football', $hobby_new))?'checked':''; ?>>Football<br/>
        <input type="checkbox" name="hobby[]" value="Reading"
        <?php echo (in_array('Reading', $hobby_new))?'checked':''; ?>> Reading
        <input type="checkbox" name="hobby[]" value="Writing"
        <?php echo (in_array('Writing', $hobby_new))?'checked':''; ?>> Writing

        <?php
          $gender1 = $row['gender'];
        ?>
        <label> Gender</label><br/><br/>
        <input type="radio" name="gender1" value="Male" <?php echo ($gender1=='Male')?'checked':''; ?>>Male
        <input type="radio" name="gender1" value="Female" <?php echo ($gender1=='Female')?'checked':''; ?>>Female
        <br/><br/>


        <button type="submit" name="submit">Update</button>
        <?php 
        }
        ?>
       </form>
    </div>
</div>
</body>
</html>