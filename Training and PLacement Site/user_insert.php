<?php
include("includes/connection.php");
session_start();
$con=mysqli_connect("localhost","root","","social_network") or die("Connection was not established");

		$name=mysqli_real_escape_string($con,$_POST['u_name']);
		$pass=mysqli_real_escape_string($con,$_POST['u_pass']);
		$email=mysqli_real_escape_string($con,$_POST['u_email']);
		$date=date("y-m-d");
		$status="unverified";
		$posts="No";
		$default="default.jpg";
		$get_email="select * from users where user_email='$email'";
		$run_email=mysqli_query($con,$get_email);
		$check=mysqli_num_rows($run_email);

		if($check==1)
		{
			echo "<h2>This e-mail is already registered</h2>";
			exit();
		}
		else
		{
			
			
			if(mysqli_query($con,"INSERT INTO `users`( `user_name`, `user_pass`, `user_email`,) VALUES ('$name','$pass','$email')"))
			{

				$_SESSION['user_email']=$email;
				echo "<script>alert('Registration is successful')</script>";
				header('Location: home.php');

			}
			else{
				echo "query not inserted";
			}


		}


?>
