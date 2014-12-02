<?php
$inputname = $_POST["rec"];
$inputcurr = $_POST["ing"];
$inputnew = $_POST["new"];
//$inputpref = $_POST["pref"];

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

$query = "SELECT * FROM userAccounts WHERE UserID = '$inputuser' AND PASSWORD = '$inputcurr'";

if($conn->query($query) === FALSE){
	die("Username or password is invalid");
	$conn->close();
}
else{
	$change = "UPDATE userAccounts SET PASSWORD='$inputnew'
WHERE UserID='$inputuser'";
	if($conn->query($change) === TRUE){
		echo "Password changed sussessfully";
	}
	else{
		die("Unknow Error!!");
		$conn->close();
	}
}

$conn->close();

?>