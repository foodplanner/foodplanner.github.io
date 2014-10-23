<?php
$inputuser = $_POST["user"];
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

$query = "SELECT UserID,PASSWORD FROM userAccounts WHERE UserID = $inputuser AND PASSWORD = $inputpass";
//$querypass = "SELECT UserID,PASSWORD FROM userAccounts WHERE PASSWORD = $inputpass";

$result = mysql_query($query);
//$resultpass = mysql_query($querypass);

//$row = mysql_fetch_array($result,MYSQL_BOTH);
//$rowpass = mysql_fetch_array($resultpass,MYSQL_BOTH);

//$serveruser = $row["UserID"];
//$serverpass = $row["PASSWORD"];

//if($serveruser && $serverpass){
	if(!$result){
		die("Username or password is invalid");
		mysql_close();
	}
	else{
		header('Location: profile.html');
	}
	/*if($inputpass == $serverpass){
		header('Location: profile.html');
	}
	else{
		echo "Sorry, bad login";
	}*/

?>