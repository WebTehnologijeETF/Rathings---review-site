<!DOCTYPE HTML>
<html>
<head>
<title>Rathings</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="shortcut icon" type="image/png" href="..images/favicon.png"/>
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



<?php




$prodid = $_POST["single"];


$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
     $result = $con->prepare("select * from products where id = ?");
	 $result->bindValue(1, htmlspecialchars($prodid));
	 $result->execute();
	 
	 foreach($result as $d)
	 {




$output = '<div id="singleProd"><h2>' . htmlspecialchars($d["name"]) . '</h2>' .

'<div class="news_text_single"><p>Category: ' . htmlspecialchars($d["category"]) . '</p><br><p>Rating: ' . htmlspecialchars($d["rating"]) . '</p></div>';


	$output .= '<div class="img_div_single"><img src="' .  
	htmlspecialchars($d["image"]) . '" class="_img" alt="news"></div>';
	
	$output .= '<div class="details"><p>' . htmlspecialchars($d["description"]) . '</p></div></div>';
	$output .= '<br><br><a style="top:1200px;" href="addReview.php?id=' . $prodid . '">Add your review</a>
';

		echo $output;
		
		}
		
		
		 echo '<div id="reviews"><h2>Product reviews</h2>';
	
		 echo '</div>';
	



?>




<input type="hidden" id="id" name="id" >
<input type="hidden" id="prodid" name="single" value='<?php echo $prodid ?>' >



</body>


</html>