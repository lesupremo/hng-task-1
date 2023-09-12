<?php
header("Content-Type:application/json");

$slack_name = htmlentities(trim($_GET["slack_name"]));
$track = htmlentities(trim($_GET["track"]));

if (empty($slack_name) && empty($track)) 
{
	$error = array("parameter" => "Invalid Request", "status_code" => 400);
	
	response($error);
}
else
{
	$expected_response = array(
									"slack_name" => $slack_name,
									"current_day" => ucwords(date("l")),
									"utc_time" => gmdate("Y-m-d\TH:i:s\Z"),
									"track" => $track,
									"github_file_url" => "https://github.com/lesupremo/hng-task-1/blob/main/api.php",
									"github_repo_url" => "https://github.com/lesupremo/hng-task-1",
									"status_code" => 200,
								);
								
	response($expected_response);
	
}


function response($details){
	$json_response = json_encode($details);
	echo $json_response;
}
?>

