<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_line.php');

$inputuser = $_COOKIE["userid"];

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

$sql = "SELECT Weight, Date FROM UserWeight WHERE UserID = '$inputuser'";
//echo $sql;
$sql.= "ORDER BY Date ASC";

$result = mysqli_query($conn,$sql);

if($result->num_rows==0){
	die("No Results");
}

$xdata = array();
$ydata = array();
while($row=mysqli_fetch_array($result)){
	$date = date_create($row["Date"]);
	$xdata[] = date_format($date," h:i a");
	$ydata[] = $row["Weight"];
}

$graph = new Graph(500,300); //Init Graph
$graph->SetScale("intlin");
$graph->SetMargin(55,30,30,30);

$graph->title->Set("Weight Over Time");
$graph->yaxis->SetTitleMargin(40);

$graph->subtitle->Set("Last 7 days");
$graph->subtitle->SetColor('black');
$graph->xgrid->Show();

$graph->yaxis->title->Set("Weight");
$graph->yaxis->SetLabelAlign('right','bottom');

//create linear plot
$lineplot = new Lineplot($ydata);
$lineplot->SetColor('blue');

//add the plot to the graph
$graph->Add($lineplot);

//Display the graph
$graph->Stroke();

mysqli_free_result($result);
mysqli_close($result);

?>