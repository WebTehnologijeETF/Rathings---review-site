<!DOCTYPE HTML>
<html>
<head>
<title>Add news</title>
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

<?php require 'adminHeader.php' ?>

<?php

	$mes = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	
		session_start();
	
		$title = $caption = $image = $text = "";
		
		if(isset($_POST['title']))
			$title = htmlspecialchars($_POST['title']);
			
			if(isset($_POST['caption']))
			$caption = htmlspecialchars($_POST['caption']);
			
			if(isset($_POST['image']))
			$image = htmlspecialchars($_POST['image']);
			
			if(isset($_POST['text']))
			$text = htmlspecialchars($_POST['text']);
			
			$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
			$con->exec("set names utf8");
	 
			 $res = $con->prepare("insert into news set title = ?, caption = ?, image = ?, text = ?, author = ?");
			 $res->bindValue(1, $title, PDO::PARAM_STR);
			 $res->bindValue(2, $caption, PDO::PARAM_STR);
			 $res->bindValue(3, $image, PDO::PARAM_STR);
			 $res->bindValue(4, $text, PDO::PARAM_STR);
			 $res->bindValue(5, $_SESSION['id'], PDO::PARAM_INT);
			 $res->execute();
			 
			 $mes = "You have successfully added news";
			 
			
		
	
	
	}


?>







<div id="message"><p><?php echo $mes ?></p></div>

<div id="back"><p onclick="loadPage('adminPanel.php');">Back to admin panel</p></div>


<form method="post" action="addnews.php" id="addform">
<div class="contact" class="container">
<h2>Add news</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" rlabel">Title*: </p>
<p  class=" rlabel">Caption*: </p> 
<p class=" clabel">Image*: </p> 
<p  class=" rlabel">Text*: </p> 
</div>

<div id="r_contact" class="cdiv">
<textarea id="el0" class="celement textarea" cols="30" rows="7" name="title"></textarea>
<div class="error " id="er0"><p class="error_text"></p></div>

<textarea id="el1" class="celement textarea" cols="30" rows="7" name="caption"></textarea>
<div class="error " id="er1"><p class="error_text"></p></div>

<input type="text" id="el2" class="celement textbox" name="image">
<div class="error" id="er2"><p class="error_text"></p></div>

<textarea id="el3" class="celement textarea" cols="30" rows="7" name="text"></textarea>
<div class="error " id="er3"><p class="error_text"></p></div>



</div>



<div id="n_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Confirm" class="button common_button">

</div>

</div>

</form>


</body>



</html>