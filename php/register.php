


<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
<script src="gvalidation.js"></script>
<script src="register-validation.js"></script>
<script src="load.js"></script>
</head>
<body id="main_body">




<?php require "header.php"; ?>


<form method="post" action="something.php" onsubmit="return validateFormR();">
<div id="register" class="container">
<h2>Register</h2>
<p class="note"><i>Note: Fields marked with * are mandatory</i></p>

<div id="l_contact" class="cdiv">
<p  class=" clabel">First name*: </p>
<p  class=" clabel">Last name*: </p>
<p  class=" clabel">Age*: </p>
<p  class=" clabel">Gender: </p>
<p  class=" clabel">Picture: </p>
<p  class=" clabel">Country*: </p>
<p  class=" clabel">Calling code*: </p>
<p  class=" clabel">Phone*: </p>
<p  class=" clabel">Username*: </p> 
<p class=" clabel">Password*: </p> 
<p  class=" clabel">Confirm password*: </p> 
 
</div>

<div id="r_contact" class="cdiv">
<input  type="text" id="el0" class="celement textbox">
<div class="error" id="er0"><p class="error_text"></p></div>
<input type="text" id="el1" class="celement textbox" size="40">
<div class="error" id="er1"><p class="error_text"></p></div>
<input type="number" id="el2" class="celement numeric" size="5" min="15" max="99"> <br>
<div class="error" id="er2"><p class="error_text"></p></div>
<label>Male</label>
<input type="radio" name="gender" class=" radio celement">

<label>Female</label>
<input type="radio" name="gender" class=" radio">
<div class="error" id="er3"><p class="error_text"></p></div>

<input type="file" id="el4" class="celement" accept="image/*">
<div class="error" id="er4"><p class="error_text"></p></div>

<input id="el5" class="celement textbox">
<div class="error" id="er5"><p class="error_text"></p></div>

<label>+</label>
<input type="number" id="el6" class="celement numeric_small">
<div class="error" id="er6"><p class="error_text"></p></div>

<input id="el7" class="celement textbox">
<div class="error" id="er7"><p class="error_text"></p></div>

<input type="email" id="el8" class="celement textbox" size="40">
<div class="error" id="er8"><p class="error_text"></p></div>

<input type="password" id="el9" class="celement textbox">
<div class="error" id="er9"><p class="error_text"></p></div>

<input type="password" id="el10" class="celement textbox">
<div class="error" id="er10"><p class="error_text"></p></div>

</div>

<div id="r_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Submit" class="button common_button">


</div>

</div>

</form>


<div id="reg_text" class="container">
<h2>Why register?</h2>

<p>By joining us you get the following benefits:</p> <br>

<ul class="common_list">
<li>Page content based on your preferences</li>
<li>Ability to add new products</li>
<li>Ability to get rank based on your reviews</li>
<li>Ability to get price benefits based on your rank</li>
<li>Ability to work with our partners</li>

</ul>
</div>




</body>

</html>