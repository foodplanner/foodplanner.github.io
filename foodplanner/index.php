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

if(isset($inputuser)) 
{?>
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $row['NAME']?><span class="caret"></span></a>
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

		<div class="square5">
			<form role="form" method="POST" action="findsuggestion.php">
				<div class="suggest">
					<label for="calories">Calories</label>
					<input type="number" placeholder="eg. 500" name="num" required>
					<label for="pref"> Preference</label>
					<select name="pref" required>
						<option value="any">ANY</option>
						<option value="African">African</option>
						<option value="American">American</option>
						<option value="Asian">Asian</option>
						<option value="European">European</option>
						<option value="Oceanian">Oceanian</option>
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
</html>
<?php
} 
else 
{
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
						<li><a class="active" href="index.php">Home</a></li>
					</ul> 
				</div>
			</nav>
		</div>
		<div class="square">
			<div class="smlsq"><p>BETA</p></div>
			<br><br><br>
			<h1>FOODPLANNER</h1>
			<p>Menu, re-imagined.</p>
			<form method="POST" action="login.php">
				<div class="login">
					<input class="len" type="text" placeholder="username" name="user"><br>
					<input class="len2" type="password" placeholder="password" name="password"><br>
					<input class="lbtn" type="submit" value="Login">
					<input type="button" value="Sign Up" onclick="location.href = 'signup.html'">
				</div>
			</form>
		</div>
		<br>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="js/lightbox.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			var images = ['bg1.jpg', 'bg2.jpg', 'bg3.jpg', 'bg4.jpg'];
			$('.bimg').css({'background-image': 'url(img/' + images[Math.floor(Math.random() * images.length)] + ')'});
		</script>
	</body>
</html>
<?php
} 

?>

