<?php
session_start();
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
	$choString = "";
	while($row = $result->fetch_assoc()){
		if($choString == "")
			$choString = $row['RecipeName'];
		else
			$choString = $choString . "," . $row['RecipeName'];
	}
	$_SESSION["choices"] = $choString;

	header("Location: multi_choices.php");
}
else{
	$_SESSION["curr_recipe"] = $inputname;
	header("Location: recipe_detail.php?recname=$inputname");
}
	
$conn->close();

?>
