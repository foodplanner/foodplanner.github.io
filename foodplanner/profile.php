<?php
$inputuser = $_COOKIE["userid"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
$dbuser = "kim186_user1";
$dbpwd = "cs411";
$db = "kim186_cs411";
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM userAccounts WHERE UserID = '$inputuser'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>

<html>
<head>
	<meta charset="utf-8">
	<title>FoodPlanner</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<!-- Bootstrap -->
	<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css">	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet" type="text/css" media="screen"/>

	<script src="js/respond.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script src="js/showuserinfo.js"></script>
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
				<a class="navbar-brand logo">FOODPLANNER</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="profile.php">My Profile</a></li>
					<li><a href="search.html">Search Recipe</a></li>
					<li><a href="suggestion.html">Need Suggestion</a></li>
				</ul> 
			</div>
		</nav>
	</div>
	<div class="square">
		<div class="row">
			<h2> Welcome back, <?php echo $row['NAME']?></h2>
			
				<p>UserID: <?php echo $inputuser;?></p>
				<p>Personal Preference: <?php echo $row['PREFERENCE'];?></p>
				<p>Diet Info: <?php echo $row['DIETINFO'];?></p>
				<a href="delete.html">Delete Account</a><br>
				<a href="password.html">Change Password</a>

		</div>
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