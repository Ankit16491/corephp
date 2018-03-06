<?php 
  
include('connection.php');

if(isset($_POST['submit']))
{
  echo "start";
  $name = $_POST['name'];
  $email=$_POST['email'];
  $city=$_POST['city'];
  $gender=$_POST['gender'];
  //$hobby=$_POST['hobby'];
$hobby= implode(",",$_POST['hobby']);
  //echo "<pre>";print_r($gender1);die;
  //$query ="insert into registration('name','email') values('$name','$email')";
 
 //$a = "INSERT INTO registration('name') values($name)";
  $a = "INSERT INTO registration(name,email,city,gender,hobby) values('$name','$email','$city','$gender','$hobby')";
 
  print_r($a);

 $x = mysqli_query($conn,$a);
 //print_r($x);
  if($x)
  {
    echo "inserted";
  }
  else
  {
    echo "Error123 !..";
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
      <h1>Registration</h1>
    
      <form method="post" action="#" name="">
        <input type="text" name="name" placeholder="Username" />
        <input type="text" name="email" placeholder="E-mail" />
        <select name="city">
          <option value="">Select City</option>
          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Surat">Surat</option>
          <option value="Mehsana">Mehsana</option>
          <option value="Visnagar">Visnagar</option>
        </select>
        <br/><br/><br/>
        
        <label> Hobies</label><br/><br/>
        <input type="checkbox" name="hobby[]" value="Cricket"> Cricket
        <input type="checkbox" name="hobby[]" value="Football">Football<br/>
        <input type="checkbox" name="hobby[]" value="Reading"> Reading
        <input type="checkbox" name="hobby[]" value="Writing"> Writing
        <br/><br/><br/>

        <label> Gender</label><br/><br/>
        <input type="radio" name="gender" value="Male" checked>Male
        <input type="radio" name="gender" value="Female">Female
        <br/><br/>
        <button type="submit" name="submit">Send</button>
      </form>
    </div>
    
</div>
  
</body>
</html>
