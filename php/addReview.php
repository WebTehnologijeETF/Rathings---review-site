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

<?php

session_start();
if(!isset($_SESSION['username']) or $_SESSION['role'] != 2)
{
	header('Location: index.php');
	die();

}
else
{
	$mail = $_SESSION['username'];
}


?>

<?php
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$prodId = htmlspecialchars($_GET['id']);
	}


?>

<?php

	$mes = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	
		
		$valid = true;
	
		$rating = $review = "";
		
		
			
			
			
			if(isset($_POST['rating']) and $_POST['rating'] != '')
			$rating = htmlspecialchars($_POST['rating']);
		else
		{
			$valid = false;
			$mes = "You have to fill in all fields";
		}
			
			if(isset($_POST['rtext']) and $_POST['rtext'] != '')
			$review = htmlspecialchars($_POST['rtext']);
		else
		{
			$valid = false;
			$mes = "You have to fill in all fields";
		}

			if($valid)
			{

			$prodId = htmlspecialchars($_POST['single']);
			$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
			$con->exec("set names utf8");
	 
			 $res = $con->prepare("insert into reviews set text = ?, author_name = ?, author_email = ?, rating = ?, product = ?");
			 $res->bindValue(1, $review, PDO::PARAM_STR);
			 $res->bindValue(2, $mail, PDO::PARAM_STR);
			 $res->bindValue(3, $mail, PDO::PARAM_STR);
			 $res->bindValue(4, $rating, PDO::PARAM_INT);
			 $res->bindValue(5, $prodId, PDO::PARAM_INT);
			 $res->execute();
			 
			 $mes = "You have successfully added new review";

			}
			 
			
		
	
	
	}


?>

<body>

<div id="revForm">
	<form action="addReview.php" method="post">
<h2>Add your review</h2>
	
	
		<p class="note"><i>Note: Fields marked with * are mandatory</i></p>

<div id="l_contact" class="cdiv">
<p  class=" clabel">Rating*: </p>
<p  class=" clabel">Review text*: </p>

 
</div>

<div id="r_contact" class="cdiv">


<input type="text" id="el2" class="celement textbox " size="40" name="rating"> <br>
<div class="error " id="er2"><p class="error_text"></p></div>
<textarea id="el3" class="celement textarea " cols="30" rows="7" name="rtext"></textarea>
<div class="error " id="er3"><p class="error_text"></p></div>

<input type="hidden" id="id" name="id" >
<input type="hidden" id="prodid" name="single" value='<?php echo $prodId ?>' >

</div>

<div id="rev_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Send" class="button common_button">

</div>

</form>




	
	


</div>

</body>
</html>