<?php
$counter = 0;
$UserID = $_COOKIE['userid'];//get whatever user id is current
$maxCalories = $_POST["num"];//get the max Calories from user input
$userDiet = $_POST["pref"];//get the users preference
$inputuser = $_COOKIE["userid"];

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

$sql = "SELECT DIETINFO FROM userAccounts WHERE userID = '$UserID'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$diets = $row['DIETINFO'];
}

if($diets == 'Non-vegetarian'){
	if($userDiet == 'any'){
		$sql = "SELECT Menu.RecipeName, Menu.Calories FROM Menu WHERE Menu.Calories < '$maxCalories'";
	}
	else{
		$sql = "SELECT Menu.RecipeName, Menu.Calories FROM Menu WHERE Menu.Calories < '$maxCalories' 		AND Menu.Preference = '$userDiet'";
	}
}


else if($userDiet == 'any'){
	$sql = "SELECT  Menu.RecipeName, Menu.Calories
		FROM userAccounts 
		Inner JOIN Menu
		ON userAccounts.DIETINFO = Menu.DietInfo 
		WHERE Menu.Calories < '$maxCalories' AND userAccounts.userID = '$UserID'";
}
else{
	$sql = "SELECT  Menu.RecipeName, Menu.Calories
	FROM userAccounts 
	Inner JOIN Menu
	ON userAccounts.DIETINFO = Menu.DietInfo 
	WHERE Menu.Calories < '$maxCalories' AND userAccounts.userID = '$UserID' AND Menu.Preference = 		'$userDiet'";

}
$result = $conn->query($sql);
if($result->num_rows == 0){
	die("No results");
}

$sqluser = "SELECT * FROM userAccounts WHERE UserID = '$inputuser'";
$result2 = $conn->query($sqluser);
$row2 = $result2->fetch_assoc();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>FoodPlanner</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<!-- Bootstrap -->
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
					<a class="navbar-brand logo" href="index.php">FOODPLANNER</a>
				</div>
				<div class="collapse navbar-collapse" id="collapse">
					<ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="search.php">Search Recipe</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $row2['NAME']?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="profile.php">My Profile</a></li>
								<li class="divider"></li>
								<li><form method="POST" action="signout.php">
									<input class="nsbtn" type="submit" value="Log Out">
									</form></li>
							</ul>
						</li>
						<li><a></a></li>
						<li><a></a></li>
					</ul> 
				</div>
			</nav>
		</div>		
		<div class="square4">
			<h1>Try One of These:</h1>
			<?php
	while($row = $result->fetch_assoc()){
	echo '<p><a href="recipe_detail.php?recname='.$row["RecipeName"].'">'.$row["RecipeName"].": " . $row["Calories"]  . ' cal</a></p>';

}
			?>
		</div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="js/lightbox.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			window.onload = showname;
			window.onload = showpref;
			var images = ["bg1.jpg", "bg2.jpg", "bg3.jpg", "bg4.jpg"];
			$(".bimg").css({"background-image": "url(img/" + images[Math.floor(Math.random() * images.length)] + ")"});
		</script>
	</body>
</html>