<!DOCTYPE html>
<html>
<body>
	<?php
		$con = mysqli_connect("localhost", "root", "root", "html");
		$name=$_POST["uname"];
		$pass=$_POST["pass"];
		if(!$con)
			{
				die('Could not connect: '.mysqli_connect_error());
			}
		$res = mysqli_query($con, "SELECT * FROM users where username='".$name."' and password='".$pass."'");
		if(mysqli_num_rows($res)==0)
			{
				header("HTTP/1.0 404 Not Found");
				exit();
				die('No such user!');
			}
		mysqli_close($con);
	?>
		
</body>
</html>