


<!DOCTYPE HTML>
<html>
<head>
<title>Log in</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
<script src="gvalidation.js"></script>
<script src="login-validation.js"></script>
<script src="load.js"></script>
</head>
<body id="main_body">




<?php require "header.php"; ?>





<form method="post" action="something.php" onsubmit="return validateFormL();">
<div class="contact" class="container">
<h2>Log in</h2>

<div id="l_contact" class="cdiv">
<p  class=" clabel">Username: </p>
<p  class=" clabel">Password: </p> 

</div>

<div id="r_contact" class="cdiv">


<input type="email" id="el0" class="celement textbox" size="40">
<div class="error" id="er0"><p class="error_text"></p></div>
<input type="password" id="el1" class="celement textbox" size="40">
<div class="error" id="er1"><p class="error_text"></p></div>
<input type="checkbox" ><label>Remember me </label>

</div>

<div id="l_buttons" >


<input type="submit" value="Login" class="button common_button">
<p><a href="google.ba">Forgot your password</a></p>

</div>



</div>

</form>







</body>

</html>