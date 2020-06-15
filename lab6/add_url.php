<!DOCTYPE html>
<html>
<body>
	<?php
		$con = mysqli_connect("localhost", "root", "root", "html");
		$url=$_POST["url"];
		$desc=$_POST["desc"];
		$cat=$_POST["cat"];
		ob_start();
		var_dump($cat);
		error_log(ob_get_clean(), 4);
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
		$sql = "insert into urls (url, description, category) values ('".$url."', '".$desc."', '".$cat."');";
		if ($con->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
		mysqli_close($con);
	?>
		
</body>
</html>