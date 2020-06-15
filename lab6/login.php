<!DOCTYPE html>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script>
		  $(function () {
			$('form').bind('submit', function () {
			  $.ajax({
				type: 'post',
				url: 'user_get.php',
				data: $('form').serialize(),
				success: function(data) {
								location.href = "main.php";
							},
				error: function(data){
								alert("Invalid username/password combination!");
							}
				});
			  });
			});
		</script>
	</head>
	<body>
		<form method="post">
			Username: <input type="text" name="uname" />
			Password: <input type="password" name="pass" />
			<input type="submit" />
		</form>
		
	</body>
</html>