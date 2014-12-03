<?php
$inputing = $_POST["ing"];
$inputint = $_POST["extra"];
	
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

$ingArray = explode(",", $inputing);
foreach ($ingArray as &$ingString){
	$ingString = str_replace(' ', '', $ingString);
}

$finalVector = array();
$tempVector = array();

$sql = "SELECT DISTINCT RecipeName FROM Ingredients WHERE Name LIKE '%$ingArray[0]%'";

$result = $conn->query($sql);

if($result->num_rows == 0){

	//FRONT END - ECHO STUFF
	die("No results");
}

while($row = $result->fetch_assoc()){
	array_push($finalVector,$row["RecipeName"]);
}

foreach($ingArray as &$ingString){
	
	$sql = "SELECT DISTINCT RecipeName FROM Ingredients WHERE Name LIKE '%$ingString%'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		array_push($tempVector,$row["RecipeName"]);
	}
	/*echo $ingString . "<br>";
	*/
	$numiterations = sizeof($finalVector);
	for($i = 0; $i<$numiterations;$i++){
		$tempRecipe = array_shift($finalVector);
		if(in_array($tempRecipe,$tempVector)){
			
			array_push($finalVector,$tempRecipe);			
		} 	
	}

	$tempVector = array(); //empty the vector
}

// at this point, final vector is ok

if($inputint != -1){
	$countArray = array();
	foreach($finalVector as &$ingString){
		$sql = "SELECT COUNT(*) as countNumber FROM Ingredients WHERE RecipeName = '$ingString'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$countNumber = $row['countNumber'];
		}

		array_push($countArray,intval($countNumber));
	}
	$iterator = sizeof($finalVector);
	for($i = 0; $i<$iterator; $i++){
		if($countArray[intval($i)] > (intval($inputint) + intval(sizeof($ingArray)))){
			$finalVector[$i] = False;
		}	

	}		
	for($i = 0; $i<$iterator; $i++){
		$placeholder = array_shift($finalVector);
		if($placeholder){
			array_push($finalVector,$placeholder);
		}	

	}

	
}

if(sizeof($finalVector) == 0){
	echo "No results";
}

else{
	foreach($finalVector as &$itemthing){
		echo $itemthing . "<br>";
	}
}
echo sizeof($finalVector);


$conn->close();

?>