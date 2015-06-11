<!DOCTYPE HTML>
<html>
<head>
<title>Rathings</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>

</head>
<body id="main_body">




<?php require "header.php"; ?>




<?php

$s = $_POST["single"];

$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
     $result = $con->prepare("select id, title, caption, text, author, image, UNIX_TIMESTAMP(date) date2 from news where id = ?");
	 $result->bindValue(1, htmlspecialchars($s));
	 $result->execute();
	 
     
	 foreach($result as $d)
	 {

		
			 $authorq = $con->prepare("SELECT name, lastname FROM users WHERE id=?");
		  $authorq->bindValue(1, $d['author'], PDO::PARAM_INT);
		  $authorq->execute();
		  
		  $authorfull = $authorq->fetch();
		  $author = $authorfull['name'] . ' ' . $authorfull['lastname'];

//echo $d["title"];

$output = '<div id="singleNews"><h2>' . htmlspecialchars($d["title"]) . '</h2>' .
'<img src="/images/author.png" alt="author" class="news_icon">' .
'<label class="news_author">' . htmlspecialchars($author) . '</label>' .
'<img src="/images/date.png" alt="date" class="news_icon">' .
'<label class="news_date">' . date("d.m.Y. (h:i)", htmlspecialchars($d['date2'])) . '</label><br><br>' .
'<div class="news_text_single"><p>' . htmlspecialchars($d["caption"]) . '</p></div>';

if(htmlspecialchars($d["image"]) != "") 
	$output .= '<div class="img_div_single"><img src="' .  
	htmlspecialchars($d["image"]) . '" class="_img" alt="news"></div>';
	
	$output .= '<div class="details"><p>' . htmlspecialchars($d["text"]) . '</p></div></div>';


		echo $output;
		
		}
	
	

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