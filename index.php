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
$con=mysqli_connect('localhost','root','','traffolic'); 

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>	
<!DOCTYPE html>
<html>
<head>
  
  <meta name="google-signin-client_id" content="894046296405-2stf1timn6mu271rae78mc2ublsoj5d0.apps.googleusercontent.com">
  <title>TraffOlic</title>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--google sign-in-->
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <!--Custom style sheet-->
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style type="text/css" media="screen">
	
 
      
.navbar-custom {
    color:#f4b41d;
    background-color: #f4b41d;
}
	
.locate
{	
  margin: auto;
	position: relative}	
 .btn:hover {
    border-radius: 3px;
    background-color: #fee6d1;
    color: #3e4152;
}

.content{
    min-height: 600px;
}

.banner_image {
    padding-bottom: 50px;
    margin-bottom: 20px;
    font-family: "Karma", sans-serif;
    color: #f8f8f8;
   background-image: url(https://image.freepik.com/free-photo/raw-pasta-with-tomatoes-and-cheese-on-a-black-table-making-a-circle_1309-53.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: scroll;
    text-shadow: 2px 4px 5px red;
}

.inner-banner-image{
    padding-top: 12%;
    width:30%;
    margin:auto;
}

.banner_content {
   
    padding-top: 20%;
    padding-bottom: 10%;
    overflow:hidden;
    margin-bottom: 12%;
    background-color: rgba(0, 0, 0, 0);
    max-width: 660px;
    
}
.eatnow
{	text-decoration:none;}
#about
{ border-top-style: solid;
    border-width: 3px;}
#food
{border-top-style: solid;
    border-width: 3px;}


</style>
  <script  type="text/javascript" charset="utf-8">
    function navigate()
    {
      location.href = 'order.php';
    }
   
  </script>
</head>

<body style="background-blend-mode: color-dodge; background-color: #dfdfdf">

    <header> 
		<nav class="navbar navbar-default navbar-custom">
      		<div class="container-fluid" >
        		<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> 	<span class="icon-bar"></span> <span class="icon-bar"></span> 
          </button>
          <a class="navbar-branch" href="">
            <img src="logo.png" class="img-rounded" id="logo" alt="logo" height="60px" width="170px">
         <!--   <h3 style="display:inline-block; text-decoration: none;" align="center" >traff-O-lic</h1> -->
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
          <li>
              <a href="#about"><span class="glyphicon glyphicon-bookmark"></span>About-us</a>
            </li>
            <li>
              <a href="register.php"><span class="glyphicon glyphicon-user"></span>Login</a>
            </li>
            <li>
              <a href="menu.html"><span class="glyphicon glyphicon-shopping-cart"></span>Menu</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>
    <!--header ends-->
    <div class="container-fluid" align="center">
      <button class="locate btn btn-primary" onclick="navigate()"><span class="glyphicon glyphicon-map-marker"></span>Locate me
        <script type="text/javascript" charset="utf-8">
    function navigate()
    {
      location.href = 'order.php';
    }
   
  </script>
      </button>
    </div>
    

     <div class="content">
    <!--Main banner image-->
    <div class="banner_image">
      <div class="inner-banner-image">
        
          <div class="banner_content">
            <h1>Food on the go</h1>
          
            <br/>
            <a href="menu.html" class="button"><h2>Order Now</h2></a>
          </div>
        
      </div>
    </div>
    
      

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
      
     
   <div class="w3-quarter">
      <img src="sandwich.jpg" alt="Sandwich" style="width:100%">
    	 <h3>The Perfect Sandwich, A Real NYC Classic</h3>
     
    </div>
    <div class="w3-quarter">
      <img src="rolls.jpg" alt="rolls" style="width:70%">
      <h3>Let Me Tell You About This Rolls</h3>
      
    </div>
    <div class="w3-quarter">
      <img src="sub.jpg" alt="subway" style="width:110%">
      <h3>Satisfy your hunger with a footlong</h3>
    
      
    </div>
    <div class="w3-quarter">
      <img src="biscuits.jpg" alt="biscuits" style="width:80%">
      <h3>Anytime is biscuits time</h3>
     
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="water.png" alt="water" style="width:100%">
      <h3>All u Need </h3>
      
    </div>
    <div class="w3-quarter">
      <img src="juice.jpg" alt="juice" style="width:105%">
      <h3>Fruit-juices</h3>
      
    </div>
    <div class="w3-quarter">
      <img src="fruits.jpg" alt="fruits" style="width:90%">
      <h3>Cut-fruits</h3>
      
    </div>
    <div class="w3-quarter">
      <img src="salad.jpg" alt="salad" style="width:100%">
      <h3>Salads</h3>
      
    </div>
  </div>
  <div class="w3-container w3-padding-32 w3-center" id="about">  
    <h1>About us, traff-O-lic</h1><br>
    <img src="logo.png" alt="Me" class="w3-image" style="display:block;margin:auto" width="800" height="533">
         </div>
    <div class="w3-padding-32">
        <h3><br> Instant food choices, focues on health and nutrition.</h3>
         </div>
    
    
         <br> <p>Also serve with no min order..</p>

    <br> <p>Deliver water-bottles and other instant First-AID during emergencies</p><br />
<br> We are here with a responsive User-friendly - website, with real-time geolocation and a best Menu.!<br />
<br> Employ the youngsters with low educational background. (Solving the major social problem)<br />
 <br />
    </div>
</body>
</html>