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
<body id="main_body">

<div id="news" class="container">

<h2>Manage site news</h2>


<?php

$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "adminnxLCtAQ", "f9gbwSlXITyh");
     $con->exec("set names utf8");
     $result = $con->query("select id, title, caption, text, author, image, UNIX_TIMESTAMP(date) date2 from news order by date desc");
	 
     if (!$result) {
          $error = $con->errorInfo();
          print "SQL error: " . $error[2];
          exit();
     }
	
	
	
	
	$counter = 0;
	
	$numb = $con->query("SELECT COUNT(*) FROM news");
		  $numb = $numb->fetchColumn();
	
	
	
	foreach ($result as $single) {
         
		  
		  $authorq = $con->prepare("SELECT name, lastname FROM users WHERE id=?");
		  $authorq->bindValue(1, $single['author'], PDO::PARAM_INT);
		  $authorq->execute();
		  
		  $authorfull = $authorq->fetch();
		  $author = $authorfull['name'] . ' ' . $authorfull['lastname'];
		  
		  
		  
		$fileOutput = '<div class="single_news">' . '<h3>' . 
		 $single["title"] . '</h3>' .
		 '<img src="/images/author.png" alt="author" class="news_icon">' .
		 '<label class="news_author">' . $author . '</label>' .
		 '<img src="/images/date.png" alt="date" class="news_icon">' .
		 '<label class="news_date">' . date("d.m.Y. (h:i)", $single['date2']) . '</label> <br><br>' .
		 '<div class="img_div">';
		 
		 if($single['image'] != null)
		 {			 // there is image
			$fileOutput .= '<img src="' . $single["image"] . '" class="_img" alt="news">';
			
		 }
		
		$fileOutput .= '</div>';
			
			$fileOutput .= '<div class="news_text"><p>';
			
			
			
			$fileOutput .= $single['caption'];
			$fileOutput .= '</p></div>';
			
			$fileOutput .= '<div class="update-delete lab_link"><label onclick="prepareForUpdate(' . $single['id'] . ');">Update</label>
					<label  onclick="deleteNews(' . $single['id'] . ');">Delete</label></div>';
				
			$fileOutput .= '</div>';
			if($counter != $numb - 1) // not last
						$fileOutput .= '<div class="news_separator"></div>';
				
		echo  $fileOutput;
		

		
		$counter++;
		  
		  

		  
     }
	
	
	
	
	
	
	
		
		
		
		
	
	


?>

</div>

<?php

 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "adminnxLCtAQ", "f9gbwSlXITyh");
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

</body>


</html>