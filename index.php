<?php

require_once("pages.php");
require_once("transcription.php");

printHeader();  //includes CSS and JS
printLogoBar(); //our logo at the top of the page
printBanner();  //the banner that shows the creole and english phone numbers
include("info.html");  //information about what we do
printEmailSignup();  //our email list signup
printHelpBlurb();
echo "<div id='notifications'></div>";  //the div we dynamically show notficiations in w/javascript
echo "<div style='clear:both;'></div>";

showAllTranscriptions();  //list all the recordings that need transcription
printFooter();

?>