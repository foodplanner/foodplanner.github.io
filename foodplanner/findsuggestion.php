<?php

$UserID = $_COOKIE['userid'];//get whatever user id is current
$maxCalories = $_POST["num"];//get the max Calories from user input
$userDiet = $_POST['diet'];//get the users preference


//Suggested menu items

//All the connection stuff gets set up here

//Diet information Vegetarian, Non-vegetarian, Vegan
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
//$sql = "SELECT  Menu.RecipeName,Menu.Calories FROM Menu INNER JOIN UserInformation ON UserInformation.Preference = Menu.Preference WHERE Menu.Calories < '$maxCalories'
// AND Menu.DietInfo = '$userDiet' AND UserInformation.UserID = '$userID' GROUP BY Menu.RecipeName";
$sql = "SELECT  Menu.RecipeName, Menu.Calories
		FROM userAccounts 
		Inner JOIN Menu
		ON userAccounts.Preference = Menu.Preference 
		WHERE Menu.Calories < '$maxCalories' AND userAccounts.userID = '$UserID'";
$result = $conn->query($sql);
if($result->num_rows == 0){
	die("No results");
}
$counter=0;
while($row = $result->fetch_assoc()){
	echo $row["RecipeName"] . "---" . $row["Calories"]  . "<br>";
	$counter++;

}
echo $counter;

?>



<!--<html>
<head>
	<meta charset="utf-8">
	<title>FoodPlanner</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet" type="text/css" media="screen"/>

	<script src="js/respond.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type='text/javascript' src='js/custom.js'></script>
</head>
<body>
	<div class="bimg"></div>
	<div class="row">
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="glyphicon glyphicon-arrow-down"></span>
					MENU
				</button>
				<a class="navbar-brand logo" href="index.html">FOODPLANNER</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="profile.html">My Profile</a></li>
					<li><a href="search.html">Search Recipes</a></li>
					<li><a href="suggestion.html">Need Suggestion</a></li>
				</ul> 
			</div>
		</nav>
	</div>

	<div class="square3">
		
		<form role="form" method="POST" action="findsuggestion.php">
			<div class="suggest">
				<label for="calories">Calories</label>
				<input type="number">
				<label for="diet">Diet Info</label>
				<select name="diet" required>
					<option value="Non-vegetarian">Non-vegetarian</option>
					<option value="Vegetarian">Vegetarian</option>
					<option value="Vegan">Vegan</option>
				</select>
				<input type="submit" value="Give me some suggestions">
			</div>
			<div class="smlsq"><p>Suggestion</p></div>
		</form>
	</div>

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		var images = ['bg1.jpg', 'bg2.jpg', 'bg3.jpg', 'bg4.jpg'];
		$('.bimg').css({'background-image': 'url(img/' + images[Math.floor(Math.random() * images.length)] + ')'});
	</script>
</body>
</html>-->