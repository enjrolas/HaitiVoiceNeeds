<?php
require_once("connect.php");
require_once("pages.php");
$query="select * from recordings where transcribed!='1'";
$result=mysql_query($query) or die(mysql_error());

printHeader();
for($index=0;$index<mysql_num_rows($result);$index++)
  {
    $row=mysql_fetch_array($result);
    showTranscription($row);
  }

printFooter();

function showTranscription($row)
{
  $url=$row['url'];
  $id=$row['recording_id'];
  $transcriptionName="transcription".$id;
  
  echo "<div class='transcription_block'>
<div class='recording'>
<EMBED height='50' SRC='$url' VOLUME='50' loop='false' controls='console' AUTOSTART='FALSE' width='90%'>
</div>
<div class='transcription'>
<textarea id='$transcriptionName' cols='80' rows='5'>Enter your transcription here</textarea>
</div>
<div class='button'>
<button name='transcribe'>Save Transcription</button>
</div>
</div>

";
}
?>