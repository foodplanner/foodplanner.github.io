<?php
$inputuser = $_POST["username"];
$inputpass = $_POST["password"];
$inputname = $_POST["name"];
$inputdiet = $_POST["diet"];
//$inputpref = $_POST["pref"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
/*$dbuser = "yuehu7_group";
$dbpwd = "CS411";
$db = "yuehu7_Menu";*/
$dbuser = "kim186_user1";
$dbpwd = "cs411";
$db = "kim186_cs411";
//$connection = mysql_connect($dbhost, $dbuser, $dbpwd);


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql =  "INSERT INTO userAccounts(userID, PASSWORD)
VALUES ('$inputuser', '$inputpass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


// Check connection
/*if (!$connection) {
    die("Connection failed: " . $conn->connect_error);
    mysql_close();
} 
@mysql_select_db($db) or ("Database not found");

$sql = "INSERT INTO userAccounts(userID, PASSWORD)
VALUES ('$inputuser', '$inputpass')";

$result = mysql_query($sql);
if(!$result){
	die("Username or password is invalid");
	mysql_close();
}
else{
	echo "Success!!!";
}*/
/*$query = "SELECT * FROM `userAccounts` WHERE `UserID` = `$inputuser";
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
}*/
?>