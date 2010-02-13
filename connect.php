<?php
/*this file has the connection variables for the database.  Whenever it's included
  it opens up a database connection in that script*/

$username="haiti";
$password="haiti";
$host="127.0.0.1";
$database="haiti";

$connection = mysql_connect($host, $username, $password) or die ('Error connecting to mysql');
mysql_select_db($database, $connection);
?>