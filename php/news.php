


<?php



	$dir = "novosti";
	
	$news = scandir($dir);
	

	
	
	// sorting by date
	
	$files = array();
	
	foreach($news as $file)
	{
		if($file == '.' || $file == '..') continue;
		$date = date('Y-m-d:H:i:s', strtotime(file($dir . '/' . $file)[0]));
		$files[$file] = $date;
		
	}
	
	arsort($files);
	$files = array_keys($files);
	
	
	$single = array(); 
	
	
	
	
	$counter = 0;
	
	foreach($files as $file)
	{
		$fileString = file($dir . '/' . $file, FILE_IGNORE_NEW_LINES);
		
		$single["date"] = $fileString[0];
		$single["author"] = $fileString[1];
		$single["title"] = ucfirst(strtolower($fileString[2]));
		$single["image"] = $fileString[3];
		
		$fileOutput = '<div class="single_news">' . '<h3>' . 
		 $single["title"] . '</h3>' .
		 '<img src="/images/author.png" alt="author" class="news_icon">' .
		 '<label class="news_author">' . $single["author"] . '</label>' .
		 '<img src="/images/date.png" alt="date" class="news_icon">' .
		 '<label class="news_date">' . $single["date"] . '</label> <br><br>' .
		 '<div class="img_div">';
		 
		 if($fileString[3] !=  '')
		 {			 // there is image
			$fileOutput .= '<img src="' . $single["image"] . '" class="_img" alt="news">';
			
		 }
		
		$fileOutput .= '</div>';
			
			$fileOutput .= '<div class="news_text"><p>';
			
			$i = 4;
			$text = "";
			
			while($i < count($fileString))
			{
				if(strcmp(trim($fileString[$i]), '--') == 0)
				{
					// end of first text
					$i++;
					break;
					
				}
					
				
				$text .= $fileString[$i] . " ";
				$i++;
			}
			
			$fileOutput .= $text;
			$single["text"] = $text;
			
			$fileOutput .= '</p></div>';
			
			if($i < count($fileString) - 1) // there is details text
			{	
				$details = "";
				while($i < count($fileString))
					{
						$details .= $fileString[$i] . " ";
						$i++;
					}
				
				$single["details"] = $details;
				$fileOutput .= "<a onclick='loadNews(" . json_encode($single) . ")'>Details</a>";
				
			}
				
			$fileOutput .= '</div>';

					if($counter != count($files) - 1) // not last
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


