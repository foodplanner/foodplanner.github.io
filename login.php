<?php
$inputuser = $_POST["user"];
$inputpass = $_POST["password"];

$dbhost = "engr-cpanel-mysql.engr.illinois.edu";
$dbuser = "kim186_user1";
$dbpwd = "cs411";
$db = "kim186_cs411";
$connection = mysql_connect($dbhost, $dbuser, $dbpwd);

// Check connection
if (!$connection) {
	die("Connection failed.");
	mysql_close();
} 
@mysql_select_db($db) or ("Database not found");

$query = "SELECT * FROM userAccounts WHERE UserID = '$inputuser' AND PASSWORD = '$inputpass'";
$result = mysql_query($query);

if(!$result){
	die("Username or password is invalid");
	mysql_close();
}
else{
	echo "<table border='1'>
<tr>
<th>Username</th>
<th>Name</th>
<th>Diet Information</th>
<th>Personal Cuisine Preference</th>
<th>Weight</th>
</tr>";

	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['UserID'] . "</td>";
		echo "<td>" . $row['NAME'] . "</td>";
		echo "<td>" . $row['DIETINFO'] . "</td>";
		echo "<td>" . $row['PREFERENCE'] . "</td>";
		echo "<td>" . $row['WEIGHT'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>