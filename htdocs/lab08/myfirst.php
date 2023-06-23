<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>use php</title>
    <meta name="description" content="Demonstrates php layout" />
  <meta name="keywords" content="HTML5, php" />
  <meta name="author" content="Aaryan"  />
</head>
<body>
	<h1>creating web apps - lab08 </h1>
<?php
$marks = array (85, 85, 95);
$marks[1] = 90;
$ave = ($marks[0] + $marks[1] + $marks[2])/3;
if($ave >= 50)
	$status = "passed";
else
	$status = "failed";
echo "<p>the average score is $ave. you $status.</p>"
?>
</body>
</html>