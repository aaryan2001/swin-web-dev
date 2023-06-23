<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>use factorial php</title>
    <meta name="description" content="Demonstrates php layout" />
  <meta name="keywords" content="HTML5, php" />
  <meta name="author" content="Aaryan"  />
</head>
<body>
<h1> lab 10 </h1>
<?php 
	require_once ("settings.php");
		$conn = @mysqli_connect($host,
				$user,
				$pwd,
				$sql_db
			);
	if (!$conn) {
		echo "<p> connection faliure </p>";
	} 
	else {
		$sql_table="cars";
		$query = "select make, model, price FROM cars ORDER BY make, model";
		$result = mysqli_query($conn, $query);
		if (!$result) {
		echo "<p> something is wrong with ", $query, "</p>";
		} 
		else {
			echo "<table border=\"1\">\n";
			echo "<tr>\n "
			."<th scope=\"col\"> make</th>\n "
			."<th scope=\"col\"> model</th>\n "
			."<th scope=\"col\"> price</th>\n "
			."</tr>\n ";
		}
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>\n ";
				echo "<td>",$row["make"],"</td>\n ";
				echo "<td>",$row["model"],"</td>\n ";
				echo "<td>",$row["price"],"</td>\n ";
				echo "</tr>\n ";
			}
			echo "</table>\n ";
			mysqli_free_result($result);
			mysqli_close($conn);
?>
</body>
</html>
				
			
