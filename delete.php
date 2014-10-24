<?php
$inputuser = $_POST["user"];
$inputpass = $_POST["password"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
$dbuser = "kim186_user1";
$dbpwd = "cs411";
$db = "kim186_cs411";
$connection = mysql_connect($dbhost, $dbuser, $dbpwd);

// Check connection
if (!$connection) {
    die("Connection failed.");
    mysql_close();
} 
@mysql_select_db($db) or ("Database not found");

$query = "DELETE FROM userAccounts WHERE UserID = '$inputuser' AND PASSWORD = '$inputpass'";

$result = mysql_query($query);

if(!$result){
	die("Username or password is not correct");
	mysql_close();
}
else{
	header('Location: index.html');
}

?>