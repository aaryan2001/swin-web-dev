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
$dayseng = array ("sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday");
echo "<p>the days of the week in english are:</p>";
print_r($dayseng);
$daysfren = array ("Dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
echo "<p>the days of the week in french are:</p>";
print_r($daysfren);
?>
</body>
</html>
