function clearElement(id)
{
    $(id).val("");
}

function submitTranscription(id)
{
    formID="form#form"+id;
    blockID="div#block"+id;
    variables=$(formID).serialize();
    $(blockID).hide("slow");
    $.post("processTranscription.php", variables, function(response){
	    $("div#notifications").html("Transcription saved!  Thanks!");
	});
}

function addEmail()
{
    variables=$("form#emailForm").serialize();
    $.post("addEmail.php", variables, function(response){
	    $("div#notifications").html("We added you to the list.  Thanks!");
	});
}

function setup_player (id, url) {
	$("#player-" + id).jPlayer({
		ready: function () {
			$(this).setFile(url);
		},
		swfPath: "js/jQuery.jPlayer.0.2.5"
	})
	.jPlayerId("play", "player-play-" + id)
	.jPlayerId("pause", "player-pause-" + id)
	.jPlayerId("stop", "player-stop-" + id)
	.jPlayerId("loadBar", "player-progress-load-bar-" + id)
	.jPlayerId("playBar", "player-progress-play-bar-" + id)
	.jPlayerId("volumeMin", "player-volume-min-" + id)
	.jPlayerId("volumeMax", "player-volume-max-" + id)
	.jPlayerId("volumeBar", "player-volume-bar-" + id)
	.jPlayerId("volumeBarValue", "player-volume-bar-value-" + id)
	.onProgressChange( function(loadPercent, playedPercentRelative, playedPercentAbsolute, playedTime, totalTime) {
		var myPlayedTime = new Date(playedTime);
		var ptMin = (myPlayedTime.getUTCMinutes() < 10) ? "0" + myPlayedTime.getUTCMinutes() : myPlayedTime.getUTCMinutes();
		var ptSec = (myPlayedTime.getUTCSeconds() < 10) ? "0" + myPlayedTime.getUTCSeconds() : myPlayedTime.getUTCSeconds();
		$("#player-container-" + id + " .play-time").text(ptMin+":"+ptSec);

		var myTotalTime = new Date(totalTime);
		var ttMin = (myTotalTime.getUTCMinutes() < 10) ? "0" + myTotalTime.getUTCMinutes() : myTotalTime.getUTCMinutes();
		var ttSec = (myTotalTime.getUTCSeconds() < 10) ? "0" + myTotalTime.getUTCSeconds() : myTotalTime.getUTCSeconds();
		$("#player-container-" + id + " .total-time").text(ttMin+":"+ttSec);
	});
}
