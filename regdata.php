<?php
$ffname = $_POST['fname'];
$llname = $_POST['lname'];
$ssex = $_POST['sex'];
$eemail = $_POST['email'];
$uuser = $_POST['user'];
$ppass = $_POST['pass'];
$mmob = $_POST['mob'];
$succ = 0;

//if(isset(email)1=NULL && isset(pass)!=NULL)
//	{	die();	}

$connection = mysqli_connect("localhost", "root", "", "iitkbook");

if (mysqli_connect_errno()){												//to check the connection
    	die ("Cannot connect to Database : ".mysqli_connect_error());
}

	$query = "select count(*) as rows from info where email='".$eemail."'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result)['rows'];
    if($row == 0){
	$query = "select count(*) as rows from info where user='".$uuser."'";
    	$result = mysqli_query($connection, $query);
    	$row = mysqli_fetch_array($result)['rows'];
    	if($row == 0){
	$query = "insert into info values('".$ffname."','".$llname."','".$ssex."','".$eemail."','".$mmob."','".$uuser."','".sha1($ppass)."',' ',' ',' ')";
		mysqli_query($connection, $query);
        	echo "CONGRATULATIONS! Proceed to <a href='index.php'>login</a>.";
		$succ = 1;
	}
	else{
		echo "Username exits! Select another username!";
		include 'regform.php';
	}
    }
    else{
	echo "Cannot create account as email id has already been used!";
	include 'regform.php';
    } 
    mysqli_close($connection);
	if($succ == 0){
		echo "<br>OR LOGIN<br>";
		include "login_form.html";
	} 
?>