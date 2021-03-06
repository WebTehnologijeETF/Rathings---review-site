<!DOCTYPE HTML>
<html>
<head>
<title>Update administrator</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="shortcut icon" type="username/png" href="../usernames/favicon.png"/>
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

session_start();
if(!isset($_SESSION['username']) or $_SESSION['role'] != 1)
{
	header('Location: index.php');
	die();

}


?>


<?php



	if(isset($_GET['id']))
	$id = htmlspecialchars($_GET['id']);
	else if(isset($_POST['id']))
	$id = htmlspecialchars($_POST['id']);

	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
	 
	 $res = $con->prepare("select * from users where id = ?");
	 $res->bindValue(1, $id, PDO::PARAM_INT);
	 $res->execute();
	 
	 
	 foreach($res as $u)
	 {
	    $name = htmlspecialchars($u['name']);
		$lastname = htmlspecialchars($u['lastname']);
		$username = htmlspecialchars($u['username']);
		$password = htmlspecialchars($u['password']);
	 
	 }
	 
	 
	 $mes = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
	
		session_start();
		$valid = true;
	
		$name = $lastname = $username = $password = "";
		
		if(isset($_POST['name']) and $_POST['name'] != '')
			$name = htmlspecialchars($_POST['name']);
		else
		{
			$valid = false;
			$mes = "You have to fill in all fields";
		}
			
			if(isset($_POST['lastname']) and $_POST['lastname'] != '')
			$lastname = htmlspecialchars($_POST['lastname']);
		else
		{
			$valid = false;
			$mes = "You have to fill in all the fields";
		}
			
			if(isset($_POST['username']) and $_POST['username'] != '')
			$username = htmlspecialchars($_POST['username']);
		else
		{
			$valid = false;
			$mes = "You have to fill in all fields";
		}
			
			if(isset($_POST['password']) and $_POST['password'] != '')
			$password = htmlspecialchars($_POST['password']);
		else
		{
			$valid = false;
			$mes = "You have to fill in all fields";
		}

			if($valid)
			{
			
			$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
			$con->exec("set names utf8");
	 
			 $res = $con->prepare("update users set name = ?, lastname = ?, username = ?, email = ?, password = md5(?), roles_id=? where id=?");
			 $res->bindValue(1, $name, PDO::PARAM_STR);
			 $res->bindValue(2, $lastname, PDO::PARAM_STR);
			 $res->bindValue(3, $username, PDO::PARAM_STR);
			 $res->bindValue(4, $username, PDO::PARAM_STR);
			 $res->bindValue(5, $password, PDO::PARAM_INT);
			 $res->bindValue(6, 1, PDO::PARAM_INT);
			 $res->bindValue(7, $id, PDO::PARAM_INT);
			 $res->execute();
			 
			 $mes = "You have successfully updated the administrator";

			}
			
		
	
	
	}


?>







<div id="message"><p><?php echo $mes ?></p></div>

<div id="back"><p onclick="loadPage('adminPanel.php');">Back to admin panel</p></div>


<form method="post" action="updateAdmin.php" id="updminform">
<div class="contact" class="container">
<h2>Update administrator</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" clabel">Name*: </p>
<p  class=" clabel">Last name*: </p> 
<p class=" clabel">Username/Email*: </p> 
<p  class=" clabel">Password*: </p> 
</div>

<div id="r_contact" class="cdiv">
<input type="text" id="el0" class="celement textbox" name="name" value="<?php echo $name ?>">
<div class="error" id="er0"><p class="error_text"></p></div>

<input type="text" id="el1" class="celement textbox" name="lastname" value="<?php echo $lastname ?>">
<div class="error" id="er1"><p class="error_text"></p></div>

<input type="email" id="el2" class="celement textbox" name="username" value="<?php echo $username ?>">
<div class="error" id="er2"><p class="error_text"></p></div>

<input type="password" id="el3" class="celement textbox" name="password" value="<?php echo $password ?>">
<div class="error" id="er3"><p class="error_text"></p></div>

<input type="hidden" name="id" value="<?php echo $id ?>">


</div>



<div id="rev_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Confirm" class="button common_button">

</div>

</div>

</form>


</body>



</html>