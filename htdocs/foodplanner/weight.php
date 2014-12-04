<?php
$inputuser = $_COOKIE["userid"];
$inputweight = $_POST["weight"];
$inputdate = $_POST["date"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
$dbuser = "kim186_user1";
$dbpwd = "cs411";
$db = "kim186_cs411";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $db);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql =  "INSERT INTO UserWeight(UserID, Weight, Date)
	VALUES ('$inputuser', '$inputweight', '$inputdate')";

if ($conn->query($sql) === TRUE) {
	setcookie("userid", $inputuser, time() + (86400 * 30), "/");
	header("Location: profile.php");
} 
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


?>