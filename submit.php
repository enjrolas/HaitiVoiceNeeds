<?php
require_once("connect.php");
require_once("string_utils.php");

$recording_url=$_REQUEST['recording_url'];
$callback_url=$_REQUEST['callback_url'];
$source=$_REQUEST['source'];

$recording_url=sanitizeString($recording_url);
$callback_url=sanitizeString($callback_url);
$source=sanitizeString($source);

$query="insert into recordings(url, callback_url, source) values('$recording_url', '$callback_url', '$source')";
mysql_query($query);
?>