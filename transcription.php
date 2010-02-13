<?php

require_once("connect.php");

function showAllTranscriptions() {
	$query = "select * from recordings where transcribed is null";
	$result = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	
	if ($num_rows == 0) {
		echo "<div class='transcription_block'>There are no calls to transcribe right now</div>";
	}
	
	for ($index = 0; $index < $num_rows; $index++) {
	    $row = mysql_fetch_array($result);
	    showTranscription($row);
	}
}

function showTranscription($row) {
	$url = $row['url'];
	$id = $row['recording_id'];
	$transcriptionText = $row['auto_transcription'];

	$transcriptionName = "transcription".$id;
  
  	echo "
	<div class='transcription_block' id='block$id'>
		<div class='recording' id='player-$id'></div>
	";
  
  	echo renderAudioControls($id, $url);
  
  	echo "
	<div class='transcription'>
		<form action=".$_SERVER['PHP_SELF']." id='form$id' method='post'>
			<input type='hidden' name='id' value='$id'>
			<textarea name='transcription' id='$transcriptionName' cols='80' rows='5' onclick=\"clearElement($transcriptionName)\">Enter your transcription here</textarea>
			<input type='checkbox' class='checkbox' name='actionable'>Check this box if there's a specific action someone can take in response to this message<br/>
		</form>
		<center><button onclick=\"submitTranscription($id)\">Save Transcription</button></center>
	</div>
	";

  	if($transcriptionText != "") {
		echo "
		<div class='machineTranscription'>
			<strong>Machine Transcription:</strong>
			$transcriptionText
		</div>";
  	}
  	
	echo "</div>"; 
}

function renderAudioControls($id, $url) {
	echo "
	<div id='player-container-$id' class='player-container'>
		<ul class='player-controls'>
			<li id='player-play-$id' class='player-play'>play</li>
			<li id='player-pause-$id' class='player-pause'>pause</li>
			<li id='player-stop-$id' class='player-stop'>stop</li>
			<li id='player-volume-min-$id' class='player-volume-min'>min volume</li>
			<li id='player-volume-max-$id' class='player-volume-max'>max volume</li>
		</ul>
		<div class='player-progress'>
			<div id='player-progress-load-bar-$id' class='player-progress-load-bar'>
				<div id='player-progress-play-bar-$id' class='player-progress-play-bar'></div>
			</div>
		</div>
		<div id='player-volume-bar-$id' class='player-volume-bar'>
			<div id='player-volume-bar-value-$id' class='player-volume-bar-value'></div>
		</div>
		<div class='player-playlist-message'>
			<div id='song-title-$id' class='song-title'>Something</div>
			<div id='play-time-$id' class='play-time'></div>
			<div id='total-time-$id' class='total-time'></div>
		</div>
	</div>
	<script type='text/javascript'>
		$(document).ready(function() {
			setup_player($id, '$url');
		});
	</script>
	";
}

?>