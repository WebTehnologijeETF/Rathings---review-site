


<?php



	
	
	 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
     $result = $con->query("select id, title, caption, text, author, image, UNIX_TIMESTAMP(date) date2 from news order by date desc");
	 
     if (!$result) {
          $error = $con->errorInfo();
          print "SQL error: " . $error[2];
          exit();
     }
	
	
	/*// sorting by date
	
	$files = array();
	
	foreach($news as $file)
	{
		if($file == '.' || $file == '..') continue;
		$date = date('Y-m-d:H:i:s', strtotime(file($dir . '/' . $file)[0]));
		$files[$file] = $date;
		
	}
	
	arsort($files);
	$files = array_keys($files);
	
	
	$single = array(); */
	
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
			
			if($single['text'] != null) // there is details text
			{	
				$single['author'] = $author;
				$fileOutput .= "<a onclick='loadNews(" . json_encode($single) . ")'>Details</a>";
				
			}
				
			$fileOutput .= '</div>';
			if($counter != $numb - 1) // not last
						$fileOutput .= '<div class="news_separator"></div>';
				
		echo  $fileOutput;
		

		
		$counter++;
		  
		  

		  
     }
	
	
	
	
	
	
	
		
		
		
		
	
	
	/* <div class="single_news">
<h3>HYUNDAI RELEASES NEW MODEL</h3>
<img src="/images/author.png" alt="author" class="news_icon">
<label class="news_author">John Doe</label>
<img src="/images/date.png" alt="date" class="news_icon">
<label class="news_date">01/01/2015</label>
<br><br>

<div class="img_div">
<img src="/images/car.png" class="_img" alt="news">
</div>

<div class="news_text">
<p> Don't miss hyundai's latest luxury car that has everything you need.</p>
</div>

<a>Details</a>


</div> */


?>


