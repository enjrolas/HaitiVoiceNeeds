<?php
require_once("connect.php");
$recordingURL=$_REQUEST['RecordingUrl'];
$transcription= $_REQUEST['TranscriptionText'];
$language=$_REQUEST['language'];
$phone=$_REQUEST['phone'];
$query="insert into recordings(url, auto_transcription, language, timestamp, phone) values('$recordingURL', '$transcription', '$language', now(), '$phone')";
mysql_query($query) or die(mysql_error());

?>