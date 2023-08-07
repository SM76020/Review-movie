<?php
// db_config.php
$host = 'sql107.epizy.com';
$username = 'epiz_32608600';
$password = 'mHc11WeNLck';
$database = 'epiz_32608600_movier';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
  die('Connection failed: ' . mysqli_connect_error());
}
?>
