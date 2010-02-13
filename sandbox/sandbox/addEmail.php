<?php
require_once("connect.php");
require_once("string_utils.php");
$email=$_REQUEST['email'];
$email=sanitizeString($email);
$query="select email_id from emails where email='$email'";
$result=mysql_query($query);
if(mysql_num_rows($result)==0) //don't insert duplicates
  {
    $query="insert into emails(email) values('$email')";
    mysql_query($query) or die(mysql_error());
  }
echo "ok";
?>