<?php

require_once("header.php");

function printHeader()
{
  echo "<html><head>";
  showIcon();  //shows the favicon code
  useJqueryUICode();
  useCSS();
  echo "<title>Haiti Voice Needs</title></head><body>\n";
  printBanner();
  include("info.html");
  printEmailSignup();
  echo "<div id='notifications'></div>";

}

function printMinimalHeader()
{
  echo "<html><head>";
  showIcon();  //shows the favicon code
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
Whether you want to help us, use our service or just stay informed, you should join our email list.
Put your email below and click join, and we'll keep you updated on our progress and our needs as they arise.  
We promise not to send more than an email every day or two, and we'll never give your personal information to anyone else.<br/>
<form id='emailForm' action='#'>
Email:  <input type='text' name='email'></form>  <button onClick='addEmail()'>Join</button>
</div>";
}

?>
