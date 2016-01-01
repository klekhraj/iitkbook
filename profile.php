<!DOCTYPE html>

<html>
<body>

<?php

$user = $_session['userv']; 
$connection = mysqli_connect("localhost", "root", "", "iitkbook");
$_SESSION['auth'] = 1;
setcookie("user", $_POST['user'], time()+(84600*30));
$query = "select fname, lname, sex, email, mob From info where user ='".$user."';";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$lname = $row['lname'];

$email = $row['email'];
$sex = $row['sex'];
$mob = $row['mob'];

$query = "select add From info where user ='".$user."';";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result)['rows'];
//$college = $row['college'];
$add = $row['add'];
echo $add;
//$hobby = $row['Hobby'];

	echo "Hello!";
	echo "<font color='#00e600'>Welcome </font>";
	echo $fname." ".$lname." ".$sex." ".$mob;
	echo "<form action='logout.php'>
	<input type='submit' value='Logout'>";
	
	//, college, add, Hobby 
	//." ".$college." ".$add." ".$hobby


?>



<body>