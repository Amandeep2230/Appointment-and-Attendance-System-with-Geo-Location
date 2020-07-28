<?php

$dbServer = "localhost";
$dbUName = "root";
$dbPass = "";
$dbName = "attendance";

$conn = mysqli_connect($dbServer, $dbUName, $dbPass, $dbName);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$sql2="select * from teacher where (email='$email' or phone='$phone');";
$res=mysqli_query($conn,$sql2);

if (!isset($_POST['submit']))
{
echo "Click submit button";
}
else
{
	if (mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_assoc($res);
            if ($email==$row['email'] || $phone==$row['phone'])
            {
                echo "<script>
						alert('Email or phone number already in use');
						window.location.href='../index.php';
						</script>";
            }
            else
            {
                exit();
            }
	}
	else
	{
$sql = "INSERT INTO teacher(name, phone, email, password) VALUES('$name', '$phone', '$email', '$pass');";
mysqli_query($conn, $sql);

$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed))  //if in permitted file extensions
	{
		if ($fileError === 0)   //if zero errors in file
		{
			if ($fileSize<500000)  //if in permitted file size range
			{
			$fileNameNew = $phone.".".$fileActualExt;   //to provide unique name in root folder
			$fileDestination = '../uploads/'.$fileNameNew;   //to provide destination to save the file
			move_uploaded_file($fileTmpName, $fileDestination);   //to move the file

			$sql3 = "UPDATE teacher set imgpath= '$fileNameNew' WHERE email= '$email';";
			mysqli_query($conn, $sql3);
			}
		else 
		{
			echo "File is too big";
		}
		}
		else
		{
			echo "Error uplaoding file";
		}
	}
	else
	{
		echo "You can't upload file of this type";
	}

	echo "<script>
alert('Successfully registered');
window.location.href='../index.php';
</script>";
	
}
}

?>