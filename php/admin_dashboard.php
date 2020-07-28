<?php

include '../dbh.php';

if (isset($_POST['accept']))
{	
	$email = $_POST['email'];
	$sql1 = "UPDATE visitors SET ekey=1 WHERE email='$email';";
	mysqli_query($conn, $sql1);
	header("Location: ../admin.php");
}
elseif (isset($_POST['decline'])) 
{
	$email = $_POST['email'];
	$sql2 = "DELETE FROM visitors WHERE email= '$email';";
	mysqli_query($conn, $sql2);
	header("Location: ../admin.php");
}
elseif (isset($_POST['none'])) 
{
	$email = $_POST['email'];
	$sql3 = "UPDATE visitors SET ekey=0 WHERE email='$email';";
	mysqli_query($conn, $sql3);
	header("Location: ../admin.php");
}
else
{
	echo "";
}

?>