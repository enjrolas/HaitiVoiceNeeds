<?php
require_once("connect.php");
require_once("pages.php");
require_once("string_utils.php");

$id=$_REQUEST['id'];
$transcription=$_REQUEST['transcription'];
if(isset($id))
  {
    $id=sanitizeString($id);
    $transcription=sanitizeString($transcription);
    $query="update recordings set user_transcription='$transcription', transcribed='1' where recording_id='$id'";
    mysql_query($query);
  }


$query="select * from recordings where transcribed is null";
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
  $transcriptionText=$row['auto_transcription'];
  echo "
<div class='transcription_block'>
   <div class='recording'>
      <EMBED height='50' SRC='$url' VOLUME='50' loop='false' controls='console' AUTOSTART='FALSE' width='90%'>
    </div>

   <div class='transcription'>
      <form action=".$_SERVER['PHP_SELF']." method='post'>
         <input type='hidden' name='id' value='$id'>
         <textarea class='text' name='transcription' id='$transcriptionName' cols='80' rows='5' onClick=\"clearElement($transcriptionName)\">Enter your transcription here</textarea>
         <input type='submit' value='Save Transcription'>
      </form>
   </div>

   <div class='machineTranscription'>\n
      Machine Transcription: <br/>
      $transcriptionText
   </div>
</div>";
  
}
?>