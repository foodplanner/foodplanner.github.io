<?php
$inputname = $_POST["rec"];

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

$sql = "SELECT RecipeName FROM Menu WHERE RecipeName LIKE '%$inputname%'";
$result = $conn->query($sql);

if($result->num_rows == 0){
	echo $inputname;	
	die("No results!");

	$conn->close();
}

else if($result->num_rows >1){
	//if multiple result, display a list of links
	echo "<td> Try one of these: </td><br>";
	while($row = $result->fetch_assoc()){
		echo "<td>" . $row['RecipeName'] . "</td><br>";
	}
}
else{
	$sql = "SELECT Name, Amount FROM Ingredients WHERE RecipeName = '$inputname'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){

		echo "<td>" . $row['Name'] . "     " . $row['Amount'] . "</td><br>";
	}
}
	
$conn->close();

?>