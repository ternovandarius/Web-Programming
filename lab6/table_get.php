<?php
	header('Content-Type: application/json');
	$con = mysqli_connect("localhost", "root", "root", "html");
	$offset=$_GET["offset"];
	if(!$con)
		{
			die('Could not connect: '.mysqli_connect_error());
		}
	$return_array = array();
	$res = mysqli_query($con, "SELECT * FROM urls order by category limit ".$offset.", 4;");
	while($row = mysqli_fetch_array($res))
	{
		$url=$row['url'];
		$desc=$row['description'];
		$cat=$row['category'];
		
		$return_array[] = array("url" => $url, "desc" => $desc, "cat" => $cat);
	}
	mysqli_close($con);
	echo json_encode($return_array);
?>