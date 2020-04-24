<?php

echo "deleting  ".$_GET[id]. "...";

$dbhost = "localhost";
$dbuser = "phpmyadmin";
$dbpass = "1234";
$db = "testdb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

$sql = "DELETE FROM `testingPhp` WHERE id= '$_GET[id]' ;";
mysqli_query($conn, $sql);

header("Location: ../Ecell/index.php?deletion=successful");