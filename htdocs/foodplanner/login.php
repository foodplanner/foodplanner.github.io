<?php
$inputuser = $_POST["user"];
$inputpass = $_POST["password"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
$dbuser = "kim186_user1";
$dbpwd = "cs411";
$db = "kim186_cs411";
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT NAME FROM userAccounts WHERE UserID = '$inputuser' AND PASSWORD = '$inputpass'";
$result = $conn->query($sql);

if($result->num_rows == 0){
	die("Username or password is invalid");
	mysql_close();
}
else{
	setcookie("userid", $inputuser, time() + (86400 * 30), "/");
    header("Location: index.php");
}

?>