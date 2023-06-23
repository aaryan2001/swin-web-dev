<?php
session_id('data');
session_start();
require_once ("settings.php");
//connection info
$conn = @mysqli_connect($host,
$user,
$pwd,
$sql_db
);

// Checks if connection is successful
if (!$conn) {
// Displays an error message
echo "<p>Database connection failure</p>";//not in production script
} else {

$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$ST_ID = htmlspecialchars($_POST["ST_ID"]);
$gender = htmlspecialchars($_POST["gender"]);
$q1 = htmlspecialchars($_POST["sgml"]);
$q2 = htmlspecialchars($_POST["xml"]);
$q3 = htmlspecialchars($_POST["droplist"]);
$q4 = htmlspecialchars($_POST["part"]);
$q52 = htmlspecialchars($_POST["sgml-xml-html2"]);
$q53 = htmlspecialchars($_POST["sgml-xml-html3"]);
$q6 = htmlspecialchars($_POST["view"]);
$msg = htmlspecialchars($_POST["message"]);

$_SESSION["ST_ID"] = $ST_ID;

$sql = "SELECT * FROM users WHERE ST_ID = '$ST_ID';";

$result = mysqli_query($conn, $sql);

$count=mysqli_num_rows($result);

if($count==1){

echo "<p class=\"wrong\">ID already used. </p>";
}

else
{

$sql_table = 'users';

$query = "insert into $sql_table (firstname, lastname, ST_ID, gender) values ('$firstname', '$lastname', '$ST_ID', '$gender')";

$result = mysqli_query($conn, $query);


if(!$result) {
echo "<p class=\"wrong\">Something isnt right in ", $query, "</p>";
} 
else {
echo "<p class=\"ok\">Successfully added user</p>";
}
}
$date = date("Y-m-d");

$score = 0;

if($q1 != null){if($q1 == 'Standard Generalized Markup Language'){$score += 1;}}
if($q2 != null){if($q2 == 'extensible markup language'){$score += 2;}}
if($q3 != null){if($q3 == "false1"){$score += 2;}}
if($q4 != null){if($q4 == "true2"){$score += 2;}}
if($q52 != null){if($q52 == "xml"){$score += 1;}}
if($q53 != null){if($q53 == "html"){$score += 1;}}
if($q6 != null){if($q6 == "sgml"){$score += 2;}}

$query2 = "CREATE TABLE IF NOT EXISTS `attempts` (
  `Attempt ID` int(11) NOT NULL AUTO_INCREMENT,
  `ST_ID` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`Attempt ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7;";

$result2 = mysqli_query($conn, $query2);

$sql_table = 'attempts';

$query = "insert into $sql_table (ST_ID, Score, Date, Time) values ('$ST_ID', '$score', '$date', NOW())";
$result = mysqli_query($conn, $query);
if(!$result) {
echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
}
else {
echo "<p class=\"ok\">Successfully added user to database</p>";
header("Location: results.php");
}
mysqli_close($conn);
}

?>