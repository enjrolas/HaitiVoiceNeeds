<?php
require_once("connect.php");
$recordingURL=$_REQUEST['RecordingUrl'];
$transcription= $_REQUEST['TranscriptionText'];
$query="insert into recordings(url, auto_transcription) values('$recordingURL', '$transcription')";
mysql_query($query) or die(mysql_error());

?>