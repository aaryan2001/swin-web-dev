<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>use factorial php</title>
    <meta name="description" content="Demonstrates php layout" />
  <meta name="keywords" content="HTML5, php" />
  <meta name="author" content="Aaryan"  />
</head>
<body>
<?php 
	include ("mathfunctions.php");
?>
	<h1>creating web apps - lab08 </h1>
<?php
	if(isset($_GET["number"])) {
		$num = $_GET["number"];
		if (isPositiveInteger($num)) {
		echo "<p>", $num, "! is ", factorial ($num), ".</p>";
		} else {
		echo "<p>please enter a positive integer.</p>";
		}
	echo "<p><a href='factorial.html'> return to entry page</a></p>";
}
?>
</body>
</html>

