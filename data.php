<?php

 $db = mysqli_connect('localhost','root','','traffolic')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <center><h1>My_Cart</h1></center>

<?php

$query = "SELECT * FROM user_info";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result))

{
 echo $row['User_ID'] . '       ' . $row['Order_id'] . '     :      ' . $row['Product_name'] . '       ' . $row['Cost'] .'     ' . $row['Car_number'] . '       ' . $row['Car_color']. '      ' . $row['Car_model'].'<br />';
}

mysqli_close($db);
?>

</body>
</html>