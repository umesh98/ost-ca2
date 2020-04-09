<?php

session_start();

$con = mysqli_connect('localhost','root');
if($con){
	echo "connection successful";
}
else{
	echo "no connection";
}

mysqli_select_db($con, 'sessionregistration');

$name = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['password'];

$q = "select * from reg where username = '$name' && email = '$email' && password = '$password' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	
	$_SESSION['uname'] = $name;
	header('location:registration.php');
}
else{
	$qy = "insert into reg (username, email, password) values ('$name', '$email', '$password') ";
	mysqli_query($con, $qy);
	header('location:home.php');
	}

?>
