<?php
require_once("connect.php");
require_once("string_utils.php");

# This is very crude and should be improved
define('VALID_URL_REGEX', '/^https?:\/\/.+$/i');

function isValidURL($s) {
    return preg_match(VALID_URL_REGEX, $s);
}

$recording_url=$_REQUEST['recording_url'];
$callback_url=$_REQUEST['callback_url'];
$source=$_REQUEST['source'];

$recording_url=sanitizeString(trim($recording_url));
$callback_url=sanitizeString(trim($callback_url));
$source=sanitizeString($source);

header("Content-type: text/plain");
if (!isValidURL($recording_url)) {
    echo("not ok: recording_url '$recording_url'\n");
    exit;
} 
if (!empty($callback_url) && !isValidURL($callback_url)) {
    echo("not ok: callback_url '$callback_url'\n");
    exit;
} 
$query="insert into recordings(url, callback_url, source) values('$recording_url', '$callback_url', '$source')";
mysql_query($query);
echo "ok\n";
?>