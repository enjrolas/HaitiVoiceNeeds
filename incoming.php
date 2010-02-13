<?php
require_once("config.php");
require_once("twilio_utils.php");
$phone=$_REQUEST['Caller'];
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
<Response>";
playFile("creole_prompt.mp3");
//just does the recording, no transcription
$actionUrl=$root_url."insert.php?language=creole";
$actionUrl.="&amp;phone=$phone";
echo "<Record action='$actionUrl' finishOnKey='#' maxLength='120' />";

echo "</Response>";

?>

