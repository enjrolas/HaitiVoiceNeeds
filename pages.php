<?php

require_once("header.php");

function printHeader()
{
  echo "<html><head>";
  showIcon();  //shows the favicon code
  useJqueryUICode();
  useCSS();
  echo "<title>Haiti Voice Needs</title></head><body>\n";
  echo "<div id='notifications'></div>";
}

?>
