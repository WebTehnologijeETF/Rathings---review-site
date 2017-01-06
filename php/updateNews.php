<!DOCTYPE HTML>
<html>
<head>
<title>Update news</title>
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

<?php require 'adminHeader.php' ?>

<?php



	if(isset($_GET['id']))
	$id = htmlspecialchars($_GET['id']);
	else if(isset($_POST['id']))
	$id = htmlspecialchars($_POST['id']);

	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
	 
	 $res = $con->prepare("select id, title, caption, text, author, image, UNIX_TIMESTAMP(date) date2 from news where id = ?");
	 $res->bindValue(1, $id, PDO::PARAM_INT);
	 $res->execute();
	 
	 
	 foreach($res as $u)
	 {
	    $title = htmlspecialchars($u['title']);
		$caption = htmlspecialchars($u['caption']);
		$image = htmlspecialchars($u['image']);
		$text = htmlspecialchars($u['text']);
	 
	 }
	 
	 
	
	



?>







<div id="message"><p></p></div>

<div id="back"><p onclick="loadPage('adminPanel.php');">Back to admin panel</p></div>



<div class="contact" class="container">
<h2>Update news</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" rlabel">Title*: </p>
<p  class=" rlabel">Caption*: </p> 
<p class=" clabel">Image*: </p> 
<p  class=" rlabel">Text*: </p> 
</div>

<div id="r_contact" class="cdiv">
<textarea id="el0" class="celement textarea" cols="30" rows="7" name="title"><?php echo $title ?></textarea>
<div class="error " id="er0"><p class="error_text"></p></div>

<textarea id="el1" class="celement textarea" cols="30" rows="7" name="caption"><?php echo $caption ?></textarea>
<div class="error " id="er1"><p class="error_text"></p></div>

<input type="text" id="el2" class="celement textbox" name="image" value="<?php echo $image ?>">
<div class="error" id="er2"><p class="error_text"></p></div>

<textarea id="el3" class="celement textarea" cols="30" rows="7" name="text"><?php echo $text ?></textarea>
<div class="error " id="er3"><p class="error_text"></p></div>

<input type="hidden" id="id" name="id" value="<?php echo $id ?>">

</div>



<div id="n_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="button" value="Confirm" class="button common_button" onclick="updateNewsService();">

</div>

</div>




</body>



</html>