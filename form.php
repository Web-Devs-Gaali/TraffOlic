<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
<?php
// Create connection
$con = mysqli_connect('localhost','root','','registration'); 

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>  

<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$name = $email = $gender = $contact = $carnum = $carcolor = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $contact = test_input($_POST["contact"]);
  $carnum = test_input($_POST["carnum"]);
  //$gender = test_input($_POST["gender"]);
  $carcolor = test_input($_POST["carcolor"]);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Welcome User</h2>
<h3>Please enter details</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Contact: <input type="text" name="contact">
  <br><br>
  Carnum: <input type="text" name="contact">
  <br><br>
  Carcolor: <input type="text" name="contact">
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<!--
<?php
//echo "<h2>Your Input:</h2>";
//echo $name;
//echo "<br>";
//echo $email;
//echo "<br>";
//echo $website;
//echo "<br>";
//echo $comment;
//echo "<br>";
//echo $gender;
?>-->

</body>
</html>