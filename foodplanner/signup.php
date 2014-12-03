<?php
$inputuser = $_POST["username"];
$inputpass = $_POST["password"];
$inputname = $_POST["name"];
$inputdiet = $_POST["diet"];
$inputpref = "";
$inputcheck = $_POST['ic'];
if(!empty($inputcheck)){
	$N = count($inputcheck);
	for($i=0; $i < $N; $i++){
    	$inputpref = $inputpref . $inputcheck[$i] . " ";
	}
}

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

$sql =  "INSERT INTO userAccounts(userID, PASSWORD, NAME, DIETINFO, PREFERENCE)
VALUES ('$inputuser', '$inputpass', '$inputname', '$inputdiet', '$inputpref')";

if ($conn->query($sql) === TRUE) {
	setcookie("userid", $inputuser, time() + (86400 * 30), "/");
    header("Location: profile.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>