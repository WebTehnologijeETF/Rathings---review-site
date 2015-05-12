<!DOCTYPE HTML>
<html>
<head>
<title>Rathings</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>

</head>
<body id="main_body">

<div id="logo">


<?php require "header.php"; ?>




<?php

$s = $_POST["single"];
$d = json_decode($s, true);
//echo $d["title"];

$output = '<div id="singleNews"><h2>' . $d["title"] . '</h2>' .
'<img src="/images/author.png" alt="author" class="news_icon">' .
'<label class="news_author">' . $d["author"] . '</label>' .
'<img src="/images/date.png" alt="date" class="news_icon">' .
'<label class="news_date">' . $d["date"] . '</label><br><br>' .
'<div class="news_text_single"><p>' . $d["text"] . '</p></div>';

if($d["image"] != "") 
	$output .= '<div class="img_div_single"><img src="' .  
	$d["image"] . '" class="_img" alt="news"></div>';
	
	$output .= '<div class="details"><p>' . $d["details"] . '</p></div></div>';


		echo $output;
	
	

/* <div id="singleNews">

<h2>HYUNDAI RELEASES NEW MODEL</h2>
<img src="/images/author.png" alt="author" class="news_icon">
<label class="news_author">John Doe</label>
<img src="/images/date.png" alt="date" class="news_icon">
<label class="news_date">01/01/2015</label>
<br><br>

<div class="news_text_single">
<p> Don't miss hyundai's latest luxury car that has everything you need.</p>
</div>

<div class="img_div_single">
<img src="/images/car.png" class="_img_single" alt="news">
</div>

<div class="details">
<p>The Galaxy S6 line retains similarities in design to previous models, but now uses a unibody metal frame with
a glass backing, a curved bezel with chamfered sides to improve grip, and the speaker grille was moved to the
bottom. The devices are available in "White Pearl", "Black Sapphire", and "Gold Platinum" color finishes; additional " Blue Topaz" and "Emerald Green" finishes are exclusive to the S6 and S6 Edge respectively. The S6 carries some regressions in its design over the S5; it is no longer waterproof, does not contain a MicroSD card slot, reverts to a USB 2.0 port from USB 3, and has a non-removable battery.
</p></div>


</div> */

?>


</body>


</html>