
<?php
// Create connection
$con = mysqli_connect('localhost','root','','registration'); 

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else{
  echo "Connected to Database";
}
?>  

<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$contact = $carnum = $carcolor = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//$name = test_input($_POST["name"]);
 //$email = test_input($_POST["email"]);
  $contact = test_input($_POST["contact"]);
  $carnum = test_input($_POST["carnum"]);
  //$gender = test_input($_POST["gender"]);
  $carcolor = test_input($_POST["carcolor"]);
  //$latitude =  ;
  //$longitude =  ;
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
<form method="post" action="form.php">  
  Contact*: <input type="text" name="contact">
  <br><br>
  Carnum*: <input type="text" name="carnum">
  <br><br>
  Carcolor*: <input type="text" name="carcolor">
  <br><br>
  
  <input type="submit" name="submit">
  <br><br>
 </form>

<?php
if (empty($contact)) {
    echo "Contact is required <br>";
  }
  if (empty($carnum)) {
    echo "Carnum is required<br>";
  }
  if (empty($carcolor)) {
    echo "Carcolor is required<br>";
  }
$query = "INSERT INTO details (contact, carnum, carcolor) 
          VALUES('$contact', '$carnum', '$carcolor')";
    mysqli_query($con, $query);

?>
<br><br>
<a href="loggedmenu.php">ORDER FOOD  !</a>
  
</body>
</html>