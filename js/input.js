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