<!DOCTYPE html>
<html>
<body>
	<?php
		$con = mysqli_connect("localhost", "root", "root", "html");
		$url=$_POST["url"];
		if(!$con)
			{
				die('Could not connect: '.mysqli_connect_error());
			}
		if($url=="")
		{
			header("HTTP/1.0 404 Not Found");
			exit();
			die('BAD');
		}
		$sql = "delete from urls where url='".$url."';";
		if ($con->query($sql) === TRUE) {
			echo "Delete successful.";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
		mysqli_close($con);
	?>
		
</body>
</html>