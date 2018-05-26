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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<style>
    .form{
       width: 500px;
    height: 500px;
    background-color: snow;
    margin: 0px auto 0px auto;
    padding: 0px 0px 0px 0px
    }
     .header{
        background-color: orangered;
        column-rule-style: hidden;
         text-align: center;
    }
    .bg{
        background-image: url(form.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }</style>
</head>
<body class="bg">

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
<div class="form">
    <div class="header">
      <h2>Welcome User</h2>
<h4>Please enter details</h4>
  </div>
<form method="post" action="form.php">
  Contact*:    <input type="text" name="contact">
  <br><br>
  Car Number*: <input type="text" name="carnum">
  <br><br>
  Car Color*:  <input type="text" name="carcolor">
  <br><br>

  <input type="submit" name="submit" class="submit">
  <br><br>
 </form>
<div id="target"></div>
<button id="askButton">Check your location </button>
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
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
    <script>
        var target = document.getElementById('target');
var watchId;

function appendLocation(location, verb) {
  verb = verb || 'updated';
  var newLocation = document.createElement('p');
  newLocation.innerHTML = 'Location ' + verb + ': <a href="https://maps.google.com/maps?&z=15&q=' +
location.coords.latitude + '+' + location.coords.longitude + '&ll=' +
location.coords.latitude + '+' + location.coords.longitude + '" target="_blank">' + location.coords.latitude + ', ' +
location.coords.longitude + '</a>';
  target.appendChild(newLocation);
}

if ('geolocation' in navigator) {
  document.getElementById('askButton').addEventListener('click', function () {
    navigator.geolocation.getCurrentPosition(function (location) {
      appendLocation(location, 'fetched');
    });
    watchId = navigator.geolocation.watchPosition(appendLocation);
  });
} else {
  target.innerText = 'Geolocation API not supported.';
}
</script>
</body>
</html>