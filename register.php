<?php
include_once 'dbh.php';

if (isset($_POST['register']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
	$password=$_POST['password'];
	
	//Error handlers
	//Check for empty fields
		if(!preg_match("/^[a-zA-Z]*$/",$name))
		{
			echo 'name';
		}
		else
		{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				echo 'email';
			}
			else
			{
				$sql="SELECT * FROM users WHERE email='$email'";
				$result=mysqli_query($conn,$sql);
				$resultcheck=mysqli_num_rows($result);
				if($resultcheck>0)
				{
					echo 'emailexists';
				}
				else
				{
					$sql="INSERT INTO users (name,email,password) values('$name','$email','$password');";
				    mysqli_query($conn,$sql);
						echo 'success';
				}
			}
		}
}
?>