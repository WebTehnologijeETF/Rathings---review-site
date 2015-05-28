<?php

	 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
     $result = $con->query("select * from products order by rating");
	 
     if (!$result) {
          $error = $con->errorInfo();
          print "SQL error: " . $error[2];
          exit();
     }

	 $counter = 0;
	
	$numb = $con->query("SELECT COUNT(*) FROM products");
		  $numb = $numb->fetchColumn();
	
	
	
	foreach ($result as $single) {
	
		  $reviewsNum = $con->prepare("SELECT COUNT(*) FROM reviews WHERE product=?");
		  $reviewsNum->bindValue(1, $single['id'], PDO::PARAM_INT);
		  $reviewsNum->execute();
		  $reviewsNum = $reviewsNum->fetchColumn();
		  $r = 'reviews';
		  if($reviewsNum == 1) $r = 'review';
         
		 $productsString = '<div class="single_product lab-link">' .
					'<img src=' . $single['image'] . ' alt="product" class="_img_prod">' .
					'<label class="prod prod3"';
					$productsString .= "onclick='loadProductss(" . json_encode($single) . ")'>";
					$productsString .= $single['name'] . '</label>' .
					 '<label class="rating_mark right-side">' . $single['rating'] . '</label> <br>' .
					'<label class="prod2">Category:' . $single['category'] . '</label> <br>';
					
					if($reviewsNum != 0)
						$productsString .= "<div class='update-delete lab_link'>" .
					"<label onclick='loadProductss(" . json_encode($single) . ")'>" . $reviewsNum . " " . $r . "</label>" .
					"</div>";
					
					$productsString .= '</div>';
					
					if($counter != $numb - 1) // not last
						$productsString .= '<div class="news_separator"></div>';
		  
		
				
		echo  $productsString;
		

		
		$counter++;
		  
		  

		  
     }


?>