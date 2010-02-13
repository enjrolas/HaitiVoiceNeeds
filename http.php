<?php

function get_query($url, $args) {
  $query = http_build_query($args);
  $full_url = "$url?$query";
  $ch = curl_init($full_url);
  // make curl_exec return HTTP result body as string, instead of sending to browser
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // ensure that 404 and other errors cause curl_exec to return false
     curl_setopt($ch, CURLOPT_FAILONERROR, true);
     // automatically follow any redirects (e.g. HTTP status 301)
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}


function post_query($url, $args) {
  $query = http_build_query($args);
  $ch = curl_init($url);
  // make curl_exec return HTTP result body as string, instead of sending to browser
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // ensure that 404 and other errors cause curl_exec to return false
     curl_setopt($ch, CURLOPT_FAILONERROR, true);
    // make a post request
     curl_setopt($ch, CURLOPT_POST, true);
    // sets the post fields
     curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
     // automatically follow any redirects (e.g. HTTP status 301)
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}

?>