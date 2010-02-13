<?php

require_once("connect.php");
require_once("string_utils.php");

# This is very crude and should be improved
define('VALID_URL_REGEX', '/^https?:\/\/.+$/i');

function isValidURL($url) {
    if (!preg_match(VALID_URL_REGEX, $url)) {
        return false;
    }

    $ch = curl_init($url);
    # use http HEAD request instead of GET (don't retrieve actual content)
    curl_setopt($ch, CURLOPT_NOBODY, true); 
    # ensure that 404 and other errors cause curl_exec to return false
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    # automatically follow any redirects (e.g. HTTP status 301)
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    $result = curl_exec($ch);
    
    curl_close($ch);
    
    return $result;
}

$recording_url = $_REQUEST['recording_url'];
$callback_url = $_REQUEST['callback_url'];
$source = $_REQUEST['source'];

$recording_url = sanitizeString(trim($recording_url));
$callback_url = sanitizeString(trim($callback_url));
$source = sanitizeString($source);

header("Content-type: text/plain");
if (!isValidURL($recording_url)) {
    echo("not ok: recording_url '$recording_url'\n");
    exit;
} 

if (!empty($callback_url) && !isValidURL($callback_url)) {
    echo("not ok: callback_url '$callback_url'\n");
    exit;
} 

$query = "
	INSERT INTO recordings(url, callback_url, source)
	VALUES ('$recording_url', '$callback_url', '$source')
";

mysql_query($query);
echo "ok\n";

?>