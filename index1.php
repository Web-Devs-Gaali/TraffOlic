<?php

$host='localhost';
$user='root';
$pass='';
$db='mydb';

$con = mysqli_connect($host,$user,$pass,$db);

if($con)
    echo 'connected successfully to database';

$sql = "insert into customer (Username,password,email) values ('Swapna',54321,'swapna@gmail.com')";

$query = mysqli_query($con,$sql);

if($query)
    echo 'data inserted successfully';

?>