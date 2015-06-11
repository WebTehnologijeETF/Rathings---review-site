<!DOCTYPE HTML>
<html>
<head>
<title>Add new Administrator</title>
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



<?php

	$mes = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	
		session_start();
	
		$name = $lastname = $username = $password = "";
		
		if(isset($_POST['name']))
			$name = htmlspecialchars($_POST['name']);
			
			if(isset($_POST['lastname']))
			$lastname = htmlspecialchars($_POST['lastname']);
			
			if(isset($_POST['username']))
			$username = htmlspecialchars($_POST['username']);
			
			if(isset($_POST['password']))
			$password = htmlspecialchars($_POST['password']);
			
			$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
			$con->exec("set names utf8");
	 
			 $res = $con->prepare("insert into users set name = ?, lastname = ?, username = ?, email = ?, password = ?");
			 $res->bindValue(1, $name, PDO::PARAM_STR);
			 $res->bindValue(2, $lastname, PDO::PARAM_STR);
			 $res->bindValue(3, $username, PDO::PARAM_STR);
			 $res->bindValue(4, $username, PDO::PARAM_STR);
			 $res->bindValue(5, $password, PDO::PARAM_INT);
			 $res->execute();
			 
			 $mes = "You have successfully added new administrator";
			 
			
		
	
	
	}


?>







<div id="message"><p><?php echo $mes ?></p></div>

<div id="back"><p onclick="loadPage('adminPanel.php');">Back to admin panel</p></div>


<form method="post" action="addadmin.php" id="addadminform">
<div class="contact" class="container">
<h2>Add new administrator</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" clabel">Name*: </p>
<p  class=" clabel">Last name*: </p> 
<p class=" clabel">Username/Email*: </p> 
<p  class=" clabel">Password*: </p> 
</div>

<div id="r_contact" class="cdiv">
<input type="text" id="el0" class="celement textbox" name="name">
<div class="error" id="er0"><p class="error_text"></p></div>

<input type="text" id="el1" class="celement textbox" name="lastname">
<div class="error" id="er1"><p class="error_text"></p></div>

<input type="email" id="el2" class="celement textbox" name="username">
<div class="error" id="er2"><p class="error_text"></p></div>

<input type="password" id="el3" class="celement textbox" name="password">
<div class="error" id="er3"><p class="error_text"></p></div>



</div>



<div id="rev_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Confirm" class="button common_button">

</div>

</div>

</form>


</body>



</html>