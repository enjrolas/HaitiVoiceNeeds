<?php
require_once("connect.php");
require_once("pages.php");

$query="select * from recordings where transcribed is null";
$result=mysql_query($query) or die(mysql_error());

printHeader();
if(mysql_num_rows($result)==0)
  echo "<div class='transcription_block'>There are no calls to transcribe right now</div>";

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
  $formID="form".$id;
  $blockID="block".$id;
  echo "
<div class='transcription_block' id='$blockID'>
   <div class='recording'>
      <EMBED height='50' SRC='$url' VOLUME='50' loop='false' controls='console' AUTOSTART='FALSE' width='90%' bgcolor='#EEEEEE'>
    </div>

   <div class='transcription'>
      <form action=".$_SERVER['PHP_SELF']." id='$formID' method='post'>
         <input type='hidden' name='id' value='$id'>
         <textarea class='text' name='transcription' id='$transcriptionName' cols='80' rows='5' onClick=\"clearElement($transcriptionName)\">Enter your transcription here</textarea><br/>
<input type='checkbox' class='checkbox' name='actionable'>Check this box if there's a specific action someone can take in response to this message<br/>
      </form>
<center><button onClick=\"submitTranscription($id)\">Save Transcription</button></center>

   </div>";
  if($transcriptionText!="")
   echo "
   <div class='machineTranscription'>\n
      Machine Transcription: <br/>
      $transcriptionText
   </div>";

echo "</div>";
  
}
?>