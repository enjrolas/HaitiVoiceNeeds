<?php
//a set of functions Ilya wrote to sanitize user input

//Replace all html tags
function stripTags($my_str)
{
	   	$str1 = preg_replace('/<\/?[^>]+(>|$)/i', "",$my_str);
	   	$str1 = stripSpecials($str1);
	    return $str1;
}

//Trim all invalid chars from string and replace them by spaces.
function stripSpecials($str)
{
	$str = trim(str_replace(array("\n", "\r", "\t", "\o", "\xOB"), ' ', $str));
	return $str;
}

//Change Ampersand (&) to its ASCII equivalent (just in case)
function stripAmp($str)
{
	$str = str_replace("&", "&#38;", $str);
	return $str;
}

//Strip HTML comments
function stripComments($str)
{
	$str = preg_replace('/<!--(.|\s)*?-->/', '', $str); 
	return $str;
}


function utf_for_db($str)
{
$str = str_replace(chr(194),'', $str);						//replacing �	 char  --> really annoying char
$str = preg_replace('/[\x91\x92]/u', "'", $str);  //replacing smart quote (unicode)
$str = preg_replace('/[\x93\x94]/u', '"', $str);  //replacing double-smart quote (unicode)
$str = preg_replace('/[^(\x20-\x7F)\x0A|\x0D]*/','', $str);  //replacing all other weird characters (Especially produced by MAC OS)
	
$find[] = '“'; // left side double smart quote
$find[] = '”'; // right side double smart quote
$find[] = '‘'; // left side single smart quote
$find[] = '’'; // right side single smart quote
$find[] = '…'; // elipsis
$find[] = '—'; // em dash
$find[] = '–'; // en dash
$find[] = '�';   // single quote
$find[] = '‒'; // single quote

$replace[] = '"';
$replace[] = '"';
$replace[] = "'";
$replace[] = "'";
$replace[] = "...";
$replace[] = "-";
$replace[] = "-";
$replace[] = "'";
$replace[] = "'";

$str = str_replace($find, $replace, $str);
	return trim($str);
}

//Sanitizing function for DB (includes multiple functions rolled into one)  --> You can wrap $str in the stripAmp function before calling utf_for_db
function sanitizeString($str)
{
	return mysql_escape_string(stripSpecials(stripComments(utf_for_db($str))));
}

//this function cleans up a http parameter so that it's read-able, but not sanitized to insert into the db
function clean($str){
  $str=urldecode($str);
  $str=stripSpecials($str);
  $str=stripslashes($str);
  return $str;
}

?>