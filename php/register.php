<?php

$dbServer = "localhost";
$dbUName = "root";
$dbPass = "";
$dbName = "attendance";

$conn = mysqli_connect($dbServer, $dbUName, $dbPass, $dbName);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$purpose = $_POST['purpose'];

if (!isset($_POST['submit']))
{
echo "Click submit button";
}
else
{
$sql = "INSERT INTO visitors(name, mobile, email, purpose) VALUES('$name', '$phone', '$email', '$purpose');";
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
			$fileNameNew = $name.".".$fileActualExt;   //to provide unique name in root folder
			$fileDestination = '../uploads/'.$fileNameNew;   //to provide destination to save the file
			move_uploaded_file($fileTmpName, $fileDestination);   //to move the file
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
alert('Thank you... You will be confirmed about appointment soon on your email.');
window.location.href='../teacher.php';
</script>";
	
}

?>