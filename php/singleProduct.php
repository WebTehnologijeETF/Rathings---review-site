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




<?php require "header.php"; ?>


<?php require "reviewSubmit.php"; ?>








<?php




$s = $_POST["single"];
$d = json_decode($s, true);


$prodid = htmlspecialchars($d['id']);

//echo $d["title"];

$output = '<div id="singleProd"><h2>' . htmlspecialchars($d["name"]) . '</h2>' .

'<div class="news_text_single"><p>Category: ' . htmlspecialchars($d["category"]) . '</p><br><p>Rating: ' . htmlspecialchars($d["rating"]) . '</p></div>';


	$output .= '<div class="img_div_single"><img src="' .  
	htmlspecialchars($d["image"]) . '" class="_img" alt="news"></div>';
	
	$output .= '<div class="details"><p>' . htmlspecialchars($d["description"]) . '</p></div></div>';


		echo $output;
		
		
		 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "adminnxLCtAQ", "f9gbwSlXITyh");
		 $con->exec("set names utf8");
	 
		$reviews = $con->prepare("select id, text, author_name, author_email, rating, UNIX_TIMESTAMP(date) date2 from reviews where product=? order by date");
		$reviews->bindValue(1, htmlspecialchars($d['id']), PDO::PARAM_INT);
		$reviews->execute();
		
		  $rnumb = $con->prepare("SELECT COUNT(*) FROM reviews where product=?");
		  $rnumb->bindValue(1, htmlspecialchars($d['id']), PDO::PARAM_INT);
		  $rnumb->execute();
		  $rnumb = $rnumb->fetchColumn();
		  
		
		$revCounter = 0;
		echo '<div id="reviews"><h2>Product reviews</h2>';
		
		
		
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
			$revOutput .= '</div>';
			if($revCounter != $rnumb - 1) // not last
				$revOutput .= '<div class="news_separator"></div>';	
			
			
		
			echo $revOutput;
			$revCounter++;
		} 
		
		if($revCounter == 0)
		echo '<p>There are no reviews for this product</p>';
		
		echo '</div>';
	
	
	



?>


<div id="revForm">
<h2>Add your review</h2>
	<form action="singleProduct.php" method="post" name="revForm">
	
		<p class="note"><i>Note: Fields marked with * are mandatory</i></p>

<div id="l_contact" class="cdiv">
<p  class=" clabel">Name*: </p>
<p  class=" clabel">Email: </p>
<p  class=" clabel">Rating*: </p>
<p  class=" clabel">Review text*: </p>

 
</div>

<div id="r_contact" class="cdiv">
<input  type="text" id="el0" class="celement textbox <?php if(isset($_POST['name'])) toggleBorder($nameErr); ?>" name="name" value="<?php 
     printItem("name");?>">
<div class="error <?php if(isset($_POST['name'])) toggleIcon($nameErr); ?>" id="er0"><p class="error_text"><?php if(isset($_POST['name'])) echo $nameErr; ?></p></div>
<input type="text" id="el1" class="celement textbox <?php if(isset($_POST['rmail'])) toggleBorder($mailErr); ?>" size="40" name="rmail" value="<?php 
     printItem("rmail");?>">
<div class="error <?php if(isset($_POST['rmail'])) toggleIcon($mailErr); ?>" id="er1"><p class="error_text"><?php if(isset($_POST['rmail'])) echo $mailErr; ?></p></div>
<input type="text" id="el1" class="celement textbox <?php if(isset($_POST['rating'])) toggleBorder($ratingErr); ?>" size="40" name="rating" value="<?php 
     printItem("rating");?>"> <br>
<div class="error <?php if(isset($_POST['rating'])) toggleIcon($ratingErr); ?>" id="er2"><p class="error_text"><?php if(isset($_POST['rating'])) echo $ratingErr; ?></p></div>
<textarea id="el3" class="celement textarea <?php if(isset($_POST['rtext'])) toggleBorder($textErr); ?>" cols="30" rows="7" name="rtext"><?php 
     printItem("text");?></textarea>
<div class="error <?php if(isset($_POST['rtext'])) toggleIcon($textErr); ?>" id="er3"><p class="error_text"><?php if(isset($_POST['rtext'])) echo $textErr; ?></p></div>

<input type="hidden" name="id" value="<?php echo $d['id'] ?> ">
<input type="hidden" name="single" value='<?php echo $s ?>' >

</div>

<div id="rev_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Send" class="button common_button">

</div>




	
	</form>


</div>


</body>


</html>