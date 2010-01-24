<?php
require_once("connect.php");
$recordingURL=$_REQUEST['RecordingUrl'];
$transcription= $_REQUEST['TranscriptionText'];
$language=$_REQUEST['language'];
$query="insert into recordings(url, auto_transcription, language) values('$recordingURL', '$transcription', '$language')";
mysql_query($query) or die(mysql_error());

?>