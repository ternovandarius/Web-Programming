<!DOCTYPE html>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script> -->initialize table
			var offset=0;
			$(document).ready(function(){
				$.ajax({
					url: 'table_get.php',
					type: 'get',
					data: ({"offset":offset}),
					dataType: 'json',
					success: function(response){
						$("#myTable tbody").empty();
						var len = response.length;
						for(var i=0; i<len; i++)
						{
							var url = response[i].url;
							var desc = response[i].desc;
							var cat = response[i].cat;
							
							var tr_str = "<tr>" + "<td>"+url+"</td>" + "<td>" + desc +"</td>" + "<td>" + cat +"</td></tr>";
							$("#myTable tbody").append(tr_str);
						}
					},
					error: function (req, status, err) {
						console.log('Something went wrong', status, err);
					}
				});
			});
			-->forward button function
			$(document).on('click', '#forward', function(e){
				offset=offset+4;
				$.ajax({
					url: 'table_get.php',
					type: 'get',
					data: ({"offset":offset}),
					dataType: 'json',
					success: function(response){
						var len = response.length;
						$("#myTable tbody").empty();
						if(len<4) {offset=offset-4;}
						for(var i=0; i<len; i++)
						{
							var url = response[i].url;
							var desc = response[i].desc;
							var cat = response[i].cat;
							
							var tr_str = "<tr>" + "<td>"+url+"</td>" + "<td>" + desc +"</td>" + "<td>" + cat +"</td></tr>";
							$("#myTable tbody").append(tr_str);
						}
					}
				});
			});
			-->back button function
			$(document).on('click', '#back', function(e){
				offset=offset-4;
				if(offset<0){offset=0};
				$.ajax({
					url: 'table_get.php',
					type: 'get',
					data: ({"offset":offset}),
					dataType: 'json',
					success: function(response){
						var len = response.length;
						$("#myTable tbody").empty();
						for(var i=0; i<len; i++)
						{
							var url = response[i].url;
							var desc = response[i].desc;
							var cat = response[i].cat;
							
							var tr_str = "<tr>" + "<td>"+url+"</td>" + "<td>" + desc +"</td>" + "<td>" + cat +"</td></tr>";
							$("#myTable tbody").append(tr_str);
						}
					}
				});
			});
		</script>
		<script> -->add button function
			$(document).on('click', '#add', function(e){
				e.preventDefault();
				var form=$("#myForm").serialize();
				$.ajax({
					type: 'post',
					url: 'add_url.php',
					data: form,
					success: function(data) {
									alert("Added successfully!");
								},
					error: function(data){
									alert("Invalid combination!");
								}
				});
			});
		</script>
		<script> -->delete button function
			$(document).on('click', '#delete', function(e){
				e.preventDefault();
				var form=$("#myForm").serialize();
				$.ajax({
					type: 'post',
					url: 'delete_url.php',
					data: form,
					success: function(data) {
									alert("Deleted successfully!");
								},
					error: function(data){
									alert("Invalid combination!");
								}
				});
			});
		</script>
		<script> -->update url button function
			$(document).on('click', '#updateURL', function(e){
				e.preventDefault();
				var form=$("#myForm").serialize();
				$.ajax({
					type: 'post',
					url: 'update_url.php',
					data: form,
					success: function(data) {
									alert("Updated successfully!");
								},
					error: function(data){
									alert("Invalid combination!");
								}
				});
			});
		</script>
		<script> -->update desc button function
			$(document).on('click', '#updateDesc', function(e){
				e.preventDefault();
				var form=$("#myForm").serialize();
				$.ajax({
					type: 'post',
					url: 'update_desc.php',
					data: form,
					success: function(data) {
									alert("Updated successfully!");
								},
					error: function(data){
									alert("Invalid combination!");
								}
				});
			});
		</script>
	</head>
	<body>
		<div class="table">
			<table id="myTable" border="1">
				<thead>
					<tr>
						<th>URL</th>
						<th>Description</th>
						<th>Category</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<button id="back"><</button>
		<button id="forward">></button>
		<form name="myForm" id="myForm" method="post">
			URL: <input type="text" name="url" />
			Description: <input type="text" name="desc" />
			Category: <input type="text" name="cat" />
		</form>
		<button id="add">Add</button>
		<button id="delete">Delete</button>
		<button id="updateURL">Update URL of description</button>
		<button id="updateDesc">Update desc of URL</button>
	</body>
</html>