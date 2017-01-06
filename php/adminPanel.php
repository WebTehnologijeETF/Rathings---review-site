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
<body id="main_body" onload="fetchNews(); fetchProducts();">


<?php require 'adminHeader.php' ?>






<div id="admins">
<h2>Manage site admins</h2>

<div class="addprod lab_link">
<label onclick="loadPage('addadmin.php');">Add new Administrator</label>
</div>

<?php


 $con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
		 
		 $a = $con->query("select * from users where roles_id = 1");
		 $nu = $con->query("select count(*) from users where roles_id = 1");
		 $nu = $nu->fetchColumn();
		 $countera = 0;
		 
		 foreach($a as $admin)
		 {
			$adminOutput = '<div class="single_product"><label class="prod">' .
			$admin['name'] . ' ' . $admin['lastname'] .
			'</label> <br><label class="prod2">Username: ' . $admin['username'] . '</label> <br>';
			
			$adminOutput .= '<div class="update-delete lab_link"><label onclick="updateAdmin(' . $admin['id'] . ');">Update</label>';
			if($nu > 1)
					$adminOutput .= '<label  onclick="deleteAdmin(' . $admin['id'] . ');">Delete</label>';
					$adminOutput .= '</div></div>';
			
			if($countera != $nu - 1) // not last
						$adminOutput .= '<div class="news_separator"></div>';
			
			$countera++;
			
			echo $adminOutput;
		 }

/*<div class="single_product">

<label class="prod">Orhan Ljubunčić</label> <br>
 
<label class="prod2">Username: oljubuncic1@etf.unsa.ba</label> <br>
</div>

<div class="news_separator">

</div>*/



?>

</div>

</body>


</html>