<?php

require_once("header.php");

function printHeader()
{
  echo "<html><head>";
  useJqueryUICode();
  useCSS();
  echo "<title>Haiti Voice Needs</title></head><body>\n";
  printLogoBar();
  printBanner();
  include("info.html");
  printEmailSignup();
  echo "<div id='notifications'></div>";

}


function printLogoBar()
{
  echo "<div id='logobar'>Haiti Voice Needs<img src='images/mobile.jpg' width='50' height='50'></div>";
}

function printMinimalHeader()
{
  echo "<html><head>";
  useJqueryUICode();
  useCSS();
  echo "<title>Haiti Voice Needs</title></head><body>\n";
}

function printBanner()
{
echo "<div id='banner'>
<div id='englishBanner' class='call'>
Have information about Haiti?  <br/>Call <b>+1 (877) 293-6031</b> toll-free and tell us about it.
</div>
<div id='creoleBanner' class='call'>
Pale Kreyol?  Genye enfomasyon d'Ayiti?  <br/>Rele nan <b>+1 (877) 286-0676</b> a nou rakonte
</div>
</div>";
}

function printEmailSignup()
{
  echo "<div id='email'>
Join our email list for updates.
<form id='emailForm' action='#'>Email:  <input type='text' name='email'></form><button onClick='addEmail()'>Join</button>
</div>";
}

?>
