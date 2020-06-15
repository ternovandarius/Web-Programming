<!DOCTYPE html>
<html>
<body>
	<?php
		$con = mysqli_connect("localhost", "root", "root", "html");
		$url=$_POST["url"];
		$desc=$_POST["desc"];
		$cat=$_POST["cat"];
		if(!$con)
			{
				die('Could not connect: '.mysqli_connect_error());
			}
		if($url=="" or $desc=="" or $cat=="")
		{
			header("HTTP/1.0 404 Not Found");
			exit();
			die('BAD');
		}
		$sql = "update urls set description='".$desc."' where url='".$url."';";
		if ($con->query($sql) === TRUE) {
			echo "Update successful.";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
		mysqli_close($con);
	?>
		
</body>
</html>