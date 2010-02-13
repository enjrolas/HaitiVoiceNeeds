<?php

require_once("header.php");

function printHeader() {
	echo "<!doctype html><html><head>";
	useJqueryUICode();
	useCSS();
	echo "<title>Haiti Voice Needs</title></head><body>";
}

function printMinimalHeader() {
	echo "<!doctype html><html><head>";
	useJqueryUICode();
	useCSS();
	echo "<title>Haiti Voice Needs</title></head><body>";
}

function printLogoBar() {
	echo "<div id='logobar'>Haiti Voice Needs<img src='images/mobile.jpg' width='50' height='50'></div>";
}

function printFooter() {
	addUservoiceWidget();
	echo "<div id='footer'><a href='about.php'>About Us</a></div></body></html>";
}

function printBanner() {
	echo "
	<div id='banner'>
		<div id='englishBanner' class='call'>
			Have information about Haiti?  <br/>Call <strong>+1 (877) 293-6031</strong> toll-free and tell us about it.
		</div>
		<div id='creoleBanner' class='call'>
			Pale Kreyol?  Genye enfomasyon d'Ayiti?<br/>Rele nan <strong>+1 (877) 286-0676</strong> a nou rakonte
		</div>
	</div>
	";
}

function printEmailSignup() {
	echo "
	<div id='email' class='side_blurb'>
		Join our email list for updates.
		<form id='emailForm' action='javascript:void(0);'>
			Email: <input type='text' name='email' />
		</form>
		<button onclick='addEmail();'>Join</button>
	</div>
	";
}

function printHelpBlurb() {
	echo "
	<div id='help_blurb' class='side_blurb'>
		Help us out!  We need volunteers to help us develop the site and expand our service.
		<a href='help.php' target='_blank'>Click here</a> to see a list of what skills we need.
	</div>
	";
}

function addUservoiceWidget() {
	echo "
	<script type='text/javascript'>
		var uservoiceOptions = {
		  /* required */
		  key: 'haitivoice',
		  host: 'haitivoice.uservoice.com', 
		  forum: '39091',
		  showTab: true,  
		  /* optional */
		  alignment: 'left',
		  background_color:'#f00', 
		  text_color: 'white',
		  hover_color: '#06C',
		  lang: 'en'
		};

		function _loadUserVoice() {
		  var s = document.createElement('script');
		  s.setAttribute('type', 'text/javascript');
		  s.setAttribute('src', ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.uservoice.com/javascripts/widgets/tab.js');
		    document.getElementsByTagName('head')[0].appendChild(s);
		}
		
		_loadSuper = window.onload;
		window.onload = (typeof window.onload != 'function') ? _loadUserVoice : function() { _loadSuper(); _loadUserVoice(); };
	</script>
	";
}

?>