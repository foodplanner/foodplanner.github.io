<?php
$inputuser = $_POST["username"];
$inputpass = $_POST["password"];
$inputname = $_POST["name"];
$inputdiet = $_POST["diet"];

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

$sql = "SELECT COUNT(*) as countNumber FROM userAccounts WHERE userAccounts.UserID = '$inputuser'";
$result = $conn->query($sql);
$count = '';
while($row = $result->fetch_assoc()){
	$count = $row['countNumber'];
}

if($count == '0'){
	$sql =  "INSERT INTO userAccounts(userID, PASSWORD, NAME, DIETINFO)
	VALUES ('$inputuser', '$inputpass', '$inputname', '$inputdiet')";

if ($conn->query($sql) === TRUE) {
	setcookie("userid", $inputuser, time() + (86400 * 30), "/");
    header("Location: profile.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else{
	echo "Already Exists";
}
$conn->close();

?>