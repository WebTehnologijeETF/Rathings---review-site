


<!DOCTYPE HTML>
<html>
<head>
<title>Contact us</title>
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
<body id="main_body" onload="fieldsValidationC();">




<?php require "header.php"; ?>






<div class="contact" class="container">
<h2>Contact us</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" clabel">First name*: </p>
<p  class=" clabel">Last name*: </p> 
<p  class=" clabel">Email*: </p> 
<p class=" clabel">Site rating (1-10): </p> 
<p  class=" clabel">Message urgency*: </p> 
<p  class=" clabel">Message text*: </p> 
</div>

<div id="r_contact" class="cdiv">
<input  type="text" id="el0" class="celement textbox ">

<div class="error " id="er0"><p class="error_text"></p></div>

<input type="text" id="el1" class="celement textbox " size="40" name="lastname" >
<div class="error " id="er1"><p class="error_text"></p></div>
<input type="text" id="el2" class="celement textbox " size="40" name="email" >
<div class="error " id="er2"><p class="error_text"></p></div>
<input type="number" id="el3" class="celement numeric " size="5" min="1" max="10" name="rating">
<div class="error " id="er3"><p class="error_text"></p></div>
<input type="range" id="el4" class="celement textbox range " name="urgency">
<div class="error " id="er4"><p class="error_text"></p></div> 
<textarea id="el5" class="celement textarea " cols="30" rows="7" name="message"></textarea>
<div class="error" id="er5"><p class="error_text"></p></div>
</div>

<div id="c_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="button" value="Send" class="button common_button" onclick="validateFormC();">

</div>

</div>









</body>

</html>