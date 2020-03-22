<?php
session_start();
include 'dbh.php';
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$pass=$_POST['password'];

	$sql="SELECT * FROM users WHERE email='$email' AND `password`='$pass'";
    $result1=$conn->query($sql);
	if(!$row=mysqli_fetch_assoc($result1)){
		echo $row;
	       
		}
	else{
		$_SESSION['userid']=$row['userid'];
		$_SESSION['name']=$row['name'];
		$_SESSION['email']=$row['email'];
		$_SESSION['password']=$row['password'];
		// $id=$_SESSION['userid'];
		// $sql="UPDATE `student` SET status ='online' WHERE sid = '$id'";
		// $result=$conn->query($sql); 
		echo 'success';
		 }

	exit();
    
}

?>

