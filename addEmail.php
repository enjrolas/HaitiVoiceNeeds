<?php

require_once("connect.php");
require_once("string_utils.php");

$email = sanitizeString($_REQUEST['email']);
$query = "SELECT email_id FROM emails WHERE email='$email'";
$result = mysql_query($query);

# Don't insert duplicates.
if (mysql_num_rows($result) == 0) {
    $query = "INSERT INTO emails(email) values('$email')";
    mysql_query($query) or die(mysql_error());
}

echo "ok";
?>