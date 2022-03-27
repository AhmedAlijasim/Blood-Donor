<?php
//Start Create Cokie For Change Color Site .
$mainColor ="rgb(51, 51, 51)";
if (isset($_GET['color'])) {
 	$mainColor = $_GET['color'];
 	//setcookie("Background", $mainColor, time()+(7 * 24 * 3600), "/", "dropbiq.epizy.com");
 	setcookie("Background", $mainColor, time()+(7 * 24 * 3600), "/", "localhost"); //On Server
} 
if (isset($_COOKIE['Background'])) { $theme = $_COOKIE['Background']; } 
else { $theme = $mainColor; }
//End Cookie For Change Theme Of Site.

//Start Create Cokie For Change Color Site .
$mainLanguage ="ltr";
if (isset($_GET['lang'])) {
 	$mainLanguage = $_GET['lang'];
 	//setcookie("Language", $mainLanguage, time()+(7 * 24 * 3600), "/", "dropbiq.epizy.com");
 	setcookie("Language", $mainLanguage, time()+(7 * 24 * 3600), "/", "localhost"); //On Server
} 
if (isset($_COOKIE['Language'])) { $language = $_COOKIE['Language'];$_SESSION['lang']=$language; } 
else { $language = $mainLanguage; }
//End Cookie For Change Theme Of Site.
?> 