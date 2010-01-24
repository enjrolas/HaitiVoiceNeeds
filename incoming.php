<?php
require_once("config.php");
require_once("twilio_utils.php");
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
<Response>";
playFile("creole_prompt.mp3");
//does some machine transcription
/*echo "
    <Record transcribe='true' transcribeCallback='".$root_url."insert.php'
        action='confirm.php' finishOnKey='#' maxLength='120' />
*/

//just does the recording, no transcription
echo "<Record action='".$root_url."insert.php' finishOnKey='#' maxLength='120' />";

echo "</Response>";

?>

