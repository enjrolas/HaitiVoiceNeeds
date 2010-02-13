<?php

require_once("connect.php");
require_once("string_utils.php");
require_once("mail.php");

$id = $_REQUEST['id'];
$transcription = $_REQUEST['transcription'];
$actionable = $_REQUEST['actionable'];

if (isset($id)) {
    $id = sanitizeString($id);
    $transcription = sanitizeString($transcription);
    $actionable = sanitizeString($actionable);
    
    $query = "
    	UPDATE recordings
    	SET user_transcription='$transcription', transcribed='1', actionable='$actionable'
    	WHERE recording_id='$id'";
    mysql_query($query) or die(mysql_error());
    
    $subject = "New transcribed actionable message from Haiti Voice";
    $body = "transcription:  $transcription";
    sendEmail("sms@teach.laptop.org", $subject, $body);

    $query = "SELECT * FROM recordings WHERE recording_id = '$id'";
    $result = mysql_query($query);
    
    if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_array($result);
		$callback_url = $row['callback_url'];
		$transcription = $row['$transcription'];
		$url = $row['url'];
		
		if($callback_url != "") {
			header("location: $callback_url?transcription=$transcription&recording_url=$url");
      	}
    }

    echo "ok";
}

?>