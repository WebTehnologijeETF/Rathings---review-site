<!DOCTYPE HTML>
<html>
<head>
<title>Rathings</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>
<script src="../js/load.js"></script>
<script src="../js/gvalidation.js"></script>
<script src="../js/login-validation.js"></script>
<script src="../js/contact-validation.js"></script>
<script src="../js/products-validation.js"></script>
<script src="../js/register-validation.js"></script>
<script src="../js/add.js"></script>
<script src="../js/categories.js"></script>
</head>
<body id="main_body" onload="fetchNews(); fetchProducts();">


<?php require 'adminHeader.php' ?>

<div id="news2" class="container">

<h2>Manage site news</h2>

<div class="addprod lab_link">
<label onclick="loadPage('addnews.php');">Add news</label>
</div>




</div>

<?php

 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
	 
		$reviews = $con->prepare("select id, text, author_name, author_email, rating, UNIX_TIMESTAMP(date) date2 from reviews order by date desc");
		
		$reviews->execute();
		
		  $rnumb = $con->prepare("SELECT COUNT(*) FROM reviews");
		  $rnumb->execute();
		  $rnumb = $rnumb->fetchColumn();
		
		$revCounter = 0;
		echo '<div id="reviews1"><h2>Manage site reviews</h2>';
		
		
		
		foreach ($reviews as $rev)
		{
			
			$revOutput = '<div class="single_product">' .
			'<img src="/images/author.png" alt="author" class="news_icon"><label class="news_author">';
			if($rev['author_email'] != null) // there is mail
				$revOutput .= '<a href = "mailto:' . $rev['author_email'] . '">' . $rev['author_name'] . '</a>';
			else
				$revOutput .= $rev['author_name'];
			
			$revOutput .= '</label><img src="/images/date.png" alt="date" class="news_icon"><label class="news_date">' .
			date("d.m.Y. (h:i)", $rev['date2']) . '</label><br><label class="rating_mark right-side">' .
			$rev['rating'] . '/10</label> <br><p>' .
			$rev['text'] . '</p>';
			
			$revOutput .= '<div class="update-delete lab_link"><label  onclick="deleteReview(' . $rev['id'] . ');">Delete</label></div>';
			$revOutput .= '</div>';
			if($revCounter != $rnumb - 1) // not last
				$revOutput .= '<div class="news_separator"></div>';	
			
			
		
			echo $revOutput;
			$revCounter++;
		} 
		
		if($revCounter == 0)
		echo '<p>There are no reviews on the site </p>';
		
		echo '</div>';

?>


<div id="admins">
<h2>Manage site admins</h2>

<div class="addprod lab_link">
<label onclick="loadPage('addadmin.php');">Add new Administrator</label>
</div>

<?php


 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
		 
		 $a = $con->query("select * from users");
		 $nu = $con->query("select count(*) from users");
		 $nu = $nu->fetchColumn();
		 $countera = 0;
		 
		 foreach($a as $admin)
		 {
			$adminOutput = '<div class="single_product"><label class="prod">' .
			$admin['name'] . ' ' . $admin['lastname'] .
			'</label> <br><label class="prod2">Username: ' . $admin['username'] . '</label> <br>';
			
			$adminOutput .= '<div class="update-delete lab_link"><label onclick="updateAdmin(' . $admin['id'] . ');">Update</label>';
			if($nu > 1)
					$adminOutput .= '<label  onclick="deleteAdmin(' . $admin['id'] . ');">Delete</label>';
					$adminOutput .= '</div></div>';
			
			if($countera != $nu - 1) // not last
						$adminOutput .= '<div class="news_separator"></div>';
			
			$countera++;
			
			echo $adminOutput;
		 }

/*<div class="single_product">

<label class="prod">Orhan Ljubunčić</label> <br>
 
<label class="prod2">Username: oljubuncic1@etf.unsa.ba</label> <br>
</div>

<div class="news_separator">

</div>*/



?>

</div>

</body>


</html>