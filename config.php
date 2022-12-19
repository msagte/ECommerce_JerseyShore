<?php
if (!isset($_SESSION)) {
  session_start();
}
$host = "localhost"; /* Host name */
$user = "agtem1_mack"; /* User */
$password = "jerseyshoredb12"; /* Password */
$dbname = "agtem1_jerseyshoredb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}