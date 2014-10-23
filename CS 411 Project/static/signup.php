<?php
$inputuser = $_POST["username"];
$inputpass = $_POST["password"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
$dbuser = "yuehu7_group";
$dbpwd = "CS411";
$db = "yuehu7_Menu";
$connection = mysql_connect($dbhost, $dbuser, $dbpwd);

// Check connection
if (!$connection) {
    die("Connection failed: " . $conn->connect_error);
    mysql_close();
} 
@mysql_select_db($db) or ("Database not found");

$query = "SELECT * FROM `userAccounts` WHERE `UserID` = `$inputuser";
$querypass = "SELECT * FROM `userAccounts` WHERE `PASSWORD` = `$inputpass";

$result = mysql_query($query);
$resultpass = mysql_query($querypass);

if(!$result){
	die("Username or password is invalid");
	mysql_close();
}

$row = mysql_fetch_array($result);
$rowpass = mysql_fetch_array($resultpass);

$serveruser = $row["user"];
$serverpass = $row["password"];

if($serveruser && $serverpass){
	if($inputpass == $serverpass){
		header('Location: profile.html');
	}
	else{
		echo "Sorry, bad login";
	}
}
?>