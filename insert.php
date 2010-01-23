<?php
require_once("connect.php");
$recordingURL=$_REQUEST['RecordingUrl'];
$transcription= $_REQUEST['TranscriptionText'];
$query="insert into recordings(url, auto_transcription) values('$recordingURL', '$transcription')";
mysql_query($query) or die(mysql_error());
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
<Response>
<Say>recording saved</Say>;
</Response>";

?>