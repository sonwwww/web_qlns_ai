<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$db     = 'do_an_tn';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>