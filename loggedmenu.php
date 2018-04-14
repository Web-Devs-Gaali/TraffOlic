<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  $conn = mysqli_connect('localhost','root','','registration');
  echo "<h1>Welcome user</h1>";
  ?>
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
  <link rel="stylesheet" type="text/css" href="menu_images/style.css">
  <style>
  h3:hover
  {color:green;
  }
  </style>
  <script src="js/script.js" type="text/javascript" charset="utf-8">
    
   
  </script>
</head>

<body style="background-blend-mode: color-dodge; background-color: #dfdfdf">
<center><h1>Our Menu</h1></center>

<?php
  if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = mysqli_query($conn,"SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
      $row = mysqli_fetch_assoc($productByCode);
      echo $row['code'].$row['name'].$row['code'].$_POST['quantity'];
      $itemArray = array($row["code"]=>array('name'=>$row["name"], 'code'=>$row["code"], 'quantity'=>$_POST["quantity"], 'price'=>$row["price"]));
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($row["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              echo $row['code'].'\t'.$k;
              if($row["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}
?>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="loggedmenu.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>  
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr> 
<?php   
    foreach ($_SESSION["cart_item"] as $item){
    ?>
        <tr>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="loggedmenu.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
        </tr>
        <?php
        $item_total += ($item["price"]*$item["quantity"]);
    }
    ?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>    
  <?php
}
?>
</div>

<?php
$conn = mysqli_connect('localhost','root','','registration');
$product_array = mysqli_query($conn, "SELECT * FROM tblproduct ORDER BY id ASC");
while($row = mysqli_fetch_assoc($product_array)) {
  ?>
       <div class="product-item">
          <form method="post" action="loggedmenu.php?action=add&code=<?php echo $row['code'] ?>">
          <div class="product-image"><img style="max-width: 10vw; max-height: 10vh" src="menu_images/<?php echo $row["image"] ?>"></div><BR>
          <div><strong><?php echo $row["name"] ?></strong></div><BR>
          <div class="product-price"><?php echo "$".$row["price"] ?></div><BR>
          <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
          </form>
        </div>
    <?php 
  }
?>

<!--div class="w3-row-padding w3-padding-16 w3-center" id="food">
   <div class="w3-quarter">
   <a href="cart.html">   <img src="sandwich.jpg" alt="Sandwich" style="width:100%"></a>
    	<a href="cart.html"> <h3>The Perfect Sandwich, A Real NYC Classic</h3></a>
     
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
  
  <! Second Photo Grid>
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
  </div-->
  </body>
</html>