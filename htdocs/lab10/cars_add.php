<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="desc" content="Creating web apps Lab 10" />
  <meta name="keywords" content="PHP, MySql" />
  <title>php</title>
</head>
<body>
  <h1>Creating Web Apps - Lab 10</h1>
  <?php
    require_once("settings.php");
    $conn=mysqli_connect($host, $user, $pwd, $sql_db);
    if(!$conn){
      echo "<p>Database connection failure</p>";
    }
    else{
      $sql_table="cars";
      if(isset($_POST['carmake'])){
      $make = $_POST["carmake"];
      $model = trim($_POST["carmodel"]);
      $price = trim($_POST["price"]);
      $yom = trim($_POST["yom"]);
    }
    else{
      echo "<p>not set</p>";
    }

      $query = "INSERT INTO $sql_table(make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
      $result = mysqli_query($conn, $query);
      if(!$result){
        echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
      }
      else{
        echo "<p class=\"ok\">Successfully added new car record</p>";
        require_once("cars_display.php");
      }
      mysqli_close($conn);
    }
  ?>
</body>
</html>
