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
$d = json_decode($s, true);
//echo $d["title"];

$output = '<div id="singleProd"><h2>' . htmlspecialchars($d["name"]) . '</h2>' .

'<div class="news_text_single"><p>Category: ' . htmlspecialchars($d["category"]) . '</p><br><p>Rating: ' . htmlspecialchars($d["rating"]) . '</p></div>';


	$output .= '<div class="img_div_single"><img src="' .  
	htmlspecialchars($d["image"]) . '" class="_img" alt="news"></div>';
	
	$output .= '<div class="details"><p>' . htmlspecialchars($d["description"]) . '</p></div></div>';


		echo $output;
		
		
		 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "adminnxLCtAQ", "f9gbwSlXITyh");
		 $con->exec("set names utf8");
	 
		$reviews = $con->prepare("select id, text, author_name, author_email, rating, UNIX_TIMESTAMP(date) date2 from reviews where product=?");
		$reviews->bindValue(1, htmlspecialchars($d['id']), PDO::PARAM_INT);
		$reviews->execute();
		
		  $rnumb = $con->prepare("SELECT COUNT(*) FROM reviews where product=?");
		  $rnumb->bindValue(1, htmlspecialchars($d['id']), PDO::PARAM_INT);
		  $rnumb = $rnumb->fetchColumn();
		
		$revCounter = 0;
		foreach ($reviews as $rev)
		{
			// todo mailto
			$revOutput = '<div id="reviews"><h2>Product reviews</h2><div class="single_product">' .
			'<img src="/images/author.png" alt="author" class="news_icon"><label class="news_author">' .
			$rev['author_name'] . '</label><img src="/images/date.png" alt="date" class="news_icon"><label class="news_date">' .
			date("d.m.Y. (h:i)", $rev['date2']) . '</label><br><label class="rating_mark right-side">' .
			$rev['rating'] . '/10</label> <br><p>' .
			$rev['text'] . '</p></div>';
			
			if($revCounter != $rnumb - 1) // not last
				$revOutput .= '<div class="news_separator"></div>';	
			
			$revOutput .= '</div>';
		
			echo $revOutput;
			$revCounter++;
		} 
		
		/*<div id="reviews">

<h2>Product reviews</h2>
<div class="single_product">


<img src="/images/author.png" alt="author" class="news_icon">
<label class="news_author">John Doe</label>
<img src="/images/date.png" alt="date" class="news_icon">
<label class="news_date">01/01/2015</label>
<br>
 <label class="rating_mark right-side">7/10</label> <br>
 
 <p>Absolutely fantastic! The best mobile phone I have ever had.</p>

</div>

<div class="news_separator">

</div>

</div> */
	
	



?>





</body>


</html>