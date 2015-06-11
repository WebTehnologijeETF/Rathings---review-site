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


		echo $output;
		
		}
		
		
		 echo '<div id="reviews"><h2>Product reviews</h2>';
	
		 echo '</div>';
	



?>


<div id="revForm">
<h2>Add your review</h2>
	
	
		<p class="note"><i>Note: Fields marked with * are mandatory</i></p>

<div id="l_contact" class="cdiv">
<p  class=" clabel">Name*: </p>
<p  class=" clabel">Email: </p>
<p  class=" clabel">Rating*: </p>
<p  class=" clabel">Review text*: </p>

 
</div>

<div id="r_contact" class="cdiv">
<input  type="text" id="el0" class="celement textbox " name="name">
<div class="error " id="er0"><p class="error_text"></p></div>
<input type="text" id="el1" class="celement textbox " size="40" name="rmail">
<div class="error " id="er1"><p class="error_text"></p></div>
<input type="text" id="el2" class="celement textbox " size="40" name="rating"> <br>
<div class="error " id="er2"><p class="error_text"></p></div>
<textarea id="el3" class="celement textarea " cols="30" rows="7" name="rtext"></textarea>
<div class="error " id="er3"><p class="error_text"></p></div>

<input type="hidden" id="id" name="id" >
<input type="hidden" id="prodid" name="single" value='<?php echo $prodid ?>' >

</div>

<div id="rev_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="button" value="Send" class="button common_button" onclick="addReview();">

</div>




	
	


</div>


</body>


</html>