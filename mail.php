<?php
function sendEmail($to, $subject, $body) {
  $from = "haitivoiceneeds-prj@keithsteward.com";
  $headers = 'From: '.$from. "\r\n" .
    'Reply-To: '.$from. "\r\n" .
    'X-Mailer: HaitiVoiceNeeds';
  
  mail($to, $subject, $body, $headers);
}

?>