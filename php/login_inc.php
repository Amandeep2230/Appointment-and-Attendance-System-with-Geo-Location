<?php

if (isset($_POST['submit']))
{
	require '../dbh.php';
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email) || empty($password))
	{
		header("Location: ../admin_panel.php?error=emptyfields");
		exit();
	}
	else
	{
		$sql= "SELECT * FROM admin WHERE email='$email';";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
			
			if ($email == $row['email'])
			{
				
				if ($password!=$row['PASSWORD'])
				{
					header("Location: ../admin_panel.php?error=wrongpwd");
					exit();
				}
				elseif ($password==$row['PASSWORD']) 
				{
					session_start();
					$_SESSION['a_id'] = $row['a_id'];
					header("Location: ../admin.php");
					exit();
				}
				else
				{
					header("Location: ../admin_panel.php?error=wrongpwd");
				}
			}
			else
			{
				header("Location: ../admin_panel.php?error=nouser");
				exit();
			}
		}
	}

else 
{
	echo "Press login button";
}