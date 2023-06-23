<?php
session_id('data');
session_start();
require_once ("settings.php");

$conn = @mysqli_connect($host,
$user,
$pwd,
$sql_db
);

$ST_ID = $_SESSION["ST_ID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="SGML and XML" /> 
  <meta name="keywords" content="HTML, CSS, JAVASCRIPT" />
  <meta name="author" content="aaryan" />
  <title>welcome to SGML and XML</title>
  <link href= "styles/sgml.css" rel="stylesheet"/>
</head>

<body>

	<header>
	<img src= "images/sgml-xml-html.png" id="logo" alt="logo"/>
	<h1> INTRODUTION to SGML and XML </h1>
  <nav>
    <a href="index.php" class="menu" target="_blank" title="open index page">INTRO</a>
    <a href="topic.php" class="menu" target="_blank" title="topic">TOPIC</a>
    
    <a href="quiz.php" class="menu" target="_blank" title="QUIZ">QUIZ</a>
    <a href="enhancement.html" class="menu" target="_blank" title="enhancement">ENHANCEMENTS</a>
    <a href="enhancement2.html" class="menu" target="_blank" title="enhancement">ENHANCEMENTS2</a>
  </nav>
  </header>
  <br>
  <hr>
     
      <h1>
      Results
      </h1>
      
    <form> 
    Name:<input type="text" name="name" id="name"/>
    </form>
    <form> 
    Score:<input type="text" name="score" id="score"/>
    </form>
    
    <?
    if (!$conn) {

    echo "<p>Database connection failure</p>";
    } 
    else {
    $sql = "SELECT Score, Date, Time FROM attempts WHERE ST_ID = '$ST_ID' ORDER BY Date AND Time DESC;";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
      echo  " - Score: " . $row["Score"]. " " . $row["Date"]. " " . $row["Time"]. "<br>";
    }
    } else {
    echo "0 results";
    }
    if(!$result) {
    echo "<p class=\"wrong\">Something is wrong with ", $sql, "</p>";

    }

mysqli_close($conn);
}
    
    ?>
    </header>
  <br>
  <hr>
<footer> <a href="mailto:102599490@swin.edu.au">STUDENT EMAIL : 102599490@swin.edu.au </a></footer>
</body>
</html> 
