<?php
$newlogin = 0;
$user = $_POST['user'];
$pass = $_POST['pass'];
if( isset($user) || isset($pass) )
{
    if( empty($user) ) {
	echo "<Font color='red'>Please enter your username\n";
        include 'login.php';
        echo "<br> <b><u>OR Register<u><b><br>";
        include 'regform.php';        
	die ();
    }
    if( empty($pass) ) {
	echo "Please enter your password!\n";
	if(! empty($user)){
	        include 'login.php';
       		echo "<br><b><u> OR Register<u><B><br>";
        	include 'regform.php';
	}
        die ();
    }
    $connection = mysqli_connect("localhost", "root", "", "iitkbook");
    //checking connection
    if (mysqli_connect_errno()){
        die ("Cannot connect to Database : ".mysqli_connect_error());
    }
    $query = "select count(*) as rows from info where user='".$user."' and pass='".sha1($pass)."'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result)['rows'];
    if($row != 0){
 
        session_start();
        $_session['userv'] = $user;
 
 	include 'profile.php';
	//echo "<br><br><a href='show_files.php'>Show All Files</a><br>";
	$newlogin = 1;
    }
    else{
	$newlogin = 1;
        echo "Wrong Username or Password!<br>";
        include 'login.php';
        echo "<br><U>OR Register<u><br><br>";
        include 'regform.php';
	}
    mysqli_close($connection);
}

?>
